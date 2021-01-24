<?php

namespace App;

use App\Notifications\AdminResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Menu extends Authenticatable
{
    use Notifiable;

    protected $table='admin_menus';

    protected $fillable = [
         'menu_name', 'menu_icon', 'menu_parent', 'menu_link', 'role', 'menu_status','sort'
    ];


    public function sub_menus()
    {
        return $this->hasmany('App\Menu','menu_parent')->orderby('sort','asc');
    }

	public function parent_menus()
    {
        return $this->belongsTo('App\Menu','menu_parent','id');
    }    

}
