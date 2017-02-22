<?php

use Illuminate\Database\Seeder;

class UserErrorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usererrors')->insert([
          'idUser' => 1,
          'idError' => 1,
          'seen' => false
        ]);
    }
}
