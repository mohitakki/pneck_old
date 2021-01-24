<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // use HasApiTokens, Notifiable;


     protected $table = 'tbl_employees';
  //primary key
  public $primaryKey = 'id';
  //Timestamps
  //public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];
  
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


}
