<?php

namespace App;

use App\Notifications\AdminResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Menu;
use Auth;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='admins_users';

    protected $fillable = [
        'first_name','last_name','email','branch_id','agent_id','assign_agent','assign_distributor','state_id','city_id','latitude','lognitude','password','mobile','role_type','status','timezone', 'currency',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPassword($token));
    }


    public function menus()
    {
            return $this->hasmany('App\Menu','role','role_type')->orderby('sort','asc')->where('menu_status','1');
    }

    public function role_detail()
    {
        return $this->hasone('App\Role','id','role_type')->where('status','1');

    }
    
    public function state()
    {
        return $this->hasone('App\State','id','state_id');

    }

    public function city()
    {
        return $this->hasone('App\City','id','city_id');

    }


     public function adminuser_menus()
    {
            return $this->hasmany('App\AdminUserMenu','role','role_type')->orderby('sort','asc')->where('menu_status','1');
    }
}
