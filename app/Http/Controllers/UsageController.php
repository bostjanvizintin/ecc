<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UsageController extends Controller
{
    public function index() {
    	return view('usage');

    }
}
