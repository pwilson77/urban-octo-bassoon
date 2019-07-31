<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function features()
    {
        return  $this->belongsToMany('App\Feature');
    }
}

