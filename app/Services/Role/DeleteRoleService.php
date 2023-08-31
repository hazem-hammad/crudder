<?php

namespace App\Services\Role;

use App\Models\Role\Role;

class DeleteRoleService
{
    /**
     * GetRolesService constructor.
     */
    public function __construct(protected Role $resource = new Role())
    {
    }

    /**
     * @return void
     */
    public function delete(): void
    {
        $this->resource->delete();
    }
}
