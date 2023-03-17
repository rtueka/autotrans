<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;

class Route extends Model
{
    public function trips(){
        return $this->hasMany(Trip::class);
    }

    public function stations(){
        return $this->hasMany(Station::class);
    }

    public function ways(){
        return $this->hasMany(Ways::class);
    }
}
