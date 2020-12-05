<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'type' => 0,
            'name' => 'Sala Historia',
            'description' => 'Sala Escape Room de tematica historica',
            'price' => 49.50
        ]);

        Room::create([
            'type' => 0,
            'name' => 'Sala Futuro',
            'description' => 'Sala Escape Room de tematica futurista',
            'price' => 51.50
        ]);

        Room::create([
            'type' => 0,
            'name' => 'Sala Terror',
            'description' => 'Sala Escape Room de tematica terrorifica',
            'price' => 50
        ]);

        Room::create([
            'type' => 1,
            'name' => 'Sala Aventuras',
            'description' => 'Sala Realidad Virtual con juego de aventuras',
            'price' => 59.50
        ]);

        Room::create([
            'type' => 1,
            'name' => 'Sala Espacial',
            'description' => 'Sala Realidad Virtual con juego espacial',
            'price' => 62.50
        ]);

        Room::create([
            'type' => 1,
            'name' => 'Sala Supervivencia',
            'description' => 'Sala Realidad Virtual con juego de supervivencia',
            'price' => 61.50
        ]);

        Room::create([
            'type' => 1,
            'name' => 'Sala Terror',
            'description' => 'Sala Realidad Virtual con juego de terror',
            'price' => 60
        ]); 
    }
}
