<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'service' => 'Internet'            
        ]);

        DB::table('services')->insert([
            'service' => 'Cable'            
        ]);

        DB::table('services')->insert([
            'service' => 'Telefono'            
        ]);
    }
}
