<?php

namespace App\Services\Setting;

use App\Foundation\Models\BaseModel;
use App\Foundation\Services\BaseService;
use App\Models\Setting\Setting;
use Illuminate\Database\Eloquent\Model;

class GetSettingService extends BaseService
{
    /**
     * GetSettingService Construct
     * @param BaseModel $collection
     */
    public function __construct(private readonly BaseModel $collection = new Setting())
    {}

    /**
     * @return Model|null
     */
    public function execute(): Model|null
    {
        return $this->collection->query()->first();
    }
}
