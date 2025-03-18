<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function create(Comment $comment) {
        return view("posts.show", compact("comment"));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "author" => ["required", "max:50"],
            "comment" => ["required", "max:255"]
        ]);
        Post::create([
            "author" => $validated["author"],
            "comment" => $validated["comment"]
        ]);
        return redirect("/posts");
    }
}
