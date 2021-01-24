<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_otp extends Model
{    
	 //Table name
  protected $table = 'tbl_customer_otp';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps =false; //if do not want 
    //
}
