<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['idSensor', 'idUser', 'name', 'type', 'value', 'dateFrom', 'dateTo', 'active'];
}
