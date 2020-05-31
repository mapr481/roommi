<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(ServiceSeeder::class);         
        $this->call(CharacteristicSeeder::class);
        $this->call(RoomOptionSeeder::class);
        $this->call(TypeRoomSeeder::class);
        $this->call(GenderSeeder::class);
    }
}
