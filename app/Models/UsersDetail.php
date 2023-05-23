<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Znck\Eloquent\Relations\BelongsToThrough;

class UsersDetail extends Model
{
    use HasFactory;
    // use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $fillable = [
        'user_id',
        'gender_id',
        'id_number',
        'date_of_birth',
        'phone_number',
        'nationality',
        'about_user',
        'is_profile_public',
        'user_type_id',
        'office_location',
        'department_id',
        'academic_rank_id',
        'enrollment_id',
        'academic_program_id',
        'academic_year_id',
    ];


    // public function users(): HasMany
    // {
    //     return $this->hasMany(User::class);
    // }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    // public function collage(): BelongsToThrough
    // {
    //     return $this->belongsToThrough(Collage::class, Department::class);
    // }
    public function gender(): BelongsTo
    {
        return $this->belongsTo(Genders::class, 'gender_id', 'id');
    }
    public function academicRank(): BelongsTo
    {
        return $this->belongsTo(AcademicRank::class);
    }
    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }
    public function academicProgram(): BelongsTo
    {
        return $this->belongsTo(AcademicProgram::class);
    }
    public function enrolment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }
    public function type(): BelongsTo
    {
        return $this->belongsTo(UserType::class);
    }
    public function isProfilePublic(): bool
    {
        return $this->is_profile_public;
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'nationality', 'short_code');
    }
}
