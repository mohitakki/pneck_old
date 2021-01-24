<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_feedback extends Model
{
    //#
     protected $table = 'tbl_feedbacks_emp';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps =false; //if do not want 
}
