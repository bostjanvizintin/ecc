<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{

    protected $fillable = ['hash', 'input', 'idMeasurementPoint', 'idSubMeasurementPoint'];



    public function sensorBox() {
    	return $this->belongsTo('App\SensorBox');
    }
}
