<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Category extends Authenticatable
{
    use Notifiable;

  	protected $table= 'categorys'; 

    protected $fillable = [
        'updated_by', 'title'
    ];

    public function username()
    {
    	return $this->belongsTo('App\Admin','updated_by'); 
    }




}