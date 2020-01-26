<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'event_name' => $faker->name,
        'event_time' => $faker->time,
        'event_date' => $faker->date,
        'event_venue' => $faker->city,
    ];
});
