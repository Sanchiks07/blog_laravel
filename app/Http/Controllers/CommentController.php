<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Comment $comment) {
        return view("comment.create", compact("comment"));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "author" => ["required", "max:50"],
            "comment" => ["required", "max:100"],
            "post_id" => ["required"]
        ]);
        Comment::create([
            "author" => $validated["author"],
            "comment" => $validated["comment"],
            "post_id" => $validated["post_id"],
        ]);
        return redirect("/posts/" . $validated["post_id"]);
    }

    public function edit(Comment $comment) {
        return view("comments.edit", compact("comment"));
    }

    public function update(Request $request, Comment $comment) {
        $validated = $request->validate([
            "author" => ["required", "max:50"],
            "comment" => ["required", "max:100"]
        ]);

        $comment->author = $validated["author"];
        $comment->comment = $validated["comment"];
        $comment->save();

        return redirect("/posts");
    }

    public function destroy(Comment $comment) {
        $comment->delete();
        return redirect("/posts");
    }
}