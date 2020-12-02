<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Payway;

class PaywaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');
        $fakers = [];

        do{

            $fake = $faker->creditCardType;
            
            if (!in_Array($fake, $fakers)){
                array_push($fakers, $fake);
                $payway = Payway::create([
                    'name' => $fake
                ]);
            }

        } while ($payway->id < 5);
    }
}
