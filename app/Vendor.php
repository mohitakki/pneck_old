<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Database\Eloquent\Model;
// class Customer extends Model
class Vendor extends Authenticatable implements MustVerifyEmail
{  use Notifiable;
    //
      protected $table = 'tbl_vendors';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','device_id','mobile','email',
         'password','ep_token','aadhar_number','pan_number','is_active'
    ];
  
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //////////
}
