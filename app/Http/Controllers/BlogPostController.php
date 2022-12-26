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
        // Log::error($request->content."----------------------");
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = "123123"; 
        
        // na index page da se poravi nova
        // i onda na  save dugme samo update

        //poziva ovu funkciju iz forme pre nego sa jsa
        // vrv zato izbacuje gresku sql
        $blog->save();

        return redirect('/dashboard');
    }
}
