<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    protected $fillable = ['number', 'name', 'description'];


    public function users() {
      return $this->belongsToMany('App\User', 'usererrors', 'idError', 'idUser');
    }
}
