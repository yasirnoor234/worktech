<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        //Data display in array format Die & Dumping
        // dd(Post::all());
        $posts = Post::all();

        return view('posts.index',['posts'=> $posts]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        Post::create([
            'title' => 'required',
            'content' => 'required',
        ]);
        return redirect()->route('posts.index')
                        ->with('success','Product created successfully.');
    }

    public function edit(Post $post)
    {
        return view('posts.edit',['post'=> $post]);
    }
}
