<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_otp extends Model
{    protected $table = 'tbl_vendor_otp';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps =false; //if do not want 
    //
}
