<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_service extends Model
{ protected $table = 'vendor_services';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps =true; //if do not want 
    //
}
