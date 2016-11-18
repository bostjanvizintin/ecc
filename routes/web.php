<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', function() {
	return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::group(['middleware' => 'auth'], function() {
	Route::resource('/sensorBox', 'SensorBoxController');

	//Route::resource('/sensor', 'SensorController');

	Route::get('/usage', 'UsageController@index')->name('usage.index');

	Route::post('/usage', 'UsageController@drawChart')->name('usage.drawChart');


});

Route::get('/measurement/{idSensor}/{value}', 'MeasurementController@reportSensorReading')->name('measurement.report');

Route::get('/arduino/ids/{hash}', 'ArduinoController@getSensorIds')->name('getSensorIds');

Route::get('/arduino/mvPerAmp/{hash}', 'ArduinoController@getSensorsMvPerAmp')->name('getSensorsMvPerAmp');

Route::get('/arduino/numberOfInputs/{hash}', 'ArduinoController@getNumberOfInputs')->name('getNumberOfInputs');

Route::get('/arduino/sensorBoxInputs/{hash}', 'ArduinoController@getSensorBoxInputs')->name('getSensorBoxInputs');

Route::get('/arduino/test', 'ArduinoController@test')->name('test');
