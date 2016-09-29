<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorBox extends Model
{
	public $table = 'sensorBoxes';
    public $incrementing = false;
    protected $fillable = ['idUser', 'hash', 'name', 'numOfInputs'];


}
