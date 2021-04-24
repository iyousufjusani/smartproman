<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Validation\Rule;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        $topics = Topic::paginate(6);
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
            'description' => 'required',
            'type_id' => 'required',
            'image' => 'required',
        ]);

        if ($request['type_id'] == null) {
            $request['type_id'] = 1;
        }

        if ($request->image) {
            Image::make($request->image)
                ->resize(250, 250, function ($constraint) {
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

        Topic::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'type_id' => $request['type_id'],
            'image' => $image,
        ]);

        if (!$request->ajax()) {
            return redirect()->route('topics.index')->with('success', 'Topic Added Successfully!!!');
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => [
                'required',
                Rule::unique('topics')->ignore($id)
            ],
            'description' => 'required',
            'type_id' => 'required',
            //'image' => 'required',
        ]);

        $topic = Topic::find($id);

        $topic->title = $request['title'];
        $topic->description = $request['description'];
        $topic->type_id = $request['type_id'];

        if ($request->image) {

            if ($topic->image != 'noImage.png') {
                Storage::disk('public_uploads')->delete(
                    '/topic_images/' . $topic->image
                );
            }

            Image::make($request->image)
                ->resize(250, 250, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(
                    public_path(
                        'uploads/topic_images/' .
                        $request->image->hashName()
                    )
                );
            $topic->image = $request->image->hashName();
        }

        $topic->save();

        if (!$request->ajax()) {
            return redirect()->route('topics.index')->with('success', 'Topic Updated Successfully!!!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        if ($topic->image != 'noImage.png') {
            Storage::disk('public_uploads')->delete(
                '/topic_images/' . $topic->image
            );
        }

        $topic->delete();
        return redirect()->route('topics.index')->with('error', 'Topic Deleted Successfully!!!');

    }
}
