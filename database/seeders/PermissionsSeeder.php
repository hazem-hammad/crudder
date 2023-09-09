<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            [
                "id" => 1,
                "name" => "list base modules"
            ],
            [
                "id" => 2,
                "name" => "update base module"
            ],
            [
                "id" => 3,
                "name" => "create base module"
            ],
            [
                "id" => 4,
                "name" => "show base module"
            ],
            [
                "id" => 5,
                "name" => "change base module status"
            ],
            [
                "id" => 6,
                "name" => "delete base module"
            ],
            // append permissions here
        ];

        // create permissions
        foreach ($permissions as $permission) {

            $check = Permission::query()->where('id', $permission['id'])->first();
            if ($check) {
                $check->update(['name' => $permission['name'], 'guard_name' => 'admin']);
            } else {
                Permission::create(['id' => $permission['id'], 'name' => $permission['name'], 'guard_name' => 'admin']);
            }
        }
    }
}
