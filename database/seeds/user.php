<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
					'name' => str_random(13),
					'email' => str_random(8).'@gmail.com',
					'password' => bcrypt('secret'),
				]);
    }
}
