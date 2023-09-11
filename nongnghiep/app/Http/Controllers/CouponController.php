<?php

namespace App\Http\Controllers;
use App\Models\Coupon;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Unique;
session_start();
class CouponController extends Controller

{ 
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kiemtralog(){
        $admin_id=Session::get('admin_id');
        $nhanvien_id=Session::get('nhanvien_id');
        if($admin_id){
          return  Redirect::to('admin.dashboard');
        }elseif($nhanvien_id){
            return  Redirect::to('admin.dashboard');


        }
        else{
           return  Redirect::to('admin')->send();
        }

    }
    
    public function insert_coupon(){
        $this->kiemtralog();
    return view('admin.coupon.insert_coupon');

}
/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function save_coupon(Request $request){
    $data =$request->all();
    
    $data=$request->validate(
        [
            'coupon_name'=>'required|max:255',
            'coupon_code'=>'required|unique:tbl_coupon|max:6',
          
            'coupon_time'=>'required|max:255|integer',
            'coupon_number'=>'required|integer',
            'coupon_condition'=>'required',
            
        ],
        [
             'coupon_code.unique'=>'Code coupon đã có,xin hãy điền khác',
             'coupon_code.required'=>'Code mã giảm giá phải có',
             'coupon_code.max'=>'Code mã giảm giá tối đa 6 kí tự',

             'coupon_number.required'=>'Sô giảm giá phải có',
             'coupon_number.integer'=>'Sô giảm phải là số',
             'coupon_name.required'=>'Tên mã giảm giá phải có',
             'coupon_time.required'=>'Số lượng mã giảm giá phải có',
             'coupon_condition.required'=>'Tính trạng mã giảm giá phải có',
             'coupon_time.integer'=>'Số lượng phải là sô'
            
        ]

    );

    $coupon=new Coupon;
    $coupon->coupon_name=$data['coupon_name'];
    $coupon->coupon_number=$data['coupon_number'];
    $coupon->coupon_code=$data['coupon_code'];
    $coupon->coupon_time=$data['coupon_time'];
    $coupon->coupon_condition=$data['coupon_condition'];
    $coupon->save();
    Session::put('mes','Thêm mã giảm giá thành công');
    return Redirect::to('all-coupon');
}
public function all_coupon(){
    $coupon=Coupon::orderby('coupon_id','desc')->get();
    $k=0;
    foreach($coupon as $key =>$va){
        $k++;
    }
    $coupon=Coupon::orderby('coupon_id','desc')->paginate(9);
    return view('admin.coupon.all_coupon')->with(compact('coupon','k'));

}
public function delete_coupon($coupon_id){
    // $coupon=Coupon::find($coupon_id);
    DB::table('tbl_coupon')->where('coupon_id',$coupon_id)->delete();

    Session::put('mes','Xóa mã giảm giá thành công');
    return Redirect::to('all-coupon');

}
public function unset_coupon(){
    $coupon=Session::get('coupon');
    if($coupon==true){
        Session::forget('coupon');
        return redirect()->back()->with('mes','Xóa giảm giá thành công');



    }
    
}
    
}
