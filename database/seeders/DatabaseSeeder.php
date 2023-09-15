<?php

namespace Database\Seeders;

use App\Modules\BaseModule\Database\seeds\BaseModuleSeeder;
use App\Modules\BaseModule\Models\BaseModule;
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
//        $this->call(BaseModuleSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
