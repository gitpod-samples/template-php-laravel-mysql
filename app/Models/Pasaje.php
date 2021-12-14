<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasaje extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function vuelos(){
        return $this->belongsTo(Vuelo::class);
    }
}
