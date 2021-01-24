<?php

namespace App;

use App\Notifications\AdminResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUserMenu extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='admin_user_menus';

    protected $fillable = [
        'menu_id','menu_name', 'menu_icon', 'menu_parent', 'menu_link', 'role', 'menu_status',
    ];

    public function adminuser_sub_menus($role)
    {
         return $this->hasMany('App\AdminUserMenu','menu_parent','menu_id')->where('role',$role)->orderby('sort','asc')->get();
    }


    

}
