<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Page;
use App\Models\Question;
use App\Models\Topic;
use App\Models\TopicDetail;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class MainController extends Controller
{

    private $rightA = 0;
    private $wrongA = 0;
    private $skipA = 0;

    public function __construct()
    {
        $this->middleware('auth');


    }


    public function startLearning($topicTitle, $questionID)
    {

        // get req
        // create season -> save topic id question id
        $topic = Topic::
        with('questions')
            ->where('title', '=', $topicTitle)
            ->first();

        if ($topic != null) {

            $question_id = decrypt($questionID);

            $question = Question::
            with('options')
                ->where('id', '=', $question_id)
                ->where('topic_id', '=', $topic->id)
                ->first();

            $pages = Page::
            where('topic_id', '=', $topic->id)
                ->get();

            $videos = Video::
            where('topic_id', '=', $topic->id)
                ->get();


            $obj = [
                'topic' => $topic,
                'question' => $question,
            ];
            Session::put('learning', $obj);

            //            Session::put("next", $question->id);
            //        dd($question);
            return view('learning.main', compact('topic', 'question', 'pages', 'videos'));

        }
        return view('learning.main', compact('topic'));
    }


    public function nextQuestion(Request $request)
    {
        $this->validate($request, [
            'option' => 'required',
            'next' => 'required',
        ]);


        $q_id = Session::get('learning')['question']->id;
        $q_number = Session::get('learning')['question']->number;
        $t_id = Session::get('learning')['topic']->id;

        $topic = Topic::
        where('id', '=', $t_id)
            ->first();
        $total_questions = $topic->questions->count();

        if ($q_number == $total_questions) {
//            dd($topic);
//            return view('learning.score', compact('topic'));
            return redirect()->route('score', [$topic]);
        } else {

            // get the current question
            $current_question = Question::find($q_id);
            // get next question id
            $next = Question::where('topic_id', '=', 1)->where('id', '>', $current_question->id)->min('id');
            //            dd($next);

            //topic name or encrypt question id
            return redirect()->route('start', [$topic->title, encrypt($next)]);
        }

    }

    public function skipQuestion(Request $request)
    {
        $skip = Session::get('skip');

        $this->validate($request, [
            'skip' => 'required',
        ]);

        $skip += 1;

        $q_id = Session::get('learning')['question']->id;
        $q_number = Session::get('learning')['question']->number;
        $t_id = Session::get('learning')['topic']->id;

        $topic = Topic::
        where('id', '=', $t_id)
            ->first();
        $total_questions = $topic->questions->count();

        Session::put('skip', $skip);

        if ($q_number == $total_questions) {
            return redirect()->route('score', [$topic]);
        } else {

            // get the current question
            $current_question = Question::find($q_id);
            // get next question id
            $next = Question::where('topic_id', '=', $t_id)->where('id', '>', $current_question->id)->min('id');
            //            dd($next);

            //topic name or encrypt question id
            return redirect()->route('start', [$topic->title, encrypt($next)]);
        }

    }

    public function submitAnswer(Request $request)
    {

        $right = Session::get('right');
        $wrong = Session::get('wrong');

        if ($request['button'] == 'next') {
            $this->validate($request, [
                'option' => 'required',
                'button' => 'required',
            ]);
        }

        $question = Session::get('learning')['question'];
//        dd($question);

        $option = Option::
        where('id', '=', $request['option'])
            ->where('question_id', '=', $question->id)
            ->first();
//        dd($option);

        if ($option->is_correct == 1) {
            $right += 1;
        } else {
            $wrong += 1;
        }

        Session::put("right", $right);
        Session::put("wrong", $wrong);


    }


    public function type2($topicTitle , $detailID)
    {
        $type = 2;
        $topic = Topic::
        with('questions.options')
            ->where('title', '=', $topicTitle)
            ->first();

        if ($topic != null) {
//            return 'No topics';

            $details = TopicDetail::
            where('topic_id', '=', $topic->id)
                ->where('type_id', '=', $type)
                ->first();

            $questions = Question::
            with('options')
                ->where('topic_id', '=', $topic->id)
                ->offset($details->start_question - 1)
                ->limit($details->end_question)
                ->get();

            $pages = Page::
            where('topic_id', '=', $topic->id)
                ->get();
            $videos = Video::
            where('topic_id', '=', $topic->id)
                ->get();

        }


        return view('learning.main2', compact('topic', 'details', 'questions', 'pages', 'videos'));

    }

    public function nextType2(Request $request)
    {
        $this->validate($request, [
            'option' => 'required',
            'next' => 'required',
        ]);

//        $q_id = Session::get('learning')['question']->id;
//        $q_number = Session::get('learning')['question']->number;
//        $t_id = Session::get('learning')['topic']->id;


    }

    public function index($topic_id, $q_id)
    {

//        dd($this->right);
        $question_id = decrypt($q_id);


        $topic = Topic::
        with('questions.options')
            ->where('title', '=', $topic_id)
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
                ->where('topic_id', '=', $topic->id)
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

            $obj = [

                'topic' => $topic->title,
                'question' => $question,

            ];

            Session::put('learning', $obj);

            return view('learning.main', compact('topic', 'question', 'pages', 'videos', 'right', 'wrong', 'skip'));

        }

        return view('learning.main', compact('topic'));
    }


    public function nextQuestion1(Request $request)
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

        //topic name or encrypt question id
        return redirect()->route('main', [$topic->title, $next]);


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


}
