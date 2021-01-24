<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Alert extends Authenticatable
{
    use Notifiable;

    protected $table= 'alerts';

    protected $fillable = [
        'updated_by','alert_for', 'alert_type','alert_title','alert_message','status'
    ];



    public function username()
    {
    	return $this->belongsTo('App\Admin','updated_by','id'); 
    }

}
