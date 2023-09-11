<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    
    use HasFactory;
    public $timestamps= false;
    protected $table='tbl_coupon';//ghi dung bang ten
    protected $primarykey='coupon_id';
    protected $filltable=[
        'coupon_name','coupon_code','coupon_number','coupon_time','coupon_condition' //khong can dung vi tri

    ];
}
