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
          $date = date('Y-m-d H:i:s', rand(1451606400, 1483228800));
          $measurement = new App\Measurement(['value' => 2.21, 'idSensor' => rand(1,4), 'created_at' => $date]);
          $measurement->save();

        }
    }
}
