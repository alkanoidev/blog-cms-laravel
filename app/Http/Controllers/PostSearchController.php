<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostSearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $searchQuerey = $request->query('q');

        $result = Post::query()
            ->where('title', 'LIKE', "%" . $searchQuerey . "%")
            ->orderByDesc('updated_at')
            ->paginate(10);

        $highlightedPost = Post::latest()->first();

        return view('pages.home', ["result" => $result, "highlightedPost" => $highlightedPost]);
    }
}
