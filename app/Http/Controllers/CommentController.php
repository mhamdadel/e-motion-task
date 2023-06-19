<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();

        return view('comments.index', compact('comments'));
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
        $comment->commentable_type = Post::class; // Change to the appropriate model
        $comment->commentable_id = $request->input('post_id'); // Change to the appropriate input name
        $comment->parent_id = $request->input('parent_id'); // Change to the appropriate input name
        $comment->save();

        return redirect()->route('comments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);

        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $validatedData = $request->validate([
            'comment' => 'required',
        ]);

        $comment->comment = $validatedData['comment'];
        $comment->save();

        return redirect()->route('comments.show', $comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect()->route('comments.index');
    }
}