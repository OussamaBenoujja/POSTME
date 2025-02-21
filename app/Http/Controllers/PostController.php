<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'users_id' => 1 // Replace with authenticated user ID when implementing authentication
        ]);

        return redirect()->back();
    }

    public function like(Post $post)
    {
        $post->likes()->create(['users_id' => 1]); // Replace with authenticated user ID
        return redirect()->back();
    }
}
