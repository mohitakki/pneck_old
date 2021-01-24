<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class GeneralSetting extends Authenticatable
{
    use Notifiable;

  	protected $table= 'general_settings'; 

    protected $fillable = [
        'updated_by', 'header', 'footer','site_title', 'copyright', 'logo','status'
    ];

    public function username()
    {
    	return $this->belongsTo('App\Admin','updated_by'); 
    }




}
