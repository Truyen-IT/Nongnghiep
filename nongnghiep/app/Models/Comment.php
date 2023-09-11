<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $table='tbl_comment';//ghi dung bang ten
    protected $primarykey='comment_id';
    protected $filltable=[
        'product_id','comment_date','customer_id','comment' //khong can dung vi tri

    ];
}
