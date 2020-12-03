<?php

namespace App\Http\Controllers;

use App\Reserve;
use App\Renting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReserveController extends Controller
{
    public function show()
    {
        return view('reservar');
    }

    public function loadSchedule(Request $request){
        return Renting::whereDay('start', $request->day)->get();
    } 
}
