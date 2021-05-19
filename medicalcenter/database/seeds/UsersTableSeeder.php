<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        'role_id' => '1',
        'first_name' => 'Konny',
        'last_name' => 'Jenkins',
        'email' => 'konny@gmail.com',
        'password' => bcrypt('konnykon')
      ]);

      DB::table('users')->insert([
        'role_id' => '2',
        'first_name' => 'Benny',
        'last_name' => 'Doe',
        'email' => 'benny@gmail.com',
        'password' => bcrypt('bennyben')
      ]);

      DB::table('users')->insert([
        'role_id' => '2',
        'first_name' => 'Jack',
        'last_name' => 'Doe',
        'email' => 'jack@gmail.com',
        'password' => bcrypt('jackjack')
      ]);
    }
}
