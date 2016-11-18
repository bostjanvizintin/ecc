<?php

namespace App\Http\Controllers;

use App;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SensorBoxController extends Controller
{

	public function __construct() {

	}


	public function index() {
		$sensorBoxes = App\SensorBox::where('idUser', Auth::user()->id)->get();
		return view('listSensorBoxes')->with('sensorBoxes', $sensorBoxes);
	}

	public function create() {
		return view('addSensorBox');
	}

	public function store(Requests\AddSensorBoxRequest $request) {
		$tmp = $request->all();
		$tmp['idUser'] = Auth::user()->id;
		$sensorBox = new App\SensorBox($tmp);
		$sensorBox->save();
		return view('addSensorBox')->with('message', "Successfully added sensor box!");

	}

	public function show($id) {

	}

	public function edit($id) {
		$sensorBox = App\SensorBox::where('hash', $id);
		$sensorBox = $sensorBox->get(['hash', 'name', 'numOfInputs'])->first();

		return view('editSensorBox')->with('sensorBox', $sensorBox);

	}

	public function update($id, Requests\EditSensorBoxRequest $request) {
		$names = $request->sensorName;
		$subNames = $request->sensorSubName;
		$sensorMvPerAmp = $request->sensorMvPerAmp;
		$inputs = $request->input;

		//get ids of names and subnames and insert new sensors with the ids.
		for ($i=0; $i < count($names); $i++) {
			$idName = App\MeasurementPoint::firstOrCreate(['name' => $names[$i]])->id;
			$idSubName = App\MeasurementPoint::firstOrCreate(['name' => $subNames[$i]])->id;
			$hash = $request->hash;
			$input = $inputs[$i];

			$sensor = App\Sensor::firstOrNew([
									'hash' => $hash,
									'input' => $input
									 ]);
			$sensor->idMeasurementPoint = $idName;
			$sensor->idSubMeasurementPoint = $idSubName;
			$sensor->sensorMvPerAmp = $sensorMvPerAmp[$i];

			$sensor->save();

		}
		//edit the sensor
		$sensorBox = App\SensorBox::find($id);
		$sensorBox->name = $request['name'];
		$sensorBox->numOfInputs = $request['numOfInputs'];
		$sensorBox->save();

		return view('EditsensorBox')->with(['message' => 'Successfully edited sensor!', 'sensorBox' => $sensorBox]);
	}

	public function destroy($id) {
		App\SensorBox::destroy($id);
		return view('addSensorBox')->with('message', 'Successfully deleted sensor box!');
	}

	public function listSensors() {
		return "testing!!!";
	}

}
