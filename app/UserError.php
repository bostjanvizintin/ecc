<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserError extends Model
{
    protected $fillable = ['idUser', 'idError', 'seen'];
    public $table = 'usererrors';
/*
    public function error() {
      return $this->belongsTo('App\error');
    }*/

    public function users() {
      return $this->belongsToMany('App\User', 'id', 'idUSer');
    }
}
