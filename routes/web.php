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

	Route::get('/usage', 'UsageController@index')->name('usage.index');

	Route::post('/usage', 'UsageController@drawChart')->name('usage.drawChart');

	Route::get('/usage/{idSensor}', 'UsageController@drawLiveChart')->name('usage.drawLiveChart');

	Route::get('/usage/ajax/{idSensor}/{latestUpdate}', 'UsageController@ajaxGetLatestValue');

	Route::resource('/userError', 'UserErrorController');

	Route::resource('/notification', 'NotificationController');

	Route::resource('/error', 'ErrorController');

	Route::get('/instructions', function(){
		return view('instructions');
	})->name('instructions');

});

Route::get('/pi/getSensorBoxData/{hash}', 'PiController@getSensorBoxData')->name('getSensorBoxData');

Route::get('/pi/measurement/{idSensor}/{value}', 'PiController@measurement')->name('measurement');
