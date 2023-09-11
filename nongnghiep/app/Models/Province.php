<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    
    use HasFactory;
    public $timestamps= false;
    protected $table='tbl_quanhuyen';//ghi dung bang ten
    protected $primarykey='maqh';
    protected $filltable=[
        'name_quanhuyen','type','matp' //khong can dung vi tri

    ];
    
}
