<?php

use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dateFrom = date('Y-m-d H:i:s', rand(1451606400, 1483228800));
      $dateTo = date('Y-m-d H:i:s', rand(1483228800, 1483268800));

      $notification = new App\Notification(['idSensor' => 1, 'idUser' => 1, 'name' => 'sdfg', 'type' => 2, 'value' => 2.23, 'dateFrom' => $dateFrom, 'dateTo' => $dateTo, 'active' => 1]);
      $notification->save();
    }
}
