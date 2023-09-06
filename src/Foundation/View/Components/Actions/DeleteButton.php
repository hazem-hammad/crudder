<?php

namespace App\Foundation\View\Components\Actions;

use App\Foundation\Models\BaseModel;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function view;

class DeleteButton extends Component
{

    /**
     * Create the component instance.
     *
     * @param string $title
     * @param string $icon
     * @param string|null $class
     * @param string|null $function
     * @param string|null $url
     * @param BaseModel|null $model
     */
    public function __construct(
        public string         $title = 'Delete',
        public string         $icon = 'fas fa-trash',
        public string|null    $class = null,
        public string|null    $function = null,
        public string|null    $url = null,
        public BaseModel|null $model = null)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('Core::components.actions.delete-button');
    }
}
