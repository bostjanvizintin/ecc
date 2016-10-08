<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Http\Requests;

class MeasurementController extends Controller
{
    public function reportSensorReading(Request $request) {

    	$measurement = new App\Measurement;

    	$measurement->value = $request->value;
    	$measurement->idSensor = $request->idSensor;
    	$measurement->save();
    }

 	public function sensor() {
    	return $this->belongsTo('App\Sensor');
    }
}
