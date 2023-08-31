<?php

namespace App\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function view;

class SelectField extends Component
{

    /**
     * Create the component instance.
     *
     * @param string $name
     * @param array $options
     * @param string|null $label
     * @param string|null $width
     * @param string|null $value
     * @param string|null $id
     * @param bool|null $isMultiple
     */
    public function __construct(
        public string  $name,
        public array   $options,
        public ?string $label = '',
        public ?string $width = null,
        public ?string $value = null,
        public ?string $id = null,
        public ?bool $isMultiple = false
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.forms.select-field');
    }
}
