<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Reply;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::with('user')->orderBy('updated_at', 'desc')->get();
        $total = Thread::count();
        $content = 'thread';
        return view('main', compact('threads', 'total', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $content = 'create';
        return view('main', compact('content'));
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
        $thread->save();

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
        $content = 'detail';
        $replies = Reply::with('user')->orderBy('updated_at', 'desc')->get();
        // $users = Reply::with('user')->get();
        // $dataUser = User::with('thread')->orderBy('updated_at', 'desc')->where('id', $id)->get();
        // dd($dataReply);
        return view('main', compact('thread', 'replies', 'content'));
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
