<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genders extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'genders';
    protected $fillable = [
        'name',
        'deleted_at',
    ];
    
    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, UsersDetail::class, 'gender_id','id',);
    }
}
