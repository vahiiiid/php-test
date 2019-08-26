<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
            'role_id' => 2
        ]);
    }
}
