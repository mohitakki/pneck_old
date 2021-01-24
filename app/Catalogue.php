<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{   
		protected $table = 'vendor_catalogues';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps =false; //if do not want 
    //
}
