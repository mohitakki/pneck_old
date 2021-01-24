<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AlertType extends Authenticatable
{
    use Notifiable;

    protected $table= 'alert_types';

    protected $fillable = [
        'name'
    ];

}
