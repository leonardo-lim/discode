<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class MainController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        $content = 'home';
        return view('main', compact('profiles', 'content'));
    }

    public function about()
    {
        $profiles = Profile::all();
        $content = 'about';
        return view('main', compact('profiles', 'content'));
    }
}
