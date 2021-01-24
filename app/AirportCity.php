<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirportCity extends Model
{
    //
    protected $table="airport_cities";
    protected $fillable=[
        "city_country_code",
        "city_airports",
        "city_name"
    ];
}
