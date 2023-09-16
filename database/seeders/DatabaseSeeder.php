<?php

namespace Database\Seeders;

use App\Foundation\Database\seeders\PermissionsSeeder;
use App\Modules\BaseModule\Database\seeders\BaseModuleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
//        $this->call(PermissionsSeeder::class);
        $this->call(BaseModuleSeeder::class);
        $this->call(PermissionsSeeder::class);
    }
}
