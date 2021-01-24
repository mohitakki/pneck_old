<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'tbl_category';

    //primary key
    public $primaryKey = 'id';
  
    protected $fillable = [
        'name','is_active','user_id'
    ];
}
