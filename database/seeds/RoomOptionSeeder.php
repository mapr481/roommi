<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_options')->insert([
            'baño' => 'interno'
        ]);

        DB::table('room_options')->insert([
            'baño' => 'compartido'
        ]);

        DB::table('room_options')->insert([
            'cuarto' => 'individual'
        ]);

        DB::table('room_options')->insert([
            'cuarto' => 'duplex'
        ]);

        DB::table('room_options')->insert([
            'especificacion' => 'estudiante'
        ]);

        DB::table('room_options')->insert([
            'especificacion' => 'profesional'
        ]);

        DB::table('room_options')->insert([
            'especificacion' => 'ambos'
        ]);
    }
}
