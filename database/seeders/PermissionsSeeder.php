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
            ],
            [
                "id" => 6,
                "name" => "show ticket"
            ],
            [
                "id" => 7,
                "name" => "change ticket status"
            ],
            [
                "id" => 8,
                "name" => "view categories"
            ],
            [
                "id" => 9,
                "name" => "create category"
            ],
            [
                "id" => 10,
                "name" => "update category"
            ],
            [
                "id" => 11,
                "name" => "change category status"
            ],
            [
                "id" => 12,
                "name" => "view roles"
            ],
            [
                "id" => 13,
                "name" => "update role"
            ],
            [
                "id" => 14,
                "name" => "create role"
            ],
            [
                "id" => 15,
                "name" => "view admins"
            ],
            [
                "id" => 16,
                "name" => "update admin"
            ],
            [
                "id" => 17,
                "name" => "create admin"
            ],
            [
                "id" => 18,
                "name" => "change admin status"
            ],
            [
                "id" => 19,
                "name" => "assign ticket"
            ],
            [
                "id" => 20,
                "name" => "view reports"
            ],
            [
                "id" => 21,
                "name" => "change admin profile image"
            ],
            [
                "id" => 22,
                "name" => "delete ticket"
            ],
            [
                "id" => 23,
                "name" => "show all tickets"
            ],
            [
                "id" => 24,
                "name" => "export tickets"
            ],
            [
                "id" => 25,
                "name" => "add ticket notes"
            ],
            [
                "id" => 26,
                "name" => "update ticket"
            ],
            [
                "id" => 27,
                "name" => "update ticket replies"
            ],
            [
                "id" => 28,
                "name" => "view seasons"
            ],
            [
                "id" => 29,
                "name" => "update season"
            ],
            [
                "id" => 30,
                "name" => "create season"
            ],
            [
                "id" => 31,
                "name" => "change season status"
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
