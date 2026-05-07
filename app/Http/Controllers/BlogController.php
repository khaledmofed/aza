<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::published()->with('images')->paginate(9);

        return view('frontend.blog.index', compact('posts'));
    }

    public function show(string $slug)
    {
        $post    = BlogPost::published()->with('images')->where('slug', $slug)->firstOrFail();
        $related = BlogPost::published()->where('id', '!=', $post->id)->take(3)->get();

        return view('frontend.blog.show', compact('post', 'related'));
    }
}
