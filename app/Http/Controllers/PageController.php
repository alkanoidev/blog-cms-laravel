<?php

namespace App\Http\Controllers;

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
        return view("pages.dashboard");
    }
}
