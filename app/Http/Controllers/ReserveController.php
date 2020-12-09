<?php

/**
 * @description Controlador de resevas VEC
 * @author Oscar Rodriguez Sedes
 * @version 1.0
 * @date 03.12.2020
 */

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
    /**
     * Devuelve la vista de reservar
     */
    public function show()
    {
        return view('reservas.reservar');
    }

    /**
     * Devuelve la vista de reservas
     */
    public function showReserves()
    {
        return view('reservas.reservas');
    }

    /**
     * Devuelve las reservas de un cliente
     */
    public function loadReserves($id)
    {
        $reserves = Reserve::where('client_id','=',$id)->get();
        $view = view('reservas.tabla')->with('reserves', $reserves);
        return $view;
    }

    /**
     * Exporta a PDF la reserva de un cliente
     */
    public function exportPDF($id)
    {        
        $reserve = Reserve::find($id);
        $user = User::with('client')->find($reserve->client_id);
        $rents = $reserve->renting;
        $rentings = [];
        $total = 0;
        foreach($rents as $renting){
            $room = $renting->room;
            $renting['room_id'] = $room->id;
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

    /**
     * Devuelve un horario a partir del parametro dia
     */
    public function loadSchedule(Request $request)
    {
        return Renting::whereDay('start', $request->day)->get();
    }


    /**
     * Devuelve las salas de VEC
     */
    public function getRooms()
    {
        return Room::all();
    }

    /**
     * Devuelve los datos de una sala VEC
     */
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
