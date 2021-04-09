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

    private $rightA = 0;
    private $wrongA = 0;
    private $skipA = 0;

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index($topic_id, $question_id)
    {

//        dd($this->right);

        $topic = Topic::
        with('questions.options')
            ->where('id', '=', $topic_id)
            ->first();

//        $total_questions = Question::
//            ->where('topic_id', '=', $topic->id)
//            ->count();
//        dd($topic);

        if ($topic != null) {
//            return 'No topics';

            $question = Question::
            with('options')
                ->where('id', '=', $question_id)
                ->where('topic_id', '=', $topic_id)
                ->first();

//        dd($question);

//        $options = Option::
//            ->where('question_id', '=', $question->id)
//            ->get();
//        dd($options);

            if ($topic->questions->count() == 0) {
                $topics = Topic::with('questions')->get();
                return redirect()->route('home')->with('topics', $topics);
            }

//        dd($topic);
//        $topics = Topic::
//            with('questions.options')
//
//            ->get();
//        dd($topics);

            $pages = Page::
            where('topic_id', '=', $topic->id)
                ->get();
            $videos = Video::
            where('topic_id', '=', $topic->id)
                ->get();

            $right = $this->rightA;
            $wrong = $this->wrongA;
            $skip = $this->skipA;

//            $right = Session::get('right');;
//            $wrong = Session::get('wrong');;
//            $skip = Session::get('skip');;

//            Session::put('right', $right);
//            Session::put('wrong', $wrong);
//            Session::put('skip', $skip);


            if ($topic->type_id == 2) {
                return view('learning.main2', compact('topic', 'question'));
            }
            return view('learning.main', compact('topic', 'question', 'pages', 'videos', 'right', 'wrong', 'skip'));

        }

        return view('learning.main', compact('topic'));
    }

    public function nextQuestion(Request $request)
    {
//        return $request;

        if ($request['button'] == 'next') {
            $this->validate($request, [
                'option' => 'required',
                'topic' => 'required',
                'questionId' => 'required',
                'number' => 'required',
//                'right' => 'required',
//                'wrong' => 'required',
//                'skip' => 'required',
                'button' => 'required',
            ]);
        }


        $number = $request['number'];
        $topic_id = $request['topic'];
        $question_id = $request['questionId'];
        $option = $request['option'];
        $next = $number + 1;

        $this->rightA = $request['right'];
        $this->wrongA = $request['wrong'];
        $this->skipA = $request['skip'];

        if ($request['button'] == 'skip') {
            $this->skipA += 1;
        }

//        return $next;

        $topic = Topic::
        where('id', '=', $topic_id)
            ->first();
        $total_questions = $topic->questions->count();
//        dd($total_questions);

        $correct = Option::
        where('question_id', '=', $question_id)
            ->where('is_correct', '=', 1)
            ->first();
//        dd($correct);
        if ($correct['id'] == $option && $request['button'] == 'next') {
            $this->rightA += 1;
        } else if ($correct['id'] != $option && $request['button'] == 'next') {
            $this->wrongA += 1;
        }

//        dd($number);
//        dd($right);
//        dd($wrong);

        $right = $this->rightA;
        $wrong = $this->wrongA;
        $skip = $this->skipA;

        if ($number == $total_questions) {
//            dd('hello');

//            return redirect()->route('score')->with(['topic' => $topic, 'right' => $right, 'wrong' => $wrong, 'skip' => $skip]);

            return view('learning.score', compact('topic', 'right', 'wrong', 'skip'));
//            return 'Score is: '. $score;

        }


        return redirect()->route('main', [$topic_id, $next]);


//        $question = Question::
//        with('options')
//            ->where('topic_id', '=', $topic->id)
//            ->where('number', $next)
//            ->first();
//
//        $pages = Page::
//        where('topic_id', '=', $topic->id)
//            ->get();
//
//        $videos = Video::
//        where('topic_id', '=', $topic->id)
//            ->get();
//
//        return view('learning.main', compact('topic', 'question', 'pages', 'videos', 'right', 'wrong', 'skip'));

    }


    public function nextTopic(Request $request, $topic_id)
    {

//        Session::put('right', 0);
//        Session::put('wrong', 0);
//        Session::put('skip', 0);
    }


}
