<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogPostController extends Controller
{
    public function store(Request $request)
    {
        $blog = new BlogPost;
        Log::error($request->content."----------------------");
        $blog->title = "aaa";
        $blog->content = $request->content;
        $blog->user_id = "123123";
        $blog->save();

        return redirect('/dashboard');
    }
}
