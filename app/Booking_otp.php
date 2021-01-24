<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking_otp extends Model
{
  protected $table = 'booking_otp';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps =false; //if do not want 
}
