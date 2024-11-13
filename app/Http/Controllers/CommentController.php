<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tmdb_id' => 'required',
            'type' => 'required',
            'content' => 'required|string',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'tmdb_id' => $request->tmdb_id,
            'type' => $request->type,
            'content' => $request->content,
        ]);

        return back();
    }

    public function reply(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'tmdb_id' => $comment->tmdb_id,
            'type' => $comment->type,
            'content' => $request->content,
            'parent_id' => $comment->id,
        ]);

        return back();
    }
}
