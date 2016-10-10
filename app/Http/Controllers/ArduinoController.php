<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Http\Requests;

class ArduinoController extends Controller
{
    public function getSensorIds(Request $request) {
      $hash = $request->hash;
      $ids = App\Sensor::where('hash', $hash)->pluck('id');

      $tmp = '###';

      foreach ($ids as $value) {
        $tmp = $tmp.$value.',';
      }
      $tmp = substr($tmp,0,strlen($tmp)-1);
      $tmp = $tmp.'###';
      return $tmp;
    }
}
