<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piloto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];
    
    public function vuelos() {
        return $this->hasMany(Vuelo::class);
    }
}
