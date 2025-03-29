<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view("posts.index", compact("posts"));
    }

    public function show(Post $post) {
        return view("posts.show", compact("post"));
    }

    public function create(Post $post) {
        $categories = Category::all();

        return view("posts.create", compact("post", "categories"));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "content" => ["required", "max:100"],
            "category_id" => []
        ]);
        Post::create([
            "content" => $validated["content"],
            "category_id" => $validated["category_id"]
        ]);
        return redirect("/posts");
    }

    public function edit(Post $post) {
        $categories = Category::all();

        return view("posts.edit", compact("post", "categories"));
    }

    public function update(Request $request, Post $post) {
        $validated = $request->validate([
            "content" => ["required", "max:100"],
            "category_id" => []
        ]);

        $post->content = $validated["content"];
        $post->category_id = $validated["category_id"];
        $post->save();

        return redirect("/posts");
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect("/posts");
    }
}
