<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
  protected $fillable = ['value', 'idSensor', 'create_at'];
}
