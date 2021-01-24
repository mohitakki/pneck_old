<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvailableEmployees extends Model
{
      //table name here
	  protected $table = 'tbl_available_employees';
	  //primary key
	  public $primaryKey = 'id';
	  //Timestamps
	  public $timestamps =false; //if do not want
}
