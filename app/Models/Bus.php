<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;

class Bus extends Model
{
    public function trips(){
        return $this->hasMany(Trip::class);
    }
}
