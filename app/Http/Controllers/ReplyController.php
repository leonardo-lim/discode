<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reply;
use App\Thread;
use App\Profile;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profiles = Profile::all();
        $content = 'detail';
        return view('main', compact('profiles', 'content'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'content' => 'required | max:255'
        ]);

        $reply = new Reply();
        $reply->content = $request->content;
        $reply->user_id = Auth::id();
        $reply->thread_id = $id;
        $reply->save();

        return redirect(url('/thread') . '/' . $id)->with('success', 'A thread replied successfully.');
    }

    public function store2(Request $request, $id)
    {
        $request->validate([
            'content' => 'required | max:255'
        ]);

        $reply = new Reply();
        $reply->content = $request->content;
        $reply->user_id = Auth::id();
        $reply->parent_id = $id;
        $reply->thread_id = $request->thread_id;
        $reply->save();

        return redirect(url('/thread') . '/' . $reply->thread_id)->with('success', 'A reply replied successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reply = Reply::find($id);
        $profiles = Profile::all();
        $content = 'editReply';
        return view('main', compact('reply', 'profiles', 'content'));
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
            'content' => 'required | max:255'
        ]);

        $reply = Reply::find($id);
        $reply->content = $request->content;
        $reply->updated_at = date('Y-m-d H:i:s');
        $reply->save();

        return redirect(url('/thread')  . '/' . $reply->thread_id)->with('success', 'A reply updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reply = Reply::find($id);
        $reply->replies()->delete();
        $reply->delete();

        return back()->with('success', 'A reply deleted successfully.'); 
    }
}
