<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use App\Models\Topic;
use http\QueryString;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::paginate(20);
        return view('Admin.questions.index', compact('questions'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::all();
        return view('Admin.questions.create', compact('topics'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|unique:questions,text',
            'choice1' => 'required',
            'choice2' => 'required',
            'choice3' => 'required',
            'choice4' => 'required',
            'correct' => 'required',
            'topic_id' => 'required',
        ]);

        if ($request['topic_id'] == null) {
            $request['topic_id'] = 1;
        }

        $number = Question::where('topic_id', $request['topic_id'])->count();

        $question_id = Question::create([
            'number' => $number + 1,
            'text' => $request['text'],
            'topic_id' => $request['topic_id'],
        ])->id;


        $choices = array();
        $choices[1] = $request['choice1'];
        $choices[2] = $request['choice2'];
        $choices[3] = $request['choice3'];
        $choices[4] = $request['choice4'];


        foreach ($choices as $key => $choice) {
            if ($key == $request['correct']) {
                $correct = true;
            } else {
                $correct = false;
            }
            Option::create([
                'text' => $choice,
                'is_correct' => $correct,
                'question_id' => $question_id,
            ]);
        }


        if (!$request->ajax()) {
            return redirect()->route('questions.create')->with('success', 'Question Added Successfully!!!');
        }

//        return redirect()->back()->with(['error' => $request->errors()->all()]);
//        return $request;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $question = Question::find($question['id']);
        $options = Option::where('question_id', $question['id'])->get();

        return view('Admin.questions.show', compact('question', 'options'));

//        return $question;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $topics = Topic::all();

        $question = Question::find($question['id']);


        return view('Admin.questions.edit', compact('question', 'topics'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Question $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'text' => [
                'required',
                Rule::unique('questions')->ignore($id),
            ],
            'correct' => 'required',
            'topic_id' => 'required',
        ]);


        $question = Question::find($id);
//        dd($question);
        $question->text = $request['text'];
        $question->topic_id = $request['topic_id'];
        $question->save();


        if (!$request->ajax()) {
            return redirect()->route('questions.index')->with('success', 'Question Updated Successfully!!!');
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {

        Option::where('question_id', $question['id'])->delete();

        $question->delete();

        return redirect()->route('questions.index')->with('error', 'Question Deleted Successfully!!!');
    }
}
