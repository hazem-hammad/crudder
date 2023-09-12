<?php

namespace App\Modules\BaseModule\Database\seeds;

use App\Modules\BaseModule\Models\BaseModule;
use Illuminate\Database\Seeder;

class BaseModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        BaseModule::factory()->count(10000)->create();
    }
}
