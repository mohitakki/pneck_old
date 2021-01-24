<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    protected $fillable = [
        'user', 'browser', 'ip_address',
    ];

    protected $table='login_logs';

}
