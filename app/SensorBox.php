<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorBox extends Model
{
	protected $primaryKey = 'hash';
	public $table = 'sensorboxes';
    public $incrementing = false;
    protected $fillable = ['idUser', 'hash', 'name', 'numOfInputs'];


    public function sensors() {
    	return $this->hasMany('App\Sensor', 'hash', 'hash');
    }




}
