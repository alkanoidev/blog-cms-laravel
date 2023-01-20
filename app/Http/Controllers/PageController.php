<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // if (view()->exists("pages.{$page}")) {
        //     return view("pages.{$page}");
        // }

        // return abort(404);
        return view("pages.dashboard");
    }

    public function profile()
    {
        return view("pages.profile-static");
    }
}
