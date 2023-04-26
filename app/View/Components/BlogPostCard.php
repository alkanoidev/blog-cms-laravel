<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlogPostCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $imgSrc, public string $title, public string $description, public string $href
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog-post-card');
    }
}
