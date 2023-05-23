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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 100);
            $table->foreignId('collage_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('departments')->insert(
            [
                [
                    'name' => 'Civil Engineering',
                    'slug' => 'civil-engineering',
                    'collage_id' => '1',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Chemical Engineering',
                    'slug' => 'chemical-engineering',
                    'collage_id' => '1',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'CS',
                    'slug' => 'cs',
                    'collage_id' => '2',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'IS',
                    'slug' => 'is',
                    'collage_id' => '2',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
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
        Schema::dropIfExists('departments');
    }
};
