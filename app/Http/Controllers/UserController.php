<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)->paginate(10);
        return view('Admin.users.index', compact('users'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if (!$request->ajax()) {
            return redirect()->route('users.index')->with('success', 'Users Created Successfully!!!');
        }
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => [
                'email',
                'required',
                Rule::unique('users')->ignore($id)
            ],
            'password' => 'required|min:8',
        ]);



        $user = User::find($id);
        $user->name = $request['name'];
        $user->email = $request['email'];

        if($user->password == $request['password'] ){
//            dd($request['password']);
            $user->password = $request['password'];
        }else{
//            dd($request['password']);
            $user->password = Hash::make($request['password']);
        }

        $user->save();


        if (!$request->ajax()) {
            return redirect()->route('users.index')->with('success', 'Users Updated Successfully!!!');
        }

    }


    public function destroy(User $user)
    {
        if ($user->image != 'noImage.png') {
            Storage::disk('public_uploads')->delete(
                '/user_images/' . $user->image
            );
        }

        $user->delete();
        return redirect()->route('users.index')->with('error', 'User Removed Successfully!!!');

    }
}
