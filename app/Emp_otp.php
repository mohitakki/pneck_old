<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emp_otp extends Model
{
    //
    protected $table = 'tbl_employees_otp';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps = false;
}
