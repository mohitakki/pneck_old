<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
  protected $table = 'tbl_bookings';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps =false; //if do not want 
}
