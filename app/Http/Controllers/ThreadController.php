<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::orderBy('updated_at', 'desc')->get();
        $content = 'thread';
        // dd($threads);
        return view('main', compact('threads', 'content'));
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

        Thread::create($request->all());
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
        $content = 'reply';
        $dataReply = Thread::with('user', 'reply')->orderBy('updated_at', 'desc')->where('id', $id)->get();
        // $dataUser = User::with('thread')->orderBy('updated_at', 'desc')->where('id', $id)->get();
        // dd($dataReply);
        return view('main', compact('dataReply', 'content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = 'edit';
        $thread = Thread::where('id', $id)->first();
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
        Thread::where('id', '=', $id)->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return redirect(url('/thread') . '/' . $request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
