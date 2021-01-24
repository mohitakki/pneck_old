<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendor_current_loc_log extends Model
{
    protected $table = 'vendor_current_loc_log';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps =true; //if do not want false
}
