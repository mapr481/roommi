<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'nombre' => 'Miguel',
        'apellido' => 'Pinto',
        'cedula' => '23951208',
        'nacimiento' =>'1995-08-04 00:00:00',
        'telefono' => '04143446722',
        'esAdmin' => 'si',
        'email' => 'mapr481@gmail.com',
        'password' =>bcrypt('23951208')
      ]);
    }
}
