<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {
    return [
        'event_id' => 1,
        'first_name' => $faker->name,
        'surname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
    ];
});
