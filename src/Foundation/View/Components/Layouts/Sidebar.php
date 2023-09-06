<?php

namespace App\Foundation\View\Components\Layouts;

use App\Foundation\Services\General\Auth\GetAuthAdminService;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function view;

class Sidebar extends Component
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
        $user = (new GetAuthAdminService())->get();

        return view('Core::components.layouts.sidebar', ['user' => $user]);
    }
}
