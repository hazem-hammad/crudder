<?php

namespace App\Foundation\View\Components\Actions;

use App\Foundation\Models\BaseModel;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function view;

class EditButton extends Component
{

    /**
     * Create the component instance.
     *
     * @param string $title
     * @param string $icon
     * @param string|null $class
     * @param string|null $url
     * @param string $actionType
     * @param string $modalId
     * @param BaseModel|null $resource
     */
    public function __construct(
        public string         $title = 'Edit',
        public string         $icon = 'fas fa-trash',
        public string|null    $class = null,
        public string|null    $url = null,
        public string         $actionType = 'url', // url - popup
        public string         $modalId = '',
        public BaseModel|null $resource = null)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('Core::components.actions.edit-button');
    }
}
