<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::where('is_active', 1)->paginate(10);
        return view('Admin.users.index', compact('users'));
    }


    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required|unique:users,email',
            'password' => 'required',
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
