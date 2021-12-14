<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Piloto::factory(25)->create();
        \App\Models\Vuelo::factory(100)->create();
        \App\Models\Pasaje::factory(1000)->create();
    }
}
