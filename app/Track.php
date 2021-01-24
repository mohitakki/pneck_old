<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    //
  protected $table = 'tbl_real_time_tracking';
    
    protected $fillable = [
        'booking_id','emp_id', 'current_lat','current_long'
    ];

  //Timestamps
  public $timestamps =false; //if do not want 
}
