<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use App\Http\Requests;


class NotificationController extends Controller
{
    public function index(Request $request) {
      $sensorBoxes = App\SensorBox::where('idUser', \Auth::user()->id)->get();
      $sensorBoxes->load('sensors');
      return view('notifications')->with('sensorBoxes', $sensorBoxes);
    }
}
