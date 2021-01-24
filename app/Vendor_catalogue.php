<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_catalogue extends Model
{   
    protected $table = 'vendor_catalogues';
  //primary key
  public $primaryKey = 'id';
 
  protected $fillable = [
    'cat_id','service_id','title','code','body',
  ];
}
