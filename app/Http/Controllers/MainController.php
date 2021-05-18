<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $content = 'home';
        return view('main', compact('content'));
    }

    public function about() {
        $content = 'about';
        return view('main', compact('content'));
    }
}
