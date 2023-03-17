<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Route;
use App\Models\Bus;
use App\Models\Ticket;

class Trip extends Model
{
    public function route(){
        return $this->belongsTo(Route::class);
    }

    public function bus(){
        return $this->belongsTo(Bus::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
