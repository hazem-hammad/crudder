<?php

namespace Database\Factories;

use App\Models\Admin\Admin;
use App\Modules\BaseModule\Models\BaseModule;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'password' => bcrypt($this->faker->password),
            'email' => $this->faker->unique()->email,
            'primary_admin' => $this->faker->boolean,
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'email_verified_at' => $this->faker->dateTime,
        ];
    }
}
