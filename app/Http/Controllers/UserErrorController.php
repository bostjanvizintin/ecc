<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App;

class UserErrorController extends Controller
{
    public function index(Request $request) {
      $user = App\User::find(1)->usererrors;
return $user;
      return $user->usererror;

    }
}
