<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment;
        $comment->comment = $validatedData['comment'];
        $comment->user_id = auth()->user()->id;
        $comment->commentable_type = 'App\Models\Post';
        $comment->commentable_id = $request->input('post_id');
        $comment->save();

        return back()->with('success', 'Your comment has been saved.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return back()->with('success', 'Your comment has been deleted.');
    }
}