<?php

/** @var Factory $factory */

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| Database. Just tell the factory how a default model should look.
|
 */

use Illuminate\Database\Eloquent\Factory;

$factory->define('User namespace here', function (Faker\Generator $faker) {
    /**
     * @var string $password
     */
    static $password;

    return [
        'id' => rand(1000, 10000),
    ];
});
