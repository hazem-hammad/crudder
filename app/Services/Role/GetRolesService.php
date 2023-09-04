<?php

namespace App\Services\Role;

use App\Foundation\Services\BaseService;
use App\Models\Role\Role;
use Illuminate\Database\Eloquent\Collection;

class GetRolesService extends BaseService
{
    /**
     * GetRolesService constructor.
     */
    public function __construct(protected Role $collection = new Role())
    {
    }

    /**
     * @return Collection
     */
    public function execute(): Collection
    {
        return $this->collection->query()->withCount('users')->with('permissions')->get();
    }
}
