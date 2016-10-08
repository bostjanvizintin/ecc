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

Route::resource('/sensorBox', 'SensorBoxController');

//Route::resource('/sensor', 'SensorController');

Route::get('/usage', 'UsageController@index')->name('usage.index');

Route::post('/usage', 'UsageController@drawChart')->name('usage.drawChart');

Route::get('/measurement/{idSensor}/{value}', 'MeasurementController@reportSensorReading')->name('measurement.report');
