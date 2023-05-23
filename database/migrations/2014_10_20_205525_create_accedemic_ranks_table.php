<?php

use App\Models\AcademicRank;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
		Schema::create('academic_ranks', function (Blueprint $table) {
			$table->id();
			$table->string('name')->unique();
			$table->string('slug')->unique();
			$table->timestamps();
			$table->softDeletes();
		});

		//Create academic rank

		AcademicRank::create([
			'name' => 'Level IV',
			'slug' => Str::slug('Level IV'),
		]);
		AcademicRank::create([
			'name' => 'Assistant Lecture',
			'slug' => Str::slug('Assistant Lecture'),
		]);
		AcademicRank::create([
			'name' => 'Lecture',
			'slug' => Str::slug('Lecture'),
		]);
		AcademicRank::create([
			'name' => 'Ass. Professor',
			'slug' => Str::slug('Ass. Professor'),
		]);
		AcademicRank::create([
			'name' => 'Professor',
			'slug' => Str::slug('Professor'),
		]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('academic_ranks');
	}
};
