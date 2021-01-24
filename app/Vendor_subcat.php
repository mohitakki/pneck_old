<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_subcat extends Model
{   protected $table = 'vendor_service_subcat';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps =false; //if do not want 

  protected $fillable = [
    'category_images','title','code','body'
];
    //
    
    public function countVendors()
    {
        return $this->hasMany("\App\Vendor_skils", "subcat_id", "id");
    }
}
