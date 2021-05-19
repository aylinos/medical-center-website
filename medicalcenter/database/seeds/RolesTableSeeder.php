<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
          'role_name' => 'Admin'
        ]);
        DB::table('roles')->insert([
          'role_name' => 'Doctor'
        ]);
        DB::table('roles')->insert([
          'role_name' => 'Patient'
        ]);
    }
}
