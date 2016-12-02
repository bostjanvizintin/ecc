<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ErrorController extends Controller
{
    public function index(Request $request) {
      $errors = \App\Error::all();
      return $errors;
    }
}
