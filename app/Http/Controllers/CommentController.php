<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function create(Comment $comment) {
        return view("comments.show", compact("comment"));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "author" => ["required", "max:50"],
            "comment" => ["required", "max:255"],
            "post_id" => ["required"]
        ]);
        Comment::create([
            "author" => $validated["author"],
            "comment" => $validated["comment"],
            "post_id" => $validated["post_id"]
        ]);
        return redirect("/posts");
    }
}
