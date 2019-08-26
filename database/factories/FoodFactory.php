<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Food::class, function (Faker $faker) use ($factory){
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
        return [
            'name' => $faker->foodName(),
            'price' => $faker->numberBetween($min = 1000, $max = 9000),
            'restaurant_id' => rand(1,20),
//            'restaurant_id' => $factory->create(App\Models\Restaurant::class)->id,
        ];
});
