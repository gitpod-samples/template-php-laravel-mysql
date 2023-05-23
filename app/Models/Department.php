<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['collage_id', 'name', 'deleted_at','slug'];

    public function collage()
    {
        return $this->belongsTo(Collage::class);
    }

    public function user()
    {
        $this->hasMany(User::class);
    }
    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, UsersDetail::class, 'department_id','id',);
    }
}
