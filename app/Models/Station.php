<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{

    public function route(){
        return $this->belongsTo(Route::class);
    }

}
