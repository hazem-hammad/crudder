<?php

namespace App\Modules\BaseModule\Services;

use App\Foundation\Models\BaseModel;
use App\Foundation\Services\BaseService;
use App\Modules\BaseModule\Models\BaseModule;

class ChangeBaseModuleStatusService extends BaseService
{
    public function __construct(protected BaseModel $resource = new BaseModule())
    {
    }


    public function change()
    {
        $this->resource->status
            ? $this->resource->update(['status' => false])
            : $this->resource->update(['status' => true]);
    }

}
