<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $todos = Post::all();
        return view("posts.index", compact("posts"));
    }

    public function show(Post $post) {
        return view("posts.show", compact("post"));
    }

    public function create(ToDo $todo) {
        return view("posts.create", compact("post"));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "content" => ["required", "max:50"]
        ]);
        Post::create([
            "content" => $validated["content"]
        ]);
        return redirect("/posts");
    }

    public function edit(Post $post) {
        return view("posts.edit", compact("post"));
    }

    public function update(Request $request, Post $post) {
        $validated = $request->validate([
            "content" => ["required", "max:50"]
        ]);

        $post->content = $validated["content"];
        $post->save();

        return redirect("/posts");
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect("/posts");
    }
}
