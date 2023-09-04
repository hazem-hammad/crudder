<?php

namespace App\Modules\BaseModule\Services;

use App\Foundation\Services\BaseService;
use App\Modules\BaseModule\Models\BaseModule;

class DeleteBaseModuleService extends BaseService
{
    /**
     * DeleteBaseModuleService constructor.
     *
     * @param BaseModule $model
     */
    public function __construct(private readonly BaseModule $model)
    {
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        $this->model->delete();
    }
}
