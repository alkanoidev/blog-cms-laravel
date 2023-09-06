<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = BlogPost::where("user_id", Auth::user()->id)->get();
        return view('pages.dashboard')->with("posts", $posts);
    }
}
