<?php


namespace App\Services\Role;

use App\Models\Role\Role;

class GetNameOfRoleService
{


    /**
     * GetNameOfRoleService constructor.
     *
     * @param int|null $role_id
     */
    public function __construct(private int|null $role_id = null)
    {
    }

    /**
     * @return string
     */
    public function handle(): string
    {
        $checkRoleNameIfExistsBefore = Role::where('name', request('name'));

        if ($this->role_id) {
            $checkRoleNameIfExistsBefore->where('id', '!=', $this->role_id);
        }

        $checkRoleNameIfExistsBefore = $checkRoleNameIfExistsBefore->exists();

        return $checkRoleNameIfExistsBefore ? request('name') . '_' : request('name');
    }
}
