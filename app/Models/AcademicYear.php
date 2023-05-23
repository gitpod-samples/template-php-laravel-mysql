<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class AcademicYear extends Model
{
	use HasFactory;

	public function users(): HasManyThrough
	{
		return $this->hasManyThrough(User::class, UsersDetail::class, 'academic_year_id', 'id', );
	}
}
