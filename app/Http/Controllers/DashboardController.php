<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::where("user_id", Auth::user()->id)
            ->orderByDesc('updated_at')->get();
        return view('pages.dashboard')->with("posts", $posts);
    }
}
