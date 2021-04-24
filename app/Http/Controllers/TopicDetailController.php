<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\TopicDetail;
use App\Models\Type;
use App\Models\Video;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class TopicDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        $types = Type::all();
        $details = TopicDetail::paginate(10);
        return view('Admin.topicDetails.index', compact('topics','types','details'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'start'=> 'required',
            'end'=> 'required',
            'topic_id' => 'required',
            'type_id' => 'required',

        ]);

        if($request['topic_id'] == null){
            $request['topic_id'] = 1;
        }

        if($request['type_id'] == null){
            $request['type_id'] = 1;
        }

        if ($request->image) {
            Image::make($request->image)
                ->resize(700, 900, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(
                    public_path(
                        'uploads/topic_images/' .
                        $request->image->hashName()
                    )
                );
            $image = $request->image->hashName();
        }

        if($request['start'] == 1){
            $total_questions = $request['end'];
        }else{
            $total_questions = $request['end'] - $request['start'] + 1;
        }

//        dd($total_questions);


        TopicDetail::create([
            'image' => $image,
            'start_question' => $request['start'],
            'end_question' => $request['end'],
            'total_questions' => $total_questions,
            'topic_id' => $request['topic_id'],
            'type_id' => $request['type_id'],
        ]);

        if (!$request->ajax()) {
            return redirect()->route('topicDetails.index')->with('success', 'Topic Details Added Successfully!!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TopicDetail  $topicDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TopicDetail $topicDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TopicDetail  $topicDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TopicDetail $topicDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TopicDetail  $topicDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TopicDetail $topicDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TopicDetail  $topicDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TopicDetail $topicDetail)
    {
        if ($topicDetail->image != 'noImage.png') {
            Storage::disk('public_uploads')->delete(
                '/topic_images/' . $topicDetail->image
            );
        }

        $topicDetail->delete();
        return redirect()->route('topicDetails.index')->with('error', 'Topic Detail Deleted Successfully!!!');

    }
}
