<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_profile extends Model
{
    protected $table="tbl_employee_profile";
    
    protected $fillable = [
        'emp_id','dl_file','vehicle_file','aadhar_image','profile_image',
    ];
}
