<?php

namespace App\Modules\BaseModule\Services;

use App\Modules\BaseModule\Models\BaseModule;

readonly class DeleteBaseModuleService
{
    /**
     * DeleteBaseModuleService constructor.
     *
     * @param BaseModule $model
     */
    public function __construct(private BaseModule $model)
    {
    }

    /**
     * @return void
     */
    public function handle(): void
    {
        $this->model->delete();
    }
}
