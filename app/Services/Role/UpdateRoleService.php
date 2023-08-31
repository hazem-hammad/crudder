<?php

namespace App\Services\Role;

use App\Models\Role\Role;

class UpdateRoleService
{
    /**
     * @var object role
     */
    private $role;

    /**
     * UpdateRoleService constructor.
     *
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function update()
    {
        $role = $this->role->update($this->data());

        $this->assignPermissionsToRole();

        return $role;
    }

    /**
     * @return array
     */
    private function data(): array
    {
        return [
            'name' => $this->getName()
        ];
    }

    /**
     * @return string
     */
    private function getName(): string
    {
        return (new GetNameOfRoleService($this->role->id))->handle();
    }

    /**
     * @return void
     */
    private function assignPermissionsToRole()
    {
        $this->role->syncPermissions(request('permissions'));
    }
}
