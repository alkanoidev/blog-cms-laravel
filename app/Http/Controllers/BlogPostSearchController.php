<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostSearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $searchQuerey = $request->query('q');

        $posts = BlogPost::query()->where('title', 'LIKE', "%" . $searchQuerey . "%")->paginate(10);

        return view('pages.home', ['posts' => $posts]);
    }
}