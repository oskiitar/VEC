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
            'type' => 'er_history',
            'description' => 'Sala Escape Room de tematica historica',
            'price' => 49.50
        ]);

        Room::create([
            'type' => 'er_future',
            'description' => 'Sala Escape Room de tematica futurista',
            'price' => 51.50
        ]);

        Room::create([
            'type' => 'er_terror',
            'description' => 'Sala Escape Room de tematica terrorifica',
            'price' => 50
        ]);

        Room::create([
            'type' => 'vr_adventure',
            'description' => 'Sala Realidad Virtual con juego de aventuras',
            'price' => 59.50
        ]);

        Room::create([
            'type' => 'vr_space',
            'description' => 'Sala Realidad Virtual con juego espacial',
            'price' => 62.50
        ]);

        Room::create([
            'type' => 'vr_survivor',
            'description' => 'Sala Realidad Virtual con juego de supervivencia',
            'price' => 61.50
        ]);

        Room::create([
            'type' => 'vr_terror',
            'description' => 'Sala Realidad Virtual con juego de terror',
            'price' => 60
        ]); 
    }
}
