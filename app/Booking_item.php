<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking_item extends Model
{ protected $table = 'booking_x_items';

  //primary key
  public $primaryKey = 'id';
  
  //Timestamps
  //public $timestamps =false; //if do not want 

     protected $fillable = [
        'booking_id', 'order_info', 'emp_id','order_info2','line_total','created_at','updated_at',
    ];
}
