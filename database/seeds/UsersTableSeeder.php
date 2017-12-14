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
        App\User::truncate(); // Menghapus semua data yang ada pada table users sebelum di seeder

        $users = factory(App\User::class, 'user', 20)->create(); // sebagai gantinya create() kita menggunakan fungsi bawaan factory yaitu make()
    }
}
