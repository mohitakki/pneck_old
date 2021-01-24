<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'first_name','last_name','corporation','service','email','contact','gender','plate_no','model','color','address','image','car','password','cpassword','description'
    ];
}
