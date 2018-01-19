<?php

use Faker\Generator as Faker;

$factory->define(App\Semester::class, function (Faker $faker) {
    $n = rand(1, 2);

    return [
        'name' => 'semester '.$n,
    ];
});
