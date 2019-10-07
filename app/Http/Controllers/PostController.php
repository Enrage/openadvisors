<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller {
    public function index() {
        $posts = Post::where('visible', '1')->orderBy('id', 'desc')->get();
        return view('pages.posts', compact('posts'));
    }

    public function post($slug) {
        $post = Post::where('slug', $slug)->first();
        return view('pages.post', compact('post'));
    }
}