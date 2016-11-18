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

    public function getSensorsMvPerAmp(Request $request) {
      $hash = $request->hash;

      $mvPerAmp = App\Sensor::where('hash', $hash)->orderBy('id')->pluck('sensorMvPerAmp');

      $tmp = '###';

      foreach ($mvPerAmp as $value) {
        $tmp = $tmp.$value.',';
      }
      $tmp = substr($tmp,0,strlen($tmp)-1);
      $tmp = $tmp.'###';
      return $tmp;
    }

    public function getNumberOfInputs(Request $request) {
      $hash = $request->hash;

      $numberOfInputs = App\Sensor::where('hash', $hash)->count();
      return '###'.$numberOfInputs.'###';
    }

    public function getSensorBoxInputs(Request $request) {
      $hash = $request->hash;

      $sensorBoxInputs = App\Sensor::where('hash', $hash)->pluck('input');

      $tmp = '###';

      foreach ($sensorBoxInputs as $value) {
        $tmp = $tmp.$value.',';
      }
      $tmp = substr($tmp,0,strlen($tmp)-1);
      $tmp = $tmp.'###';
      return $tmp;
    }

    public function test(Request $request) {
      return "###test###";
    }
}
