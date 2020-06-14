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
        DB::table('options')->insert([
            'nombre' => 'baño interno'
        ]);

        DB::table('options')->insert([
            'nombre' => 'baño compartido'
        ]);

        DB::table('options')->insert([
            'nombre' => 'cuarto individual'
        ]);

        DB::table('options')->insert([
            'nombre' => 'cuarto duplex'
        ]);

        DB::table('options')->insert([
            'nombre' => 'especificacion estudiante'
        ]);

        DB::table('options')->insert([
            'nombre' => 'especificacion profesional'
        ]);

        DB::table('options')->insert([
            'nombre' => 'especificacion ambos'
     ]);
    }
}
