<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_location extends Model
{
    //
  protected $table = 'employee_current_loc_log';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps =true; //if do not want false
}
