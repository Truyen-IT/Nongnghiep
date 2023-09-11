<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $table='tbl_tinhthanhpho';//ghi dung bang ten
    protected $primarykey='matp';
    protected $filltable=[
        'name_city','type' //khong can dung vi tri

    ];
}
