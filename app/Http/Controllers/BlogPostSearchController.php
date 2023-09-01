<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostSearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $searchQuerey = $request->query('q');

        $result = BlogPost::query()->where('title', 'LIKE', "%" . $searchQuerey . "%")->paginate(10);

        $highlightedPost = BlogPost::latest()->first();

        return view('pages.home', ["result" => $result, "highlightedPost" => $highlightedPost]);
    }
}
