<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.postList',['datas'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.postCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imagePath = $request->file('image')->store('images', 'public');

        $data = new Post;
        $data->title = $request->title;
        $data->content = $request->content;
        $data->image = $imagePath;
        $data->save();
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Post::findOrFail($id);
        return view('posts.postDetail',['post'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Post::findOrFail($id);
        return view('posts.postUpdate',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = Post::findOrFail($id);
        $data->title = $request->title;
        $data->content = $request->content;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data->image = $imagePath;
        }
        $data->save();
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}