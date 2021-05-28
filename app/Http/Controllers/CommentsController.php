<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            return view('comments.index')->with('comments', Comment::orderBy('created_at', 'DESC')->get());
        } else {
            return view('comments.index')->with('comments', auth()->user()->comments);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'body' => 'required'
        ]);
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
        // policy
        $this->authorize('delete', $comment);
        // delete
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted!');
    }
}
