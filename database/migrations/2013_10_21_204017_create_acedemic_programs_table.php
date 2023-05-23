<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_programs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->timestamps();

            $table->softDeletes();
        });
        DB::table('academic_programs')->insert(
            [
                ['name' => 'Diploma', 'slug' => Str::slug('Diploma'), 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Under-graduate', 'slug' => Str::slug('Under-graduate'), 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Post-graduate (Masters)', 'slug' => Str::slug('Post-graduate (Masters)'), 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Post-graduate (PhD)', 'slug' => Str::slug('Post-graduate (PhD)'), 'created_at' => now(), 'updated_at' => now()],
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
        Schema::dropIfExists('academic_programs');
    }
};
