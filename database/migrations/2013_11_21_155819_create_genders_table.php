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
        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('genders')->insert(
            [
                ['name' => 'Male', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Female', 'created_at' => now(), 'updated_at' => now()],
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
        Schema::dropIfExists('genders');
    }
};
