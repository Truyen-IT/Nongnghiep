<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhanvien extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $table='tbl_nhanvien';//ghi dung bang ten
    protected $primarykey='nhanvien_id';
    protected $filltable=[
        'nhanvien_maso','nhanvien_hoten','cap_id','nhanvien_gioitinh','name_nhanvien','nhanvien_email','nhanvien_matkhau', 'nhanvien_sdt','nhanvien_ngay','nhanvien_hinhanh','trangthai','nhanvien_diachi' //khong can dung vi tri

    ];
}
