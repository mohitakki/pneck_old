<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_feedback extends Model
{
    ////
  protected $table = 'tbl_feedbacks';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps =false; //if do not want 
}
