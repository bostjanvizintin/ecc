<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use Auth;
use App\Http\Requests;


class NotificationController extends Controller
{
    public function index(Request $request) {
      $notifications  = App\Notification::where('idUser', \Auth::user()->id)->where('active','>', 0)->get();

      return view('notifications')->with('notifications', $notifications);
    }

    public function create(Request $request) {
      $sensorBoxes = App\SensorBox::where('idUser', \Auth::user()->id)->get();
      $sensors = array();

      foreach ($sensorBoxes as $sensorBox) {
        foreach ($sensorBox->sensors as $sensor) {
          $sensors[$sensor['id']] =  $sensor['idMeasurementPoint'].":".$sensor['idSubMeasurementPoint'];
        }
      }

      return view('notificationAdd')->with('sensors', $sensors);
    }
    public function store(Request $request) {
      $tmp = array('idSensor' => $request->sensor, 'idUser' => Auth::user()->id, 'name' => $request->name, 'type' => $request->type, 'value' => $request->value, 'dateFrom' => $request->dateFrom, 'dateTo' => $request->dateTo, 'active' => 1);
      $notification = new App\Notification($tmp);
      $notification->save();
      //TODO add message with Session::msg!
      return redirect()->back();
    }
}
