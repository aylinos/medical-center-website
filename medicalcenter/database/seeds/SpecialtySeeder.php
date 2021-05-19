<?php

use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('specialties')->insert([
        'name' => 'Pediatrician'
      ]);
      DB::table('specialties')->insert([
        'name' => 'Endocrinologist'
      ]);
      DB::table('specialties')->insert([
        'name' => 'Psychiatrist'
      ]);
      DB::table('specialties')->insert([
        'name' => 'Dermatologist'
      ]);
      DB::table('specialties')->insert([
        'name' => 'Orthodontics'
      ]);
    }
}
