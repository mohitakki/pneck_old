<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_feedback extends Model
{   
  protected $table = 'tbl_feedbacks_x_vendors';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps =false; //if do not want 
    //
}
