<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table= 'countries';

    protected $fillable=[
        
        "fname" ,
        "lname" ,
        "email" ,
        "country_code" ,
        "contact_number" ,
        "gender" ,
        "Password" ,
        "decription" ,
    ];
}
