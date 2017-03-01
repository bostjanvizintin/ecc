<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeasurementPoint extends Model
{
    protected $fillable = ['name'];
    public $table = 'measurementPoints';

    public function sensor() {
      return $this->belongsTo('App\Sensor');
    }


}
