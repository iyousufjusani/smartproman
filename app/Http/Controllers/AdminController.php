<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    public function index()
    {
        $admins = Admin::where('is_active', 1)->paginate(9);
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
            'email' => 'required|unique:admins,email',
            'password' => 'required',
            //'image' => 'required',
        ]);

        if ($request -> image) {
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
//            $image = $request->image->hashName();
        }

        Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
//            'image' => $image,
        ]);

        if (!$request->ajax()) {
            return redirect()->route('admins.index')->with('success', 'Admin Created Successfully!!!');
        }
    }


    public function show(Admin $admin)
    {
        //
    }


    public function edit(Admin $admin)
    {
        //
    }


    public function update(Request $request, Admin $admin)
    {
        //
    }


    public function destroy(Admin $admin)
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
