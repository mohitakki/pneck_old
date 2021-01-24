<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking_rating extends Model
{
    //
  protected $table = 'tbl_ratings';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps =false; //if do not want 
}
