<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogPostController extends Controller
{
    public function show()
    {
        return view("pages.create-new-post");
    }
    public function store(Request $request)
    {
        $blog = new BlogPost;

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = Auth::id();

        // na index page da se poravi nova
        // i onda na  save dugme samo update

        //poziva ovu funkciju iz forme pre nego sa jsa
        // vrv zato izbacuje gresku sql
        $blog->save();

        return redirect('/dashboard');
    }
}
