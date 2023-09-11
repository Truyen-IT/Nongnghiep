<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    public $timestamps= false;
   
    protected $filltable=[
        'order_date','sales','profit','quantity','total_order' //khong can dung vi tri

    ];
    protected $table='tbl_statistical';//ghi dung bang ten
    protected $primarykey='statistical_id';
}