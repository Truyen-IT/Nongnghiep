<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Rating;
use App\Models\Product;
use App\Models\Coupon;
session_start();


class HomeController extends Controller
{
    public function index(){
        $cate_product_tuoi=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','21')->first();
        $cate_product_si=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
       
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','!=','21')
        ->where('category_id','!=','22')->orderBy('category_id','desc')->get();
        $cate_tes=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','!=','22')->orderBy('category_id','desc')->limit(3)->get();
        
        $noibat_product=DB::table('tbl_product')->where('product_status','1')->where('product_noibat','1')->where('category_id','!=','22')
        ->orderBy('product_id','desc')->paginate(8);
        $giare_product=DB::table('tbl_product')->where('product_status','1')->where('product_price','<=','60000')->where('category_id','!=','22')
        ->orderBy('product_id','desc')->limit(8)->get();
        $all_product=DB::table('tbl_product')->where('product_status','0')->orderBy('product_id','desc')->limit(4)->get();
     
       $rating=DB::table('tbl_rating')->get();
      return view('pages.show_danh_muc')->with('category', $cate_product)->with('product', $all_product)
      ->with('noibat_product',$noibat_product)->with('rating',$rating)->with('cate_tes', $cate_tes)
      ->with('giare_product',$giare_product)->with('cate_product_tuoi', $cate_product_tuoi)->with('cate_product_si', $cate_product_si);
     
  
    
    }
  
    public function   gioi_thieu(){
       
        $cate_product_tuoi=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','21')->first();
        $cate_product_si=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
      
       
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','!=','21')
        ->where('category_id','!=','22')->orderBy('category_id','desc')->get();
         $noibat_product=DB::table('tbl_product')->where('product_status','0')->where('product_noibat','1')->orderBy('product_id','desc')->limit(4)->get();
        $all_product=DB::table('tbl_product')->where('product_status','0')->orderBy('product_id','desc')->limit(4)->get();
      
      
   
      
        
        return view('pages.gioi_thieu')->with('category', $cate_product)->with('product', $all_product)
        ->with('noibat_product',$noibat_product)->with('cate_product_tuoi',$cate_product_tuoi)->with('cate_product_si',$cate_product_si);
        
 
    
    }
   public function kien_thuc(){
    $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
    $noibat_product=DB::table('tbl_product')->where('product_status','0')->where('product_noibat','1')->orderBy('product_id','desc')->limit(4)->get();
    $all_product=DB::table('tbl_product')->where('product_status','0')->orderBy('product_id','desc')->limit(4)->get();
    return view('pages.kien_thuc')->with('category', $cate_product)->with('product', $all_product)->with('noibat_product',$noibat_product);
 
   }
    public function  lien_he(){
       
        $cate_product_tuoi=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','21')->first();
        $cate_product_si=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
      
       
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','!=','21')
        ->where('category_id','!=','22')->orderBy('category_id','desc')->get();
        $noibat_product=DB::table('tbl_product')->where('product_status','0')->where('product_noibat','1')->orderBy('product_id','desc')->limit(4)->get();
        $all_product=DB::table('tbl_product')->where('product_status','0')->orderBy('product_id','desc')->limit(4)->get();
      
      
   
      
        
        return view('pages.lien_he')->with('category', $cate_product)->with('product', $all_product)->with('noibat_product',$noibat_product)
        ->with('cate_product_tuoi',$cate_product_tuoi)->with('cate_product_si',$cate_product_si);
        
        
 
    
    }
    
    public function tatca(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        
        $all_product=DB::table('tbl_product')->where('product_status','0')->orderBy('product_id','desc')->limit(4)->get();
        return view('pages.home')->with('category', $cate_product)->with('product', $all_product);

    }
    public function  tim_kiem(Request $request){
        $cate_product_tuoi=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','21')->first();
        $cate_product_si=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
      
        $keywords=$request->tukhoa;
       
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','!=','21')
        ->where('category_id','!=','22')->orderBy('category_id','desc')->get();
        
        $rating=DB::table('tbl_rating')->get();
        $search_product=DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        
          
      
        return view('pages.sanpham.search')->with('category', $cate_product)->with('search',$search_product )
       ->with('rating',$rating)->with('keywords',$keywords)->with('cate_product_tuoi', $cate_product_tuoi)->with('cate_product_si', $cate_product_si);

    }
    public function xem_laigio($customer_id){
        $cate_product_tuoi=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','21')->first();
        $cate_product_si=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
       
        $cate_giohang=DB::table('tbl_order')->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')->where('tbl_order.customer_id',$customer_id)->orderBy('tbl_order.order_id','desc')->get();
        return view('pages.xem_laigio')->with('category', $cate_product)->with('cate_giohang', $cate_giohang )->with('cate_product_tuoi', $cate_product_tuoi)->with('cate_product_si', $cate_product_si);

    }
    public function xem_gio_hang($order_code){
        $cate_product_tuoi=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','21')->first();
        $cate_product_si=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
       
        $xem_gio=DB::table('tbl_details')->where('tbl_details.order_code',$order_code)->get();
        $magiam=Coupon::orderBy('coupon_id','DESC')->get();
       


        return view('pages.xem_gio')->with('category', $cate_product)->with('xem_gio',$xem_gio)->with('magiam',$magiam)->with('cate_product_tuoi', $cate_product_tuoi)->with('cate_product_si', $cate_product_si);

    }
    public function xoa_gio_hang($order_code){
        $data=array();
        $data['order_status']=6;

        DB::table('tbl_order')->where('order_code',$order_code)->update($data);
        return redirect()->back();


    }
   
   
  
}
