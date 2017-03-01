<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ErrorController extends Controller
{
    public function index(Request $request) {
      $user = App\User::find(Auth::user()->id);

      return view('error')->with('userErrors', $user->errors);

    }

    public function store(Request $request) {
      return "working";
    }
}
