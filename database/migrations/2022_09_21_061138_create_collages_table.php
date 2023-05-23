<?php

use App\Models\Collage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * php artisan migrate:fresh --path=/database/migrations/2022_09_21_061138_create_companies_table.php
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 100);
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('logo', 1080)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Collage::create([
            'name' => 'Engineering and Technology',
            'slug' => 'engineering-and-technology',
        ]);

        Collage::create([
            'name' => 'Informatics',
            'slug' => 'informatics',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collages');
    }
};
