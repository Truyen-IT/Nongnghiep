<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Feeship extends Model
{
    use HasFactory;
    public $timestamps= false;
    protected $table='tbl_feeship';//ghi dung bang ten
    protected $primarykey='fee_id';
    protected $filltable=[
        'fee_matp','fee_maqh','fee_xaid','fee_feeship' //khong can dung vi tri

    ];
    // public function city(){
    //     return $this->belongsTo('app\Models\City','fee_matp');
    // }
    // public function province(){
    //     return $this->belongsTo('app\Models\Province','fee_maqh');
    // }
    // public function wards(){
    //     return $this->belongsTo('app\Models\Wards','fee_xaid');
    // }
    //   public function city(){
    //     return $this->hasMany(City::class,'fee_matp');
    // }
    // public function province(){
    //     return $this->hasMany(Province::class,'fee_maqh');
    // }
    // public function wards(){
    //     return $this->hasMany(Wards::class,'fee_xaid');
    // }
}
