<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alumni;
use Faker\Generator as Faker;

$factory->define(Alumni::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    	'tahun' => $faker->numberBetween(25,40),
    	'pekerjaan' => $faker->jobTitle
    ];
});
