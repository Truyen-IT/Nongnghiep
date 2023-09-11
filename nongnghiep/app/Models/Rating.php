<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $table='tbl_rating';//ghi dung bang ten
    protected $primarykey='rating_id';
    protected $filltable=[
        'product_id','rating'//khong can dung vi tri

    ];
}
