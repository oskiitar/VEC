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
        Payway::create([
            'name' => 'Visa'
        ]);

        Payway::create([
            'name' => 'MasterCard'
        ]);

        Payway::create([
            'name' => 'Paypal'
        ]);

        Payway::create([
            'name' => 'Googlepay'
        ]);

        Payway::create([
            'name' => 'Efectivo'
        ]);
    }
}
