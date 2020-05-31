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
            'genero'=> 'Damas'
        ]);

        DB::table('genders')->insert([
            'genero'=> 'Caballeros'
        ]);

        DB::table('genders')->insert([
            'genero'=> 'Unisex'
        ]);
    }
}
