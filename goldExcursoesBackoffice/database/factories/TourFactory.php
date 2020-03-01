<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tour;
use Faker\Generator as Faker;

$factory->define(Tour::class, function (Faker $faker) {
    return [
        'title'=> $faker->sentence,
        'place' => $faker->country,
        'hotel' => $faker->company,
        'departure_date' => $faker->date($format = 'Y-m-d h:i:s'), 
        'return_date' => $faker->date($format = 'Y-m-d h:i:s'),
        'price' =>  $faker->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 300),
        'description' => $faker->randomHtml(2,3),
        'capacity' => 50
    ];
});
