<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpApplication extends Model
{
    protected $table = 'emp_applications';

    protected $fillable = [
        'name','email','mobile','state_id','city_id','father_name', 'image', 'postal_address','permanent_address','office_no','landline_no','dob','qualification',
        'present_employer','current_position','applyied_for','company_experience','total_experience','notice_period','present_salary',
        'expected_salary'
    ];
}