<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller{
    public function default()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('pages.index')->with('posts', $posts);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    // public function post(){
    //     return view('pages.post');
    // }
}
