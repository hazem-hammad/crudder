<?php

namespace App\Foundation\View\Components\Layouts;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function view;

class Header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('Core::components.layouts.header');
    }
}
