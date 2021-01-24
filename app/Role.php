<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_name','status'
    ];

    protected $table='admin_user_roles';


    public  function menus()
    {
    	return $this->hasmany('App\Menu','role','id');
    }

     public function adminuser_menus()
    {
        return $this->hasmany('App\AdminUserMenu','role','id');
    }
}
