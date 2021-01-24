<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Subcategory extends Authenticatable
{
    use Notifiable;

  	protected $table= 'subcategorys'; 

    protected $fillable = [
        'updated_by', 'subtitle' ,'title'
    ];

    public function username()
    {
    	return $this->belongsTo('App\Admin','updated_by'); 
    }




}