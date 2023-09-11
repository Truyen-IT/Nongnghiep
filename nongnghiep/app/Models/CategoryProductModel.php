<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProductModel extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $table='tbl_category_product';//ghi dung bang ten
    protected $primarykey='category_id';
    protected $filltable=[
        'category_name','category_product_image','category_desc','category_status' //khong can dung vi tri

    ];
    public function product(){
        return $this->hasMany('App\models\Product');
    }
}