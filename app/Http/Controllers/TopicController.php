<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Type;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::where('is_active', 1)->get();
        $topics = Topic::where('is_active', 1)->paginate(10);
        return view('Admin.topics.index', compact('types', 'topics'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title' => 'required|unique:topics,title',
            'type_id' => 'required',
            //'image' => 'required',
        ]);

        if($request['type_id'] == null){
            $request['type_id'] = 1;
        }

        Topic::create([
            'title' => $request['title'],
            'type_id' => $request['type_id'],
//            'image' => $image,
        ]);

        if (!$request->ajax()) {
            return redirect()->route('topics.index')->with('success', 'Topic Created Successfully!!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        //
    }
}
