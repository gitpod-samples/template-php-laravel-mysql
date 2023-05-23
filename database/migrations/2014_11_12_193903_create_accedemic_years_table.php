<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_years', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('academic_years')->insert(
            [
                ['name' => '1st Year', 'created_at' => now(), 'updated_at' => now()],
                ['name' => '2nd Year', 'created_at' => now(), 'updated_at' => now()],
                ['name' => '3rd Year', 'created_at' => now(), 'updated_at' => now()],
                ['name' => '4th Year', 'created_at' => now(), 'updated_at' => now()],
                ['name' => '5th Year', 'created_at' => now(), 'updated_at' => now()],
                ['name' => '6th Year', 'created_at' => now(), 'updated_at' => now()],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academic_years');
    }
};
