<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Client;
use App\Reserve;
use App\Renting;
use App\Pay;
use App\Payway;
use App\Invoice;

class ReserveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = Client::all();
        $faker = Faker::create('es_ES');

        foreach ($clients as $client){
            $date = now()->addDay();
            $dateEnd = now()->addDay()->addHour(); 

            DB::transaction(function () use($client, $faker, $date, $dateEnd) {
                // Se crea la reserva
                $reserve = new Reserve;
                $reserve->reserve_date = now();

                // Se crea un alquiler
                $renting = new Renting;
                $renting->comment = $faker->text($maxNbChars = 200);
                $renting->start = $date;
                $renting->end = $dateEnd;
                $renting->save();             
                
                // Se guarda la relacion muchos a muchos de alquiler y reserva
                $reserve->renting()->attach($renting->id);

                // Se genera un pago
                $pay = new Pay;
                $date->addHour();
                $pay->pay_date = $date;
                $pay->total = 60;

                // Se busca un metodo de pago
                $payway = Payway::find(random_int(1,5));

                // Se guarda la relacion metodo pago y pago
                $payway->pay()->save($pay);

                // Se asocia la relacion de la reserva con el pago
                $reserve->pay()->associate($pay);

                // Se guarda la relacion reserva con el cliente
                $client->reserve()->save($reserve);                

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
}
