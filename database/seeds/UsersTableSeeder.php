<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersTableSeeder
 * to create test user
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => 'joe@example.com',
            'password' => '123456',
        ]);
    }
}
