<?php

use Faker\Generator as Faker;

$factory->defineAs(App\User::class, 'user', function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'nis' => $faker->numberBetween(100000,999999),
        'bio' => $faker->randomLetter,
        'gender' => $faker->randomElement(['m','f'],1),
        'phone' => $faker->e164PhoneNumber,
//        'id_class' => $faker->,
//        'id_major' => $faker->,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->email,
        'password' => $password ?: $password = bcrypt('secret'),
    ];
});
