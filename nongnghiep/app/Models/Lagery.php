<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lagery extends Model
{
    use HasFactory;
    public $timestamps= false;
    
    protected $filltable=[
        'lagery_image','prouct_id' //khong can dung vi tri

    ];
    protected $table='tbl_lagery';//ghi dung bang ten
    protected $primarykey='lagery_id';
    
}
