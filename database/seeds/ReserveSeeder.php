<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Client;
use App\Reserve;
use App\Renting;
use App\Pay;
use App\Payway;

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
            $date = now();
            $date->add($client->id, 'day');
            $dater = $date->add(1, 'hour');

            DB::transaction(function () use($client, $faker, $date, $dater) {
                $reserve = new Reserve;
                $reserve->reserve_date = now();
                $client->reserve()->save($reserve);

                $renting = new Renting;
                $renting->comment = $faker->text($maxNbChars = 200);
                $renting->start = $date;
                $renting->end = $dater;
                $renting->save();

                $reserve->renting()->attach($renting->id);
            });        
        }
    }
}
