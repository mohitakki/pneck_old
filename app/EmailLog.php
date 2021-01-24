<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    protected $fillable = [
        'from', 'to', 'subject', 'message', 'status',
    ];

    protected $table='email_logs';

}
