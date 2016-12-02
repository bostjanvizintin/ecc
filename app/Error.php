<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    protected $fillable = ['number', 'name', 'description'];


/*
    public function usererror() {
      return $this->hasMany('App\Error');
    }*/
}
