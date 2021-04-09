<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Profile;
use Faker\Generator as Faker;


$factory->define(Profile::class, function (Faker $faker) {
    return [
        'nickname' => $faker->name(),
        'height' => $faker->numberBetween(140,190),
        'age' => $faker->numberBetween(18,65),
        'gender' => $faker->numberBetween(0,1),
        'interest' => $faker-> sentence(2),
        'comment' => $faker->realText(300),
        'work' => $faker ->word(),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
