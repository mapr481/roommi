<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characteristics')->insert([
            'nombre' => 'visitas',
        ]);

        DB::table('characteristics')->insert([
            'nombre' => 'vehiculos',
        ]);

        DB::table('characteristics')->insert([
            'nombre' => 'mascotas',
        ]);

        DB::table('characteristics')->insert([
            'nombre' => 'cocina',
        ]);

    }
}
