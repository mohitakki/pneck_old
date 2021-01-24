<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','name','product_name','product_id','image','mobile','delivery_charge','total',
        'tax','discount','qty','final_total','promo_code','deliver_by','payment_method',
        'address','delivery_time','active_status','date_added','latitude','longitude',
    ];
}
