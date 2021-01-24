<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'user_id','name','address','phone','mobile','lati','longi','description','image','status'
    ];
}
