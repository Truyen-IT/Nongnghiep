<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class OrderDetails extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $table='tbl_details';//ghi dung bang ten
    protected $primarykey='order_details_id';
    protected $filltable=[
        'order_code','product_id','product_name','product_price','product_sales_quantity','product_coupon','product_feeship' //khong can dung vi tri

    ];
    public function product(){
        //return $this->belongsTo('App\Models\Product','product_id');
        return $this->hasOne(Product::class,'product_id');
    
    }
}
