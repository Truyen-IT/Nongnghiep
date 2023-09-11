<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $table='tbl_product';//ghi dung bang ten
    protected $primarykey='product_id';
    protected $filltable=[
        'product_name','category_id','product_desc','product_content','product_price','product_cost','product_image',
         'product_noibat','product_status','product_views','product_thanhphan','product_hdsd','product_baoquan','product_hsd'
         ,'product_thetichthuc','product_luuy' //khong can dung vi tri

    ];
    public function  category(){
        return $this->belongsTo('App\Models\CategoryProductModel','category_id');
    }
}
