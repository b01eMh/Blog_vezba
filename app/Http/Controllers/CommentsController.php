<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        return view('comments.index')->with('comments', auth()->user()->comments);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $data = [
            'post_id' => $request->post_id,
            'author' => $user->name,
            'email' => $user->email,
            'body' => $request->body
        ];
        auth()->user()->comments()->create($data);
        return redirect()->back()->with('success', 'Comment created!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted!');
    }
}
