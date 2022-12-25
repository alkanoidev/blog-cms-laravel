<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function store(Request $request) {
        $blog = new BlogPost;
        error_log($request);
        $blog->content_html = $request->content;
        $blog->title = "aaa";
        $blog->user_id = "123123";
        $blog->save();
        return redirect('/dashboard');
    }
}
