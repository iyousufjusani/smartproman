<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::where('is_active', 1)->get();
        return view('Admin.users.index', compact('users'));
    }
}
