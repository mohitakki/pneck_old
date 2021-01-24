<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $fillable = [
        'number_hours','vehicle_type','distance','price','total_req','status'
    ];
}
