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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('enrollments')->insert(
            [
                ['name' => 'Regular', 'slug' => 'regular', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Extension', 'slug' => 'extension', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Summer', 'slug' => 'summer', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Distance','slug' => 'distance', 'created_at' => now(), 'updated_at' => now()],
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
        Schema::dropIfExists('enrollments');
    }
};
