<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function pilotos(){
        return $this->belongsTo(Piloto::class);
    }

    public function pasajes() {
        return $this->hasMany(Pasaje::class);
    }
}
