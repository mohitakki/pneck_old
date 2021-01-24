<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{   protected $table = 'states';

    //primary key
    public $primaryKey = 'id';
  
    protected $fillable = [
        'name',
    ];

}
