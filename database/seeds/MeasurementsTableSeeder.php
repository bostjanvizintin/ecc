<?php

use Illuminate\Database\Seeder;

class MeasurementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) {
          $measurement = new App\Measurement(['value' => 2.21, 'idSensor' => rand(1,4)]);
          $measurement->save();

        }
    }
}
