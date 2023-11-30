<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class ButtonFilled extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $title,
        public string $icon,
        public string $href
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.button-filled');
    }
}
