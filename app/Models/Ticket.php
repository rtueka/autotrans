<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;
use App\Models\Ways;


class Ticket extends Model
{
    public function trip(){
        return $this->belongsTo(Trip::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function way(){
        return $this->belongsTo(Ways::class);
    }
}
