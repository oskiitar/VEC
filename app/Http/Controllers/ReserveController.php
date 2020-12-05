<?php

namespace App\Http\Controllers;

use App\Reserve;
use App\Renting;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReserveController extends Controller
{
    public function show()
    {
        return view('reservas.reservar');
    }

    public function loadSchedule(Request $request){
        return Renting::whereDay('start', $request->day)->get();
    }

    public function getRooms(){
        return Room::all();
    }

    public function loadRoom($id){
        $room = Room::find($id);
        $response = [
            'type' => $room->type,
            'price' => $room->price
        ];
        return $response;
    }
}
