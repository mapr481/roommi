<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
            'nombre'=> 'Damas'
        ]);

        DB::table('genders')->insert([
            'nombre'=> 'Caballeros'
        ]);

        DB::table('genders')->insert([
            'nombre'=> 'Unisex'
        ]);
    }
}
