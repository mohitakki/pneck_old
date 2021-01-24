<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'user', 'module', 'record', 'type', 'created_at'
    ];

    protected $table='activity_logs';

}
