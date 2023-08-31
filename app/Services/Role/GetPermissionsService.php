<?php

namespace App\Services\Role;

use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Permission;

class GetPermissionsService
{
    /**
     * @return Collection
     */
    public function handle(): Collection
    {
        return Permission::all();
    }
}
