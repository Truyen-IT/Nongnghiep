<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;
session_start();
class AdminController extends Controller
{
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
    public function index(){
        return view('admin_log');
    }

    public function dashboard(){
        $this->kiemtralog();
        $product=Product::all()->count();
        $order=Order::all()->count();
        $customer=Customer::all()->count();

        $tieuduong=Product::Where('product_vitamina','1')->count();
        $trinao=Product::Where('product_vitaminb','1')->count();
        $thieumau=Product::Where('product_vitamind','1')->count();
        $tieuhoa=Product::Where('product_vitamine','1')->count();


        $product_view=Product::orderBy('product_views','desc')->take(12)->get();
        
        return view('admin.dashboard')->with(compact('product','order','customer','product_view','tieuduong','trinao','thieumau','tieuhoa'));
    }
    public function dashboard_dangnhap(Request $request){
       $admin_email=$request->email;//lay ten ban day
       //md5($request->password);
       
       $admin_password=md5($request->password);
       $result=DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
       
       $result_nhanvien=DB::table('tbl_nhanvien')->where('nhanvien_email',$admin_email)->where('trangthai',0)->where('nhanvien_matkhau',$admin_password)->first();
   
    if( $result==true){
        Session::put('admin_name',$result->admin_name);
        Session::put('admin_id',$result->admin_id);
       
        return Redirect::to('/dashboard');
    }elseif($result_nhanvien==true){
        Session::put('admin_name',$result_nhanvien->name_nhanvien);
        Session::put('admin_id',$result_nhanvien->nhanvien_id);
      
        return Redirect::to('/dashboard');


    }
    elseif($result_nhanvien==false){
       
        Session::put('mesage','Tài khoản của bạn đã bị khóa');
        return Redirect::to('/admin');


    }
    else{
        Session::put('mesage','Tên đăng nhập hoặc mật khẩu không đúng');
        return Redirect::to('/admin');

    }
}
public function all_customer(){
    $this->kiemtralog();
    $cate_product=DB::table('tbl_customer')->orderBy('customer_id','desc')->get();
      
    return view('admin.all_customer')->with('cate_product',$cate_product);


}
    public function logout(){
        $this->kiemtralog();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
       
       
 
     }
     public function filter_by_date(Request $request){
        $data=$request->all();
        $from_date=$data['from_date'];
        $to_date=$data['to_date'];
        $get=Statistic::WhereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();
        foreach($get as $key=>$val){
           
            $chart_data[]=array(
                'period'=>$val->order_date,
               
                
                
                'order'=>$val->total_order,
                'sales'=>$val->sales,
                'profit'=>$val->profit,
                'quantity'=>$val->quantity

            );
           
        }

        echo $data=json_encode($chart_data);
     }
    public function dashboard_filter(Request $request){
        $data=$request->all();
        $dauthangnay=Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc=Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc=Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
       
        $sub7days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        
       
        $sub365days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
       
        $now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
       
        if($data['dashboard_value']=='7ngay'){
            $get=Statistic::WhereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();
        }elseif($data['dashboard_value']=='thangtruoc'){
            $get=Statistic::WhereBetween('order_date',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('order_date','ASC')->get();

        }elseif($data['dashboard_value']=='thangnay'){
            $get=Statistic::WhereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
            
        }else{
            
            $get=Statistic::WhereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
        
        }
        foreach($get as $key=>$val){
           
            $chart_data[]=array(
                'period'=>$val->order_date,
                'order'=>$val->total_order,
                'sales'=>$val->sales,
                'profit'=>$val->profit,
                'quantity'=>$val->quantity

            );
           
        }

        echo $data=json_encode($chart_data);



    }
    public function day_order(){
        $now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $sub700days=Carbon::now('Asia/Ho_Chi_Minh')->subdays(700)->toDateString();
        $get=Statistic::WhereBetween('order_date',[$sub700days,$now])->orderBy('order_date','ASC')->get();
        foreach($get as $key=>$val){
           
            $chart_data[]=array(
                'period'=>$val->order_date,
               
                
                
                'order'=>$val->total_order,
                'sales'=>$val->sales,
                'profit'=>$val->profit,
                'quantity'=>$val->quantity

            );
           
        }

        echo $data=json_encode($chart_data);

    }

    
}