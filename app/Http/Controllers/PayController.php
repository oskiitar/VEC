<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Reserve;
use App\Renting;
use App\Payway;
use App\Pay;
use App\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * 
 */
class PayController extends Controller
{
    public function show()
    {
        return view('reservas.pago');
    }

    public function getPayment(){
        return Payway::all();
    }

    public function payReserve(Request $request){
        
        DB::transaction(function () use($request) {
            // Se busca el cliente
            $client = Client::find($request->client);

             // Se crea la reserva
             $reserve = new Reserve;
             $reserve->reserve_date = $request->dateReserve;

             // Se genera un pago
             $pay = new Pay;
             $pay->pay_date = now();
             $pay->total = $request->total;

             // Se busca un metodo de pago
             $payway = Payway::find($request->payway);

             // Se guarda la relacion metodo pago y pago
             $payway->pay()->save($pay);

             // Se asocia la relacion de la reserva con el pago
             $reserve->pay()->associate($pay);

             // Se guarda la relacion reserva con el cliente
             $client->reserve()->save($reserve);

             foreach ($request->rentings as $data){

                // Se crea un alquiler
                $renting = new Renting;
                $renting->start = new Carbon($data[0]);
                $renting->end = $renting->start->addHour();
                $renting->room_id = $data[1];
                $renting->save();             

                // Se guarda la relacion muchos a muchos de alquiler y reserva
                $reserve->renting()->attach($renting->id);

             }             

             // Se genera una factura del pago realizado
             $invoice = new Invoice;
             $invoice->total = $pay->total;
             $invoice->iva = ($pay->total)*0.21;
             $invoice->subtotal = $pay->total - $invoice->iva;
             
             // Se guarda la relacion de la reserva con la factura
             $reserve->invoice()->save($invoice);

        });
    }
}
