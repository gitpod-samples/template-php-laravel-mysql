<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicRank extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'deleted_at',
    ];

    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, UsersDetail::class, 'academic_rank_id','id',);
    }
}
