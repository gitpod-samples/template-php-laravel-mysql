<?php

namespace Database\Seeders;

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
        \App\Models\Piloto::factory(25)->create();
        \App\Models\Vuelo::factory(100)->create();
        \App\Models\Pasaje::factory(1000)->create();
    }
}
