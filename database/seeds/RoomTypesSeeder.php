<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_types')->insert([
            'nombre' => 'anexo'
        ]);

        DB::table('room_types')->insert([
            'nombre' => 'casa'
        ]);

        DB::table('room_types')->insert([
            'nombre' => 'apartamento'
        ]);

        DB::table('room_types')->insert([
            'nombre' => 'dormitorio'
        ]);
    }


}
