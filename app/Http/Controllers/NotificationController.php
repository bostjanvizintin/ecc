<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;
use App\Http\Requests;


class NotificationController extends Controller
{
    public function index(Request $request) {
      $notifications  = App\Notification::where('idUser', \Auth::user()->id)->where('active','>', 0)->get();

      return view('notifications')->with('notifications', $notifications);
    }
}
