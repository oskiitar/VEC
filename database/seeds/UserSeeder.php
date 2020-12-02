<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
use App\Client;
use App\Employee;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = range(1,50);
        $employees = range(1,5);

        DB::transaction(function () {
            $user = User::create([
                'name' => 'admin',
                'surname' => 'superadmin',
                'tel' => '609071648',
                'email' => env('MAIL_FROM_ADDRESS'),
                'password' => '$2y$10$7gfThLdEF2EXuMq1C1sMDuSuvCE1gxpTqkDbdnc3RWASqzeovF3FC',
                'email_verified_at' => now(),
                'is_admin' => 1,
            ]);

            $employee = new Employee;
            $employee->contract_start = now();
            $employee->contract_end = null;

            $user->employee()->save($employee);
        });

        foreach ($clients as $client){
            DB::transaction(function () {
                $faker = Faker::create('es_ES');
                $user = User::create([
                    'name' => $faker->firstName,
                    'surname' => $faker->lastName,
                    'birthday' => $faker->dateTimeBetween($startDate = '-60 years', $endDate = '-18 years'),
                    'tel' => $faker->tollFreeNumber,
                    'email' => $faker->freeEmail,
                    'email_verified_at' => now(),
                    'password' => $faker->password,
                ]);

                $client = new Client;
                $client->address = $faker->streetAddress;
                $client->created_at = now();

                $user->client()->save($client);
            });            
        }

        foreach ($employees as $employee){
            DB::transaction(function () {
                $faker = Faker::create('es_ES');
                $user = User::create([
                    'name' => $faker->firstName,
                    'surname' => $faker->lastName,
                    'birthday' => $faker->dateTimeBetween($startDate = '-60 years', $endDate = '-18 years'),
                    'tel' => $faker->tollFreeNumber,
                    'email' => $faker->freeEmail,
                    'email_verified_at' => now(),
                    'password' => $faker->password,
                ]);

                $employee = new Employee;
                $employee->contract_start = now();
                $employee->contract_end = null;

                $user->employee()->save($employee);
            });            
        }
    }
}
