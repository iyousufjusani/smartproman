<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScoreController extends Controller
{
    //

    public function index()
    {
        return view('learning.score');
    }

    public function learningCompleted(Request $request)
    {
        return "Total all topics with Score";

    }
}
