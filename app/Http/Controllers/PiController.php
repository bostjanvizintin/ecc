<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Http\Requests;

class PiController extends Controller
{

    public function getSensorBoxData(Request $request) {
      $sensorBox = App\SensorBox::where('hash', $request->hash)->first();
      $sensorBox->sensors;

      $sensorBoxData = array(
        'sensorBox' => $sensorBox
      );


      return json_encode($sensorBoxData);
    }

    public function measurement(Request $request) {
      $measurement = new App\Measurement;
      $measurement->idSensor = $request->idSensor;
      $measurement->value = $request->value;
      $measurement->save();
    }
}
