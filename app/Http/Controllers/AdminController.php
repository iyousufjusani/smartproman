<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class AdminController extends Controller
{

    public function index()
    {
        $admins = User::where('is_admin', true)->paginate(9);
        return view('Admin.admins.index', compact('admins'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'image' => 'required',
        ]);

        if ($request->image) {
            Image::make($request->image)
                ->resize(160, 160, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(
                    public_path(
                        'uploads/user_images/' .
                        $request->image->hashName()
                    )
                );
            $image = $request->image->hashName();
        }

        $admin = new User;
        $admin->name = $request['name'];
        $admin->email = $request['email'];
        $admin->password = Hash::make($request['password']);
        $admin->is_admin = true;
        $admin->image = $image;
        $admin->save();


//        User::create([
//            'name' => $request['name'],
//            'email' => $request['email'],
//            'password' => Hash::make($request['password']),
//            'is_admin' => true,
////            'image' => $image,
//        ]);

        if (!$request->ajax()) {
            return redirect()->route('admins.index')->with('success', 'Admin Created Successfully!!!');
        }
    }


    public function show(User $admin)
    {
        //
    }


    public function edit(User $admin)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => [
                'email',
                'required',
            ],
            'password' => 'required|min:8',
        ]);


        $user = User::find($id);
//        dd($user);
        $user->name = $request['name'];
        $user->email = $request['email'];


        if ($request->image) {

            if ($user->image != 'noImage.png') {
                Storage::disk('public_uploads')->delete(
                    '/user_images/' . $user->image
                );
            }

            Image::make($request->image)
                ->resize(160, 160, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(
                    public_path(
                        'uploads/user_images/' .
                        $request->image->hashName()
                    )
                );
            $user->image = $request->image->hashName();
        }


        if ($user->password == $request['password']) {
//            dd($request['password']);
            $user->password = $request['password'];
        } else {
//            dd($request['password']);
            $user->password = Hash::make($request['password']);
        }

        $user->save();

        if (!$request->ajax()) {
            return redirect()->route('admins.index')->with('success', 'Admin Updated Successfully!!!');
        }

    }


    public function destroy(User $admin)
    {
        if ($admin->image != 'noImage.png') {
            Storage::disk('public_uploads')->delete(
                '/user_images/' . $admin->image
            );
        }

        $admin->delete();
        return redirect()->route('admins.index')->with('error', 'Admin Removed Successfully!!!');
    }
}
