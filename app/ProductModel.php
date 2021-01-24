<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'tbl_products';

    //primary key
    public $primaryKey = 'id';
  
    protected $fillable = [
        'fk_category_id','image','name','mrp','selling_price','per_piece_price','number_of_piece','details','user_id',
    ];

   
}
