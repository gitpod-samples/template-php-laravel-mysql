<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('gender_id')->nullable()->constrained();
            $table->date('date_of_birth')->nullable();
            $table->string('id_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('office_location')->nullable();
            $table->foreignId('department_id')->nullable()->constrained();
            $table->foreignId('academic_rank_id')->nullable()->constrained();
            $table->foreignId('enrollment_id')->nullable()->constrained();
            $table->foreignId('academic_program_id')->nullable()->constrained();
            $table->foreignId('academic_year_id')->nullable()->constrained();
            $table->string('nationality')->nullable();
            $table->longText('about_user')->nullable();
            $table->boolean('is_profile_public')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_details');
    }
};
