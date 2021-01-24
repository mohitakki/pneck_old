<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_home_banner_slider_images extends Model
{   protected $table = 'vendor_home_banner_slider_images';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps =false; //if do not want 
  protected $fillable = [
        'title','image'
    ];
    //
}
