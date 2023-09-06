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
                "name" => "view email templates"
            ],
            [
                "id" => 2,
                "name" => "view messenger"
            ],
            [
                "id" => 3,
                "name" => "view tickets"
            ],
            [
                "id" => 4,
                "name" => "create ticket"
            ],
            [
                "id" => 5,
                "name" => "reply ticket"
            ]
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
