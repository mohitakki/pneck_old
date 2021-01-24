<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class EmailTemplate extends Authenticatable
{
    use Notifiable;

    protected $table= 'email_templates';

    protected $fillable = [
        'updated_by','email_for','for_user','email_heading', 'email_subject','email_body',
    ];

    public function username()
    {
    	return $this->belongsTo('App\Admin','updated_by','id'); 
    }


}
