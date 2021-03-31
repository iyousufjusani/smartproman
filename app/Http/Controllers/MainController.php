<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Page;
use App\Models\Question;
use App\Models\Topic;
use App\Models\Video;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        $topic = Topic::where('is_active', 1)->first();

        $topics = Topic::
            with('questions.options')
            ->where('is_active', 1)
            ->get();
//        dd($topics);

        $total_questions = Question::
        where('is_active', 1)
            ->where('topic_id', '=', $topic->id)
            ->count();

        $question = Question::
        with('options')
            ->where('is_active', 1)
            ->where('topic_id', '=', $topic->id)
            ->first();
//        dd($question);

//        $options = Option::where('is_active', 1)
//            ->where('question_id', '=', $question->id)
//            ->get();
//        dd($options);

        $pages = Page::where('is_active', 1)
            ->where('topic_id', '=', $topic->id)
            ->get();

        $videos = Video::where('is_active', 1)
            ->where('topic_id', '=', $topic->id)
            ->get();

        if ($topic->type_id == 2) {
            return view('learning.main2', compact('topic', 'total_questions', 'questions'));
        }
        return view('learning.main', compact('topic', 'total_questions', 'question', 'pages', 'videos'));

//        return view('learning.main', compact('topics'));

    }

    public function checkAnswer(Request $request)
    {
        dd();
        return 'check';

    }

    public function next($topic_id, $question_id)
    {
        $topic = Topic::where('is_active', 1)->where('id', '=', $topic_id)->first();
        //        dd($topic);

        $question = Question::where('is_active', 1)->where('topic_id', $topic->id)->first();
        //        dd($questions);

        $options = Option::where('is_active', 1)->where('question_id', '=', $question_id)->get();
        //        dd($options);

        return view('learning.main', compact('topic', 'question', 'options'));
    }


}
