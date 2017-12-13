<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\User');
        for ($i=1; $i <= 30; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->email(20),
                'password' => $faker->sha256(),
                'remember_token' => $faker->sha256(),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
