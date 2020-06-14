<?php

use App\Models\RoomOption;
use App\Models\RoomType;
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
        $this->call(CharacteristicSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(RoomTypesSeeder::class);
        $this->call(RoomOptionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
