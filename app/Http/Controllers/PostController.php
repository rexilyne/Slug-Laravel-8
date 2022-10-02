<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    //
    public function store(Request $request) {
        $post = new Post();

        $post->title = $request->title;
        $post->slug = Str::slug($post->title, '-');
        $post->body = $request->body;
        $post->save();

        return back();
    }

    public function index() {
        $posts = Post::all();
        return view('posts', ['posts' => $posts]);
    }
}
