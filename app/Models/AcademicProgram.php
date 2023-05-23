<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class AcademicProgram extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, UsersDetail::class, 'academic_program_id', 'id', );
    }
}
