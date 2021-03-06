<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;
use App\Thread;
use App\Reply;
use App\Like;
use App\Dislike;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        $profiles = Profile::all();
        $total = User::count();
        $content = 'user';
        return view('main', compact('users', 'profiles', 'total', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createprofile');
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
            'full_name' => 'required | max:255',
            'job' => 'required | max:255',
            'gender' => 'required',
            'date_of_birth' => 'required | max:255',
            'region' => 'required | max:255',
            'bio' => 'max:255'
        ]);

        $profile = new Profile;
        $profile->full_name = $request->full_name;
        $profile->job = $request->job;
        $profile->gender = $request->gender;
        $profile->date_of_birth = $request->date_of_birth;
        $profile->region = $request->region;
        $profile->bio = $request->bio;
        $profile->user_id = Auth::id();
        $profile->save();

        return redirect(url('/user' . '/' . Auth::id()))->with('success', 'A profile created successfully.');
    }

    public function changepassword()
    {
        $profiles = Profile::all();
        return view('changepassword', compact('profiles'));
    }

    public function updatepassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required | string | min:8 | max:255',
            'password' => 'required | string | min:8 | max:255 | confirmed',
        ]);

        $user = auth()->user();

        if (Hash::check($request->old_password, $user->password)) {
            $user = User::find($id);
            $user->password = Hash::make($request->password);
            return redirect(url('/'))->with('success', 'Your password changed successfully.');
        } else {
            return back()->with('error', 'You have entered the wrong password');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $profiles = Profile::all();
        $likes = Like::all();
        $dislikes = Dislike::all();
        $threads = Thread::all();
        $replies = Reply::all();
        $content = 'userDetail';
        return view('main', compact('user', 'profiles', 'likes', 'dislikes', 'threads', 'replies', 'content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $profiles = Profile::all();
        $content = 'editUser';
        return view('main', compact('user', 'profiles', 'content'));
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
            'full_name' => 'required | max:255',
            'job' => 'required | max:255',
            'gender' => 'required | max:255',
            'date_of_birth' => 'required | max:255',
            'region' => 'required | max:255',
            'bio' => 'max:255'
        ]);

        $profile = Profile::find($id);
        $profile->full_name = $request->full_name;
        $profile->job = $request->job;
        $profile->gender = $request->gender;
        $profile->date_of_birth = $request->date_of_birth;
        $profile->region = $request->region;
        $profile->bio = $request->bio;
        $profile->save();

        return redirect(url('/user')  . '/' . Auth::id())->with('success', 'Your account updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->profile()->delete();
        $user->thread()->delete();
        $user->reply()->delete();
        $user->like()->delete();
        $user->dislike()->delete();
        $user->delete();

        return redirect(url('/'))->with('success', 'Your account deleted successfully.');
    }
}
