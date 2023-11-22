<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("pages.categories")->with("categories", $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('pages.edit-category', ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validator = $request->validate([
            "title" => "required|max:30",
            "description" => "max:256",
            "icon" => "required|image|mimes:svg"
        ]);

        $slug = Str::slug($request->title);

        $category->title = Str::headline($request->title);
        $category->description = $request->description;
        $category->icon = File::get($request->icon);
        $category->slug = $slug;

        $category->save();

        return redirect()
            ->route('category.index')
            ->with(["success" => "Category successfully updated!"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
