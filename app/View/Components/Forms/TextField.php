<?php

namespace App\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function view;

class TextField extends Component
{

    /**
     * Create the component instance.
     *
     * @param string $name
     * @param string|null $label
     * @param string|null $width
     * @param string|null $value
     */
    public function __construct(
        public string  $name,
        public ?string $label = '',
        public ?string $width = null,
        public ?string $value = null)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.forms.text-field');
    }
}
