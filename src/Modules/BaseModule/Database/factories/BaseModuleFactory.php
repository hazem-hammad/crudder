<?php

namespace App\Modules\BaseModule\Database\factories;

use App\Modules\BaseModule\Models\BaseModule;
use Illuminate\Database\Eloquent\Factories\Factory;

class BaseModuleFactory extends Factory
{
    protected $model = BaseModule::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_ar' => $this->faker->name(),
            'name_en' => $this->faker->name(),
            'status' => $this->faker->boolean(),
        ];
    }
}
