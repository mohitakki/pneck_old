<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    //
    protected $fillable =[
        'first_name' ,
                'first_name' ,
                'last_name'  ,
                'email'  ,
                'country_code'  ,
                'contact_number'  ,
                'gender'  ,
                'image',
                'password'
    ];
}
