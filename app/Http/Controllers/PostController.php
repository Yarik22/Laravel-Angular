<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController
{
    public function userPosts()
{
    $posts = Post::where('user_id', auth()->id())->get();
    return view('posts.user.index', compact('posts'));
}
    public function index()
    {
        $posts = Post::where('status', 'published')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('posts.index')->with('error', 'You do not have permission to edit this post.');
        }

        return view('posts.edit', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg|max:50',
            'status' => 'required|in:draft,published',
        ], [
            'title.required' => 'The title is required.',
            'content.required' => 'The content is required.',
            'image.mimes' => 'The image must be a file of type: jpg, jpeg.',
            'image.max' => 'The image may not be greater than 50 KB.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The selected status is invalid.',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->status = $request->status;

        if ($request->hasFile('image')) {
            $post->image = file_get_contents($request->file('image')->getRealPath());
        }

        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('posts.user.index')->with('success', 'Post created successfully.');
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('posts.index')->with('error', 'You do not have permission to update this post.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg|max:50',
            'status' => 'required|in:draft,published',
        ], [
            'title.required' => 'The title is required.',
            'content.required' => 'The content is required.',
            'image.mimes' => 'The image must be a file of type: jpg, jpeg.',
            'image.max' => 'The image may not be greater than 50 KB.',
            'status.required' => 'The status field is required.',
            'status.in' => 'The selected status is invalid.',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;

        if ($request->hasFile('image')) {
            $post->image = file_get_contents($request->file('image')->getRealPath());
        }

        $post->status = $request->status;
        $post->save();

        return redirect()->route('posts.user.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('posts.index')->with('error', 'You do not have permission to delete this post.');
        }

        $post->delete();
        return redirect()->route('posts.user.index')->with('success', 'Post deleted successfully.');
    }
}
