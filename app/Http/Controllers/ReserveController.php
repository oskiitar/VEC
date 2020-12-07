<?php

namespace App\Http\Controllers;

use App\Reserve;
use App\Renting;
use App\Room;
use App\Pay;
use App\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReserveController extends Controller
{
    public function show()
    {
        return view('reservas.reservar');
    }

    public function showReserves()
    {
        return view('reservas.reservas');
    }

    public function loadReserves($id)
    {
        $reserves = Reserve::where('client_id','=',$id)->get();
        $view = view('reservas.tabla')->with('reserves', $reserves);
        return $view;
    }

    public function exportPDF($id)
    {        
        $reserve = Reserve::find($id);
        $user = User::with('client')->find($reserve->client_id);
        $rents = $reserve->renting;
        $rentings = [];
        $total = 0;
        foreach($rents as $renting){
            $room = $renting->room;
            $renting['name'] = $room->name;              
            $renting['description'] = $room->description;              
            $renting['price'] = $room->price;
            $total += $room->price;              
            array_push($rentings, $renting);
        }

        $iva = $total * 0.21;
        $subtotal = $total - $iva;
        
        $data = [
            'id' => $id,
            'reserve_date' => $reserve->reserve_date,
            'name' => $user->name,
            'surname' => $user->surname,
            'email' => $user->email,
            'tel' => $user->tel,
            'address' => $user->client->address,
            'rentings' => $rentings,
            'total' => $total,
            'subtotal' => $subtotal,
            'iva' => $iva,
        ];

        $pdf = PDF::loadView('reservas.pdf', $data);
        return $pdf->download('mi_reserva_'.$id.'.pdf');
    }

    public function loadSchedule(Request $request)
    {
        return Renting::whereDay('start', $request->day)->get();
    }

    public function getRooms()
    {
        return Room::all();
    }

    public function loadRoom($id)
    {
        $room = Room::find($id);
        $response = [
            'type' => $room->type,
            'price' => $room->price
        ];
        return $response;
    }
}
