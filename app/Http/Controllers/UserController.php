<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class UserController extends Controller
{

   public function postLogin(Request $request) {
   		if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
   			return redirect()->route('home');
   		} else {
   			return redirect()->back();
   		}
   }
}
