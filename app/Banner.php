<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Banner extends Authenticatable
{
    use Notifiable;

  	protected $table= 'banners'; 

    protected $fillable = [
        'updated_by', 'title', 'banner','status'
    ];

    public function username()
    {
    	return $this->belongsTo('App\Admin','updated_by'); 
    }




}