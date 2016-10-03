<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorBox extends Model
{
	protected $primaryKey = 'hash';
	public $table = 'sensorBoxes';
    public $incrementing = false;
    protected $fillable = ['idUser', 'hash', 'name', 'numOfInputs'];


    public function sensor() {
    	return $this->hasMany('App\Sensor', 'hash', 'hash');
    }


}
