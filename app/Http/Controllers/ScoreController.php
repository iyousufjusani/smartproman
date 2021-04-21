<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class ScoreController extends Controller
{
    //

    public function index($id)
    {
//        dd($id);
        $topic = Topic::where('id', '=', $id)->first();
        return view('learning.score', compact('topic'));

    }

    public function nextTopic(Request $request)
    {
        //get all sessions
        $t_id = Session::get('learning')['topic']->id;

        if (Session::get('right')) {
            $right = Session::get('right');
        } else {
            $right = 0;
        }
        if (Session::get('wrong')) {
            $wrong = Session::get('wrong');

        } else {
            $wrong = 0;
        }

        if (Session::get('skip')) {
            $skip = Session::get('skip');
        } else {
            $skip = 0;
        }


        // get the current topic
        $current_topic = Topic::find($t_id);
        // get next topic id
        $next = Topic::where('id', '>', $current_topic->id)->min('id');

        $topic = Topic::with('questions')
            ->where('id', '=', $next)->first();

//        dd($topic);
//        dd($topic->questions[0]);

        //Store score in database
        Score::updateOrCreate(
            ['user_id' => Auth::user()->id, 'topic_id' => $t_id],
            [
                'right' => $right,
                'wrong' => $wrong,
                'skip' => $skip
            ]
        );

        Session::put('right', 0);
        Session::put('wrong', 0);
        Session::put('skip', 0);

        $obj = [
            'topic' => $topic,
            'question' => $topic->questions[0],
        ];

        Session::put('learning', $obj);


        if (!$request->ajax()) {
//            return redirect()->route('options.index')->with('success', 'Option Updated Successfully!!!');
            if ($topic->type_id == 1) {
                return redirect()->route('start', [$topic->title, encrypt($topic->questions[0]->id)]);
            } else {
                return redirect()->route('start2', [$topic->title]);

            }

        }


//        dd($topic);
//        dd($question);
//        return 'next topic';
    }

    public function learningCompleted(Request $request)
    {
        return "Total all topics with Score";

    }
}
