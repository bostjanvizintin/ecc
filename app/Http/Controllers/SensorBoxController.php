<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App;
use Illuminate\Support\Facades\Auth;

class SensorBoxController extends Controller
{
    public function postAddSensorBox(Requests\AddSensorBoxRequest $request) {
    	$tmp = $request->all();
    	$tmp['idUser'] = Auth::user()->id;
    	$sensorBox = new App\SensorBox($tmp);
    	$sensorBox->save();
    	return $sensorBox;
    }
}
