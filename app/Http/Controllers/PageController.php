<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Topic;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::where('is_active', 1)->get();
        $pages = Page::where('is_active', 1)->paginate(10);
        return view('Admin.pages.index', compact('topics', 'pages'));
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
            'title' => 'required|unique:pages,title',
            'image' => 'required',
            'topic_id' => 'required',
            //'image' => 'required',
        ]);

        if($request['type_id'] == null){
            $request['type_id'] = 1;
        }

        Page::create([
            'title' => $request['title'],
//            'image' => $request['link'],
            'topic_id' => $request['topic_id'],
        ]);

        if (!$request->ajax()) {
            return redirect()->route('pages.index')->with('success', 'Topic Image Added Successfully!!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
}
