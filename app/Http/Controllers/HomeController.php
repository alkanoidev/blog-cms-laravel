<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('updated_at')->paginate(10);
        $highlightedPost = $posts[0];

        return view('pages.home')->with(['posts' => $posts, "highlightedPost" => $highlightedPost]);
    }
}
