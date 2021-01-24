<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Currency extends Authenticatable
{
    use Notifiable;

    protected $table= 'currency';

    protected $fillable = [
        'country', 'currency', 'code', 'symbol',
    ];


    public function username()
    {
    	return $this->belongsTo('App\Admin','updated_by','id'); 
    }


}
