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
            'nombre' => 'permite visitas',
        ]);

        DB::table('characteristics')->insert([
            'nombre' => 'permite vehiculos',
        ]);

        DB::table('characteristics')->insert([
            'nombre' => 'permite mascotas',
        ]);

        DB::table('characteristics')->insert([
            'nombre' => 'posee cocina',
        ]);

    }
}
