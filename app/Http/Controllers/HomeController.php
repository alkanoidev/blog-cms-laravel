<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = BlogPost::paginate(10);
        $highlightedPost = BlogPost::latest()->first();

        return view('pages.home')->with(['posts' => $posts, "highlightedPost" => $highlightedPost]);
    }
}
