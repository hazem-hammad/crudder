<?php

namespace App\Modules\BaseModule\Services;

use App\Enums\Datatable;
use App\Foundation\Models\BaseModel;
use App\Foundation\Services\BaseService;
use App\Modules\BaseModule\Models\BaseModule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class GetBaseModulesService extends BaseService
{
    /**
     * GetAdminsService constructor
     * @param BaseModel $collection
     */
    public function __construct(private readonly BaseModel $collection = new BaseModule())
    {
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return $this->collection->newQuery();
    }

    /**
     * @return Builder
     */
    public function getForDataTable(): Builder
    {
        return $this->query()->filter($this->filters)->limit(Datatable::PER_PAGE->value);
    }

    /**
     * @return Collection
     */
    public function execute(): Collection
    {
        return $this->query()->get();
    }
}
