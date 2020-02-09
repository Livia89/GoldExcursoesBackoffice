<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber(),
        'address' => $faker->address(),
        'city' => $faker->city(),
        'dateOfBirth' => $faker->date($format = 'Y-m-d'),
        'notes' => $faker->sentence(),
        
    ];
});
