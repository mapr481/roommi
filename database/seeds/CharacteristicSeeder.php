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
            'caracteristica' => 'visitas',
        ]);

        DB::table('characteristics')->insert([
            'caracteristica' => 'vehiculos',
        ]);

        DB::table('characteristics')->insert([
            'caracteristica' => 'mascotas',
        ]);

        DB::table('characteristics')->insert([
            'caracteristica' => 'cocina',
        ]);

    }
}
