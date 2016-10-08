<?php

use Illuminate\Database\Seeder;

class MeasurementPointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('measurementPoints')->insert([
         'name' => ''
     ]);
     DB::table('measurementPoints')->insert([
        'name' => 'Peč'
     ]);
     DB::table('measurementPoints')->insert([
        'name' => 'Vtičnice'
     ]);
     DB::table('measurementPoints')->insert([
        'name' => 'Luči'
     ]);
     DB::table('measurementPoints')->insert([
        'name' => 'Bojler'
     ]);

    }
}
