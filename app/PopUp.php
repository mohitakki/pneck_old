<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PopUp extends Authenticatable
{
    use Notifiable;

    protected $table= 'pop_ups';

    protected $fillable = [
        'updated_by','popup_for', 'popup_type','popup_title','popup_message','status'
    ];


    public function username()
    {
    	return $this->belongsTo('App\Admin','updated_by','id'); 
    }

}
