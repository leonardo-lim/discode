<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Reply;
use App\Profile;
use App\Tag;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::with('user')->orderBy('created_at', 'desc')->get();
        $profiles = Profile::all();
        $total = Thread::count();
        $content = 'thread';
        return view('main', compact('threads', 'profiles', 'total', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $content = 'create';
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
            'title' => 'required | max:255',
            'content' => 'required | max:255'
        ]);

        $thread = new Thread;
        $thread->title = $request->title;
        $thread->content = $request->content;
        $thread->user_id = 1;
<<<<<<< HEAD
        // dd($thread);
        // $thread->tag()->attach($thread->id);

        // $tag = new Tag;
        // $text = $request->tag;
        // $len = strlen($text);
        // $tags = array();
        // $temp = '';

        // for ($i = 0; $i < $len; $i++) {
        //     if ($i > 0 && $text[$i] === ' ' && $text[$i - 1] != ' ') {
        //         array_push($tags, $temp);
        //         $temp = '';
        //     } else if ($text[$i] != ' ') {
        //         $temp .= $text[$i];
        //     }
        // }

        // if ($temp != '') array_push($tags, $temp);
=======
        
        $tag = new Tag;
        $text = $request->tag;
        $len = strlen($text);
        $tags = array();
        $temp = '';

        for ($i = 0; $i < $len; $i++) {
            if ($i > 0 && $text[$i] === ' ' && $text[$i - 1] != ' ') {
                array_push($tags, $temp);
                $temp = '';
            } else if ($text[$i] != ' ') {
                $temp .= $text[$i];
            }
        }

        if ($temp != '') array_push($tags, $temp);
>>>>>>> e6eb6a2fcb2dd4d06ba3ef10f0107a87c994fb42

        // $totalTag = count($tags);

        // for ($i = 0; $i < $totalTag; $i++) {
        //     $tag->name = $tags[$i];
        // }

        // $tag->save();
<<<<<<< HEAD
        // $thread->tag()->sync($tags);
=======
        $thread->tag()->sync($tags);
>>>>>>> e6eb6a2fcb2dd4d06ba3ef10f0107a87c994fb42
        $thread->save();
        $thread->tag()->attach($request->tag);

        return redirect(url('/thread'))->with('success', 'A thread added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thread = Thread::find($id);
<<<<<<< HEAD
        // dd($thread);
=======
>>>>>>> e6eb6a2fcb2dd4d06ba3ef10f0107a87c994fb42
        $profiles = Profile::all();
        $replies = Reply::with('user')->orderBy('created_at', 'desc')->get();
        $content = 'detail';
        
        return view('main', compact('thread', 'profiles', 'replies', 'content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thread = Thread::find($id);
        $content = 'edit';
        return view('main', compact('thread', 'content'));
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
            'title' => 'required | max:255',
            'content' => 'required | max:255'
        ]);

        $thread = Thread::find($id);
        $thread->title = $request->title;
        $thread->content = $request->content;
        $thread->updated_at = date('Y-m-d H:i:s');
        $thread->save();

        return redirect(url('/thread'))->with('success', 'A thread updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thread = Thread::find($id);
        $thread->delete();

        return redirect(url('/thread'))->with('success', 'A thread deleted successfully.');
    }
}
