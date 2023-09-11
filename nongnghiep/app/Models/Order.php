<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps= false;
    
    protected $filltable=[
        'customer_id','shipping_id','order_status','order_code','order_date','created_at' //khong can dung vi tri

    ];
    protected $table='tbl_order';//ghi dung bang ten
    protected $primarykey='order_id';
    
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
