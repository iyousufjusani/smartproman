<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Question;
use App\Models\Topic;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $admins = User::where('is_admin', true)->get();
        $users = User::where('is_admin', false)->get();
        $topics = Topic::all();
        $questions = Question::all();

        return view('Admin.dashboard', compact('admins', 'users', 'topics', 'questions'));
    }
}
