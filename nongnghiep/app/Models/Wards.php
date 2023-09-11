<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    
    use HasFactory;
    public $timestamps= false;
    protected $table='tbl_xaphuongthitran';//ghi dung bang ten
    protected $primarykey='xaid';
    protected $filltable=[
        'name_xaphuong','type','maqh' //khong can dung vi tri

    ];
}