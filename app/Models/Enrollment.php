<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug',];

    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, UsersDetail::class, 'enrollment_id','id',);
    }
}
