<?php

namespace App\Services\Role;

use App\Foundation\Models\BaseModel;
use App\Foundation\Services\BaseService;
use App\Foundation\Services\General\Auth\GetAuthAdminService;
use App\Models\Role\Role;
use Illuminate\Database\Eloquent\Model;

class StoreRoleService extends BaseService
{
     /**
     * StoreRoleService constructor.
     */
    public function __construct(private readonly Role $collection = new Role())
    {
    }


    public function execute(): Model
    {
        $role = $this->collection->create($this->data());

        $this->assignPermissionsToRole($role);

        return $role;
    }

    /**
     * @return array
     */
    private function data(): array
    {
        return [
            'name' => $this->getName(),
            'guard_name' => 'admin'
        ];
    }

    /**
     * @return string
     */
    private function getName(): string
    {
        $admin = (new GetAuthAdminService())->get();
        return (new GetNameOfRoleService($admin->role))->handle();
    }

    /**
     * @param $role
     */
    private function assignPermissionsToRole($role)
    {
        $role->givePermissionTo(request('permissions'));
    }
}
