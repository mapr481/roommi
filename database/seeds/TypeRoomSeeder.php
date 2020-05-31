<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_rooms')->insert([
            'tipos' => 'anexo'
        ]);

        DB::table('type_rooms')->insert([
            'tipos' => 'casa'
        ]);
    
        DB::table('type_rooms')->insert([
            'tipos' => 'apartamento'
        ]);

        DB::table('type_rooms')->insert([
            'tipos' => 'dormitorio'
        ]);
    }

    
}
