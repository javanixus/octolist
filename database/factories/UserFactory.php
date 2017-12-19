<?php

use Faker\Generator as Faker;

$factory->defineAs(App\User::class, 'user', function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->email,
        'password' => $password ?: $password = bcrypt('secret'),
    ];
});
