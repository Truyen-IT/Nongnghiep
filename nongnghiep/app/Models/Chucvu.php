<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chucvu extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $table='tbl_cap';//ghi dung bang ten
    protected $primarykey='cap_id';
    protected $filltable=[
        'cap_name','captien' //khong can dung vi tri

    ];
}
