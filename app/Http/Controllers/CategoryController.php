<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view("pages.categories");
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            "title" => "required|unique:category|max:30",
            "description" => "max:256",
            "icon" => "required|image|mimes:svg"
        ]);

        $slug = Str::slug($request->title);

        $category = new Category;
        $category->title = Str::headline($request->title);
        $category->description = $request->description;
        $category->icon = File::get($request->icon);
        $category->slug = $slug;

        $category->save();

        return redirect()
            ->route('category.index')
            ->with(["success" => "Category successfully created!"]);
    }

    public function show(Category $category)
    {
        $categories = Category::all();
        $highlightedPost = Post::latest()->first();
        $category = Category::find($category->id);
        $posts = $category->posts()->orderByDesc("updated_at")->paginate(10);

        return view('pages.category')->with([
            'posts' => $posts,
            'highlightedPost' => $highlightedPost,
            'categories' => $categories,
            'category' => $category,
        ]);
    }

    public function edit(Category $category)
    {
        return view('pages.edit-category', ["category" => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $validator = $request->validate([
            "title" => "required|max:30",
            "description" => "max:256",
            "icon" => "required|image|mimes:svg"
        ]);

        $slug = Str::slug($request->title);

        $category->title = $request->title;
        $category->description = $request->description;
        $category->icon = File::get($request->icon);
        $category->slug = $slug;

        $category->save();

        return redirect()
            ->route('category.index')
            ->with(["success" => "Category successfully updated!"]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
