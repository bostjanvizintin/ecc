<?php

use Illuminate\Database\Seeder;

class SensorBoxesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('sensorboxes')->insert([
            'hash' => 'ij43mif5z8ec3w23z89jnv85e9o0p8e2',
            'name' => 'sensorbox1',
            'numOfInputs' => 4,
            'idUser' => 1
        ]);
    }
}
