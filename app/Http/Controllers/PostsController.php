<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Category;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkCategories')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', auth()->user()->posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if ($request->post_image) {
            $image = $request->post_image->store('images', 'public');
        }
        auth()->user()->posts()->create([
            'title' => $request->title,
            'post_image' => $image ?? '',
            'body' => $request->body,
            'category_id' => $request->category_id
        ]);
        return redirect(route('posts.index'))->with('success', 'Post created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post)->with('categories', Category::all())->with('comments', $post->comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $inputs = $request->only(['title', 'body']);
        if ($request->hasFile('post_image')) {
            $image = $request->post_image->store('images', 'public');
            unlink('storage/' . $post->post_image);
            $inputs['post_image'] = $image;
        }
        // policy
        $this->authorize('update', $post);
        // update
        $post->update($inputs);
        return redirect(route('posts.index'))->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // policy
        $this->authorize('delete', $post);
        //delete
        unlink('storage/' . $post->post_image);
        $post->delete();
        return redirect(route('posts.index'))->with('success', 'Post deleted!');
    }
}
