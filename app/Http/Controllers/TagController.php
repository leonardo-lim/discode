<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Thread;
use App\Reply;
use App\Profile;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('created_at', 'desc')->get();
        $total = Tag::count();
        $content = 'tag';
        return view('main', compact('tags', 'total', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $content = 'createTag';
        $tags = Tag::all();
        return view('main', compact('content', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | max:255 | unique:tags,name'
        ]);
        
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();
        return redirect(url('/tag'))->with('success', 'A tag added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        $threads = Thread::all();
        $total = Thread::count();
        $profiles = Profile::all();
        $replies = Reply::with('user')->orderBy('created_at', 'desc')->get();
        $content = 'tagDetail';
        return view('main', compact('tag', 'threads', 'total', 'profiles', 'replies', 'content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        $content = 'editTag';
        return view('main', compact('tag', 'content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required | max:255'
        ]);

        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->updated_at = date('Y-m-d H:i:s');
        $tag->save();

        return redirect(url('/tag'))->with('success', 'A tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->thread()->detach();
        $tag->delete();

        return back()->with('success', 'A tag deleted successfully.');
    }
}
