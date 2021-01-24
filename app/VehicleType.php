<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='vehicle_type';

    protected $fillable = [
        'id','vehicle_type','created_at','vehicle_image'
    ];
}
