<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{

    protected $fillable = ['hash', 'input', 'idMeasurementPoint', 'idSubMeasurementPoint'];


    public function sensorBox() {
    	return $this->belongsTo('App\SensorBox', 'hash', 'id');
    }

     public function measurement() {
    	return $this->hasMany('App\Measurement');
    }

    public function mesurementPoint() {
      return $this->belongsTo('App\MeasurementPoint');
    }
}
