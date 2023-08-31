<?php

namespace App\View\Components\Actions;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function view;

class SubmitButton extends Component
{

    /**
     * Create the component instance.
     *
     * @param string $title
     * @param string $loadingMessage
     */
    public function __construct(public string $title = 'Submit', public string $loadingMessage = 'Please wait...')
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.actions.submit-button');
    }
}
