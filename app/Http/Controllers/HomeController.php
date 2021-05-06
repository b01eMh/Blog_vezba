<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    public function welcome()
    {
        return view('welcome')->with('posts', Post::latest()->paginate(5))->with('categories', Category::all());
    }

    public function categoryPosts($id)
    {
        $category = Category::findOrFail($id);
        return view('posts.category_posts')->with('posts', $category->posts)->with('categories', Category::all());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
