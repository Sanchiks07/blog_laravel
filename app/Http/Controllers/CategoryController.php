<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view("categories.index", compact("categories"));
    }

    public function show(Category $category) {
        return view("categories.show", compact("category"));
    }

    public function create(Category $category) {
        return view("categories.create", compact("category"));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "category_name" => ["required", "min:3", "max:25"]
        ]);
        Category::create([
            "category_name" => $validated["category_name"]
        ]);
        return redirect("/categories");
    }

    public function edit(Category $category) {
        return view("categories.edit", compact("category"));
    }

    public function update(Request $request, Category $category) {
        $validated = $request->validate([
            "category_name" => ["required", "min:3", "max:25"]
        ]);

        $category->category_name = $validated["category_name"];
        $category->save();

        return redirect("/categories");
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect("/categories");
    }
}
