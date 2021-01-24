<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant_dish extends Model
{
    protected $fillable = [
         'user_id','res_id','name','category','image','price','discount','description','ingredients'
    ];
}
