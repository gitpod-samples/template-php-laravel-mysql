<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use JeffGreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Tags\HasTags;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use SoftDeletes;
    // use HasTags;
    // use \Staudenmeir\EloquentHasManyDeep\HasRelationships;
    // use \Znck\Eloquent\Traits\BelongsToThrough;
    protected $fillable = [
        'first_name',
        'last_name',
        'is_active',
        'email',
        'password',
        'username',
        'deleted_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // public function id(): int
    // {
    //     return $this->id();
    // }

    public function name(): string
    {
        return $this->name;
    }

    public function emailAddress(): string
    {
        return $this->email;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function isLoggedInUser(): bool
    {
        return $this->id === Auth::id();
    }

    public function detail(): HasOne
    {
        return $this->hasOne(UsersDetail::class);
    }

    public function isStaff(): bool
    {
        return !($this->hasRole('student', 'web'));
    }

    public function isStudent(): bool
    {
        return $this->hasRole('student', 'web');
    }

    public function isAcademicStaff(): bool
    {
        return $this->hasRole('academic_staff', 'web');
    }

    public function isAdministrativeStaff(): bool
    {
        return $this->hasRole('administrative_staff', 'web');
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super_admin', 'web');
    }

    // public function department()
    // {
    // 	return $this->belongsToThrough(Department::class, UsersDetail::class, [User::class => 'id']);
    // }

    // public function books()
    // {
    // 	return $this->HasMany(Book::class, 'uploaded_by', 'id');
    // }
}
