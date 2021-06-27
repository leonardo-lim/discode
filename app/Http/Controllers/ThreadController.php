<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Thread;
use App\Reply;
use App\Profile;
use App\Tag;
use App\Like;
use App\Dislike;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $threads = Thread::with('user')->get();
        $profiles = Profile::all();
        $total = Thread::count();
        $likes = Like::all();
        $dislikes = Dislike::all();
        $content = 'thread';
        return view('main', compact('threads', 'profiles', 'likes', 'dislikes', 'total', 'content'));
    }

    public function index2()
    {
        $threads = Thread::with('user')->orderBy('created_at', 'asc')->get();
        $profiles = Profile::all();
        $total = Thread::count();
        $likes = Like::all();
        $dislikes = Dislike::all();
        $content = 'oldestthread';
        return view('main', compact('threads', 'profiles', 'likes', 'dislikes', 'total', 'content'));
    }

    public function index3()
    {
        $threads = Thread::with('user')->orderBy('created_at', 'desc')->get();
        $profiles = Profile::all();
        $total = Thread::count();
        $likes = Like::all();
        $dislikes = Dislike::all();
        $content = 'latestthread';
        return view('main', compact('threads', 'profiles', 'likes', 'dislikes', 'total', 'content'));
    }

    public function mythread()
    {
        $threads = Thread::with('user')->orderBy('created_at', 'desc')->get();
        $profiles = Profile::all();
        $likes = Like::all();
        $dislikes = Dislike::all();
        $content = 'mythread';
        return view('main', compact('threads', 'profiles', 'likes', 'dislikes', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $content = 'create';
        $profiles = Profile::all();
        $tags = Tag::all();
        return view('main', compact('content', 'profiles', 'tags'));
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
        $thread->user_id = Auth::id();
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
        $profiles = Profile::all();
        $likes = Like::all();
        $dislikes = Dislike::all();
        $replies = Reply::with('user')->orderBy('created_at', 'desc')->get();
        $content = 'detail';
        
        return view('main', compact('thread', 'profiles', 'likes', 'dislikes', 'replies', 'content'));
    }

    public function lock($id)
    {
        $thread = Thread::find($id);
        $thread->is_locked ? $thread->is_locked = 0 : $thread->is_locked = 1;
        $is_locked = $thread->is_locked;
        $thread->timestamps = false;
        $thread->save();
        return $thread->is_locked ? back()->with(compact('is_locked'))->with('success', 'Thread locked successfully.') : back()->with(compact('is_locked'))->with('success', 'Thread opened successfully.');
    }

    public function like($id)
    {
        $check = false;
        $likes = Like::all();
        $dislikes = Dislike::all();

        foreach ($likes as $like) {
            if ($like->thread_id == $id && $like->user_id == Auth::id()) {
                $like->is_liked ? $like->is_liked = 0 : $like->is_liked = 1;
                $is_liked = $like->is_liked;
                $like->save();
                $check = true;
            }
        }

        if (!$check) {
            $like = new Like;
            $like->is_liked ? $like->is_liked = 0 : $like->is_liked = 1;
            $like->thread_id = $id;
            $like->user_id = Auth::id();
            $is_liked = $like->is_liked;
            $like->save();
        }

        foreach ($dislikes as $dislike) {
            if ($dislike->thread_id == $id && $dislike->user_id == Auth::id() && $dislike->is_disliked) {
                $dislike->is_disliked = 0;
                $dislike->save();
                break;
            }
        }
        
        $is_disliked = $dislike->is_disliked;

        return redirect(url('/thread' . '/' . $id))->with(compact('is_liked', 'is_disliked'));
    }

    public function dislike($id)
    {
        $check = false;
        $likes = Like::all();
        $dislikes = Dislike::all();

        foreach ($dislikes as $dislike) {
            if ($dislike->thread_id == $id && $dislike->user_id == Auth::id()) {
                $dislike->is_disliked ? $dislike->is_disliked = 0 : $dislike->is_disliked = 1;
                $is_disliked = $dislike->is_disliked;
                $dislike->save();
                $check = true;
            }
        }

        if (!$check) {
            $dislike = new Dislike;
            $dislike->is_disliked ? $dislike->is_disliked = 0 : $dislike->is_disliked = 1;
            $dislike->thread_id = $id;
            $dislike->user_id = Auth::id();
            $is_disliked = $dislike->is_disliked;
            $dislike->save();
        }

        foreach ($likes as $like) {
            if ($like->thread_id == $id && $like->user_id == Auth::id() && $like->is_liked) {
                $like->is_liked = 0;
                $like->save();
                break;
            }
        }

        $is_liked = $like->is_liked;

        return redirect(url('/thread' . '/' . $id))->with(compact('is_liked', 'is_disliked'));
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
        $profiles = Profile::all();
        $content = 'edit';
        return view('main', compact('thread', 'profiles', 'content'));
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
        $thread->reply()->delete();
        $thread->tag()->detach();
        $thread->delete();

        return redirect(url('/thread'))->with('success', 'A thread deleted successfully.');
    }
}
