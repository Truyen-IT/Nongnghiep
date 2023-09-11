<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps= false;
    
    protected $filltable=[
        'customer_name','customer_email','customer_password','customer_phone','trangthai' //khong can dung vi tri

    ];
    protected $table='tbl_customer';//ghi dung bang ten
    protected $primarykey='customer_id';
}
