<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collage extends Model
{
    use HasFactory;
    use SoftDeletes;
    // use \Staudenmeir\EloquentHasManyDeep\HasRelationships;


    protected $fillable = ['name','email','website','address','logo','slug'];

    public function departments()
    {
        return $this->hasMany(Department::class)->with('users');
    }

    // public function users()
    // {
    //     return $this->hasManyDeep(
    //         User::class,
    //         [Department::class, UsersDetail::class], // Intermediate models, beginning at the far parent (Country).
    //         [
    //            'collage_id', // Foreign key on the "users" table.
    //            'department_id',    // Foreign key on the "posts" table.
    //            'id'     // Foreign key on the "comments" table.
    //         ],
    //         [
    //           'id', // Local key on the "countries" table.
    //           'id', // Local key on the "users" table.
    //           'user_id'  // Local key on the "posts" table.
    //         ]
    //     );
    // }

    // public function users(): HasManyThrough
    // {
    //     return $this->hasManyThrough(User::class, UsersDetail::class, 'user_type_id','id');
    // }
}
