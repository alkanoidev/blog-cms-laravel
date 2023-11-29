<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10);
        $highlightedPost = Post::latest()->first();
        $categories = Category::all();

        return view('pages.home')->with(['posts' => $posts, "highlightedPost" => $highlightedPost, 'categories' => $categories]);
    }
}
