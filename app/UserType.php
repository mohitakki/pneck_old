<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserType extends Authenticatable
{
    use Notifiable;

    protected $table= 'user_type';

    protected $fillable = [
       'name',
    ];


    public function username()
    {
    	return $this->belongsTo('App\Admin','updated_by','id'); 
    }


}
