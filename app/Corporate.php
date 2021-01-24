<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporate extends Model
{
    protected $fillable = [
        'business_name', 'email', 'mobile_no', 'description', 'gender', 'address', 'password', 'confirmpassword', 'paypalemail', 'pictureimage', 'total_request', 'status'
    ];
}
