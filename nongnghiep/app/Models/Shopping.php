<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    use HasFactory;
    public $timestamps= false;
   
    protected $filltable=[
        'shipping_name','shipping_address','shipping_phone','shipping_email','shipping_notes','shipping_method' //khong can dung vi tri

    ];
    protected $table='tbl_shipping';//ghi dung bang ten
    protected $primarykey='shipping_id';
}
