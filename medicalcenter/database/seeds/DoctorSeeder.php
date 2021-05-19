<?php

use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('doctors')->insert([
        'user_id' => '11',
        'spec_id' => '2',
        'age' =>  42,
        'years_of_experience' => 12
      ]);

      DB::table('doctors')->insert([
        'user_id' => '12',
        'spec_id' => '5',
        'age' =>  41,
        'years_of_experience' => 18
      ]);
    }
}
