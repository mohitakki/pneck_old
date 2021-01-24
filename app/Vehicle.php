<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'status','vehicle_type','no_of_seats','base_fare','mini_fare','booking_fee','tax_percentage','price_minute','price_mile','mile_kms','picture'
    ];
}
