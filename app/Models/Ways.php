<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ways extends Model
{
    public function route(){
        return $this->belongsTo(Route::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
