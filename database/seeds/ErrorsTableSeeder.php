<?php

use Illuminate\Database\Seeder;

class ErrorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('errors')->insert([
        'number' => 101,
        'name' => 'Request error',
        'description' => 'Failed to send request to the server!']
      );
      DB::table('errors')->insert([
        'number' => 102,
        'name' => 'Retrieving user info. error',
        'description' => 'Failed to retrieve user sensorbox id!']
      );

    }
}
