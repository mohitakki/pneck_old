<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    //primary key
    public $primaryKey = 'id';
  
    protected $fillable = [
        'city_name','state_id','country_id'
    ];
}
