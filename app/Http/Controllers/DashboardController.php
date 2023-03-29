<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class DashboardController extends Controller
{
    public function index() {
        $posts = BlogPost::all();
        return view('pages.dashboard')->with("posts", $posts);
    }
}
