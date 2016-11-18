<?php

use Illuminate\Database\Seeder;

class SensorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('sensors')->insert([
        'hash' => 'ij43mif5z8ec3w23z89jnv85e9o0p8e2',
        'input' => 1,
        'sensorMvPerAmp' => 100,
        'idMeasurementPoint' => 2,
        'idSubMeasurementPoint' => 1
      ]);
      DB::table('sensors')->insert([
        'hash' => 'ij43mif5z8ec3w23z89jnv85e9o0p8e2',
        'input' => 2,
        'sensorMvPerAmp' => 185,
        'idMeasurementPoint' => 3,
        'idSubMeasurementPoint' => 1
      ]);
      DB::table('sensors')->insert([
        'hash' => 'ij43mif5z8ec3w23z89jnv85e9o0p8e2',
        'input' => 3,
        'sensorMvPerAmp' => 66,
        'idMeasurementPoint' => 4,
        'idSubMeasurementPoint' => 1
      ]);
      DB::table('sensors')->insert([
        'hash' => 'ij43mif5z8ec3w23z89jnv85e9o0p8e2',
        'input' => 4,
        'sensorMvPerAmp' => 100,
        'idMeasurementPoint' => 5,
        'idSubMeasurementPoint' => 1
      ]);
    }
}
