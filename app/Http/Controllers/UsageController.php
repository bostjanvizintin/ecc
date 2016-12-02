<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UsageController extends Controller
{
    public function index() {
    	/*
		*TODO
		*list all user's sensors.
		*Add options to limit result by time.
		*Add option to select current usage or total usage
    	*/
      //list all user's sernsors
      $idUser = Auth::user()->id;
      //get all user's sensor boxes
      $userSensorBoxes = App\SensorBox::where('idUser', $idUser)->get();
      //for each sensor box find its sensors and append them to sensor box
      foreach ($userSensorBoxes as $sensorBoxKey => $value) {
        $userSensorBoxes[$sensorBoxKey]->sensors = App\Sensor::where('hash', $userSensorBoxes[$sensorBoxKey]['hash'])->get();
        //For each sensor connected to sensor box find the names of measurement points and substitute ids with those names and change index name. Same for sub names of measurement points.
        foreach ($userSensorBoxes[$sensorBoxKey]['sensors'] as $sensorKey => $value) {
          $userSensorBoxes[$sensorBoxKey]['sensors'][$sensorKey]['measurementPointName'] = App\MeasurementPoint::find($userSensorBoxes[$sensorBoxKey]['sensors'][$sensorKey]['idMeasurementPoint'])->name;
          //unset($userSensorBoxes[$sensorBoxKey]['sensors'][$sensorKey]['idMeasurementPoint']);
          $userSensorBoxes[$sensorBoxKey]['sensors'][$sensorKey]['measurementPointSubName'] = App\MeasurementPoint::find($userSensorBoxes[$sensorBoxKey]['sensors'][$sensorKey]['idSubMeasurementPoint'])->name;
          //unset($userSensorBoxes[$sensorBoxKey]['sensors'][$sensorKey]['idSubMeasurementPoint']);
        }
      }

    	return view('usage')->with('sensors', $userSensorBoxes);

    }

    public function drawChart(Request $request) {
    	$idSensors = $request->sensors;
    	$startDate = strtotime($request->startDate) + strtotime($request->startTime) - strtotime('00:00');
    	$endDate = strtotime($request->endDate) + strtotime($request->endTime) - strtotime('00:00');
    	$interval = $request->interval;

      $formatedStartDate = (new \DateTime())->setTimestamp($startDate)->format('Y-m-d H:i:s');
    	$usage = App\Measurement::whereIn('idSensor', $idSensors)->where('created_at', '>=', $formatedStartDate)->orderBy('created_at')->get()->toArray();

      $chart = array();

      $chartEmptyRowWithDate = array();
      foreach ($idSensors as $value) {
        array_push($chartEmptyRowWithDate, 0);
      }
      array_unshift($chartEmptyRowWithDate, "date");

      //create chartArray that fits chart requirement
      $chartFirstRow = array('Time');
      foreach ($idSensors as $value) {
        array_push($chartFirstRow, $value);
      }
      array_push($chart, $chartFirstRow);

      for ($i=0; $i < ($endDate - $startDate) / $interval; $i++) {
        $rowDate = (new \DateTime())->setTimestamp($startDate + ($i*$interval))->format('Y-m-d H:i:s');

        $chartEmptyRowWithDate[0] = $rowDate;
        if ($request->chartType == 'current') {
          for ($k=1; $k  < count($chartEmptyRowWithDate); $k++) {
            $chartEmptyRowWithDate[$k] = 0;
          }
        }

        while(!empty($usage) && strtotime($usage[0]['created_at']) < ($startDate + ($i * $interval))) {
          $tmp = array_shift($usage);
          $chartEmptyRowWithDate[array_search($tmp['idSensor'], $idSensors)+1] += $tmp['value'];
        }

        array_push($chart, $chartEmptyRowWithDate);
      }

      return view('drawChart')->with('chart', $chart);
    }


}
