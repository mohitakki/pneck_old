<?php

namespace App;

use App\Notifications\AdminResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MenuIcon extends Authenticatable
{
    use Notifiable;

    protected $table='menu_icons';

    protected $fillable = [
         'icons_name','content'
    ];

}
