<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Feeship;
use App\Models\Product;
use App\Models\Statistic;
use Carbon\Carbon;
use PhpParser\PrettyPrinter\Standard;

session_start();
class CheckoutController extends Controller
{
    public function login_checkout(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        return view('pages.checkout.login_checkout')->with('category', $cate_product);

    }
    public function add_customer( Request $request){
        $data=array();//tao ra cai mang

       $data=$request->validate(
        [
           'customer_name'=>'required|max:7',
           'customer_phone'=>'required|numeric',
          
            'customer_email'=>'required|email|unique:tbl_customer|max:5000',
           
            
            'customer_password'=>'required|min:8',
            
            
        ],
        [
             'customer_name.required'=>'Tên đăng nhập phải có',
             'customer_name.max'=>'Chiều dài tên đăng nhập tối đa 7 kí tự',
             'customer_phone.required'=>'Số điện thoại phải có',
             'customer_phone.numeric'=>'Số điện thoại phải là sô',
             'customer_email.unique'=>'Email đã có, xin điền email khác',
             
             
             'customer_email.required'=>'Tên email phải có',
             'customer_email.email'=>'Nhập tên email chưa đúng định dạng',
             'customer_password.required'=>'Mật khẩu phải có',
             'customer_password_confirmation.required'=>'Nhập lại mật khẩu phải có',
           
             'customer_password.min'=>'Mật khẩu phải ít nhất 8 kí tự',
             
            
        ]

    );
        
        $data['customer_name']=$request->customer_name;
         $data['customer_email']=$request->customer_email;
         $data['customer_password']=md5($request->customer_password);
         $data['customer_phone']=$request->customer_phone;
         $data['trangthai']=0;
        $customer_id= DB::table('tbl_customer')->insertGetId($data);
        Session::put('customer_id',$customer_id);//chua cai id
        Session::put('customer_name',$request->customer_name);//chua cai id
        Session::put('mess','Đăng kí tài khoản thành công');
        return Redirect::to('/trangchu');
    }
    
    public function checkout(){
        $cate_product_tuoi=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','21')->first();
        $cate_product_si=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
       
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','!=','21')
        ->where('category_id','!=','22')->orderBy('category_id','desc')->get();
        $city=City::orderby('matp','ASC')->get();
       
        
        $id=Session::get('customer_id');
       
        $diachi=DB::table('tbl_diachi')
        ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','=','tbl_diachi.city')
        ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','=','tbl_diachi.province')
        ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.xaid','=','tbl_diachi.wards')
        ->where('customer_id',$id)->get();

       
        return view('pages.checkout.checkout')->with('category', $cate_product)->with('city',$city)
        ->with('diachi',$diachi)->with('cate_product_tuoi', $cate_product_tuoi)->with('cate_product_si', $cate_product_si);
     

     
    }
    public function dang_ki(){
        $cate_product_tuoi=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','21')->first();
        $cate_product_si=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
        
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        return view('pages.checkout.dangki')->with('category', $cate_product)->with('cate_product_tuoi', $cate_product_tuoi)->with('cate_product_si', $cate_product_si);

        
    }
    public function  save_checkout( Request $request){
        $data=array();//tao ra cai mang
        // $data['category_name']=$request->UIDresult;
         $data['shopping_name']=$request->shopping_name;
         $data['shopping_email']=$request->shopping_email;
         $data['shopping_diachi']=$request->shopping_diachi;
         $data['shopping_phone']=$request->shopping_phone;
         $data['shopping_ghichu']=$request->shopping_ghichu;
         $shopping_id = DB::table('tbl_shopping')->insertGetId($data);
        Session::put('shopping_id',$shopping_id );//chua cai id
        return Redirect::to('/payment');
    }
   public function logout_checkout(){
    Session::flush();
    return Redirect('trangchu');
   }
   public function login_customer(Request $request){
    $data=array();//tao ra cai mang
    $data=$request->validate(
        [
          
           
          
            'customer_email'=>'required|max:5000',
             
            
            'customer_password'=>'required',
            
        ],
        [
             
             
             'customer_email.required'=>'Tên email phải có',
            
             'customer_password.required'=>'Mật khẩu phải có',
             
            
        ]

    );
    $data['customer_email']=$request->customer_email;
    $data['customer_password']=$request->customer_password;
           
          
    
    $result=DB::table('tbl_customer')->where('customer_email',$data['customer_email'])->where('trangthai',0)->where('customer_password',md5($data['customer_password']))->first();
    if($result){
        
        Session::put('customer_id',$result->customer_id);//chua cai id
        Session::put('customer_name',$result->customer_name);//chua cai id
    
        return Redirect::to('trangchu');
        
    }
    else {
        // return Redirect::to('/log-checkout');
        return redirect()->back();
        Session::put('mess','Tên đăng nhập hoặc mật khẩu không đúng');
    }
   
   
  


   }
   public function payment(){
    $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
    return view('pages.checkout.payment')->with('category', $cate_product);

}
public function order_pay(Request $request){
    $content=Cart::content();
    
    //inser pay ment
       $data=array();//tao ra cai mang
         $data['payment_method']=$request->payment_option;
         $data['payment_status']='dang cho su li';
         $payment_id = DB::table('tbl_payment')->insertGetId($data);
         //inset or
         $order=array();//tao ra cai mang
        
        $order['customer_id']=Session::get('customer_id');
        $order['shopping_id']=Session::get('shopping_id');
        $order['payment_id']= $payment_id;
        $order['order_total']=Cart::total();
        $order['order_status']='don hang cho su li';
         $order_id = DB::table('tbl_order')->insertGetId( $order);
//insert order detail
foreach($content as $v_content){
        $orderd['order_id']= $order_id;
        $orderd['product_id']=$v_content->id;
        $orderd['product_name']=$v_content->name;
        $orderd['product_price']=$v_content->price;
        $orderd['product_sales_quantity']=$v_content->qty;
        DB::table('tbl_details')->insert($orderd);


} if( $data['payment_method']==0){
    Cart::destroy();
    $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
    return view('pages.checkout.tienmat')->with('category', $cate_product);

}else{
    Cart::destroy();
    $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
    return view('pages.checkout.tienmat')->with('category', $cate_product);
}      

}
public function manage_oder(){
    $all_order=DB::table('tbl_order')
    ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
    ->select('tbl_order.*','tbl_customer.customer_name')
    ->orderBy('tbl_order.order_id','desc')->get();//get la lay het
    
    $manager_order=view('admin.manage_oder')->with('all_order',$all_order);
    return view('admin_layout')->with('admin.manage_oder',$manager_order);

    
}
public function view_order($order_id){
    $manager_order_by_id =DB::table('tbl_order')
    ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
    ->join('tbl_shopping','tbl_order.shopping_id','=','tbl_shopping.shopping_id')
    ->join('tbl_details','tbl_order.order_id','=','tbl_details.order_id')
    ->select('tbl_order.*','tbl_customer.*','tbl_shopping.*','tbl_details.*')->first();
    $manager_order_by_id=view('admin.view_order')->with('all_order_id',$manager_order_by_id);
    return view('admin_layout')->with('admin.view_order',$manager_order_by_id);



}
public function select_delivery_home(Request $request){
    $data = $request->all();
    if($data['action']){
        $output = '';
        if($data['action']=="city"){
            $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                $output.='<option>---Chọn quận huyện---</option>';
            foreach($select_province as $key => $province){
                $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
            }

        }else{

            $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
            $output.='<option>---Chọn xã phường---</option>';
            foreach($select_wards as $key => $ward){
                $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
            }
        }
        echo $output;
    }
    
}
public function calculate_fee(Request $request){
    $data = $request->all();
    if($data['matp']){
        $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
        if($feeship){
            $count_feeship = $feeship->count();
            if($count_feeship>0){
                 foreach($feeship as $key => $fee){
                    Session::put('fee',$fee->fee_feeship);
                    Session::save();
                }
            }else{ 
                Session::put('fee',25000);
                Session::save();
            }
        }
       
    }
}
public function calculate_feee(Request $request){
       
    
    $data = $request->all();
    
    
   if($data['diachi_id']){
        $persion[]=array(
            'shipping_name'=>$data['shipping_name'],
            'shipping_phone'=>$data['shipping_phone'],
            'shipping_address'=>$data['shipping_address'],
            'shipping_email'=>$data['shipping_email'],
            'city'=>$data['city'],
            'province'=>$data['province'],
            'wards'=>$data['wards'],
            'name_city'=>$data['name_city'],
            'name_quanhuyen'=>$data['name_quanhuyen'],
            'name_xaphuong'=>$data['name_xaphuong'],

          

        );
        Session::put('fee',$data['feeship']);
        Session::put('persion',$persion);
        

    }else{
         Session::put('fee',123);
        


    }
    Session::save();
               
           
        
       
    
}
public function del_fee(){
    Session::forget('fee');
    Session::forget('persion');
    return redirect()->back();

}
public function delete_order($order_code){
    DB::table('tbl_order')->where('order_code',$order_code)->delete();
    return redirect()->back();


}
public function update_don($order_code ,Request $request)
{
    $data=$request->all();
    $datas=array();
    $datas['order_status']=$data['status'];
    DB::table('tbl_order')->where('order_code',$order_code)->update($datas);
    
    
    
    $order=DB::table('tbl_order')->where('order_code',$order_code)->first();
    $order_dater=$order->order_date;

    
   
    
    if($order->order_status==5){
        $total_order=0;//tong don hang
        $sales=0;//danh thu
        $profit=0;
        $quantity=0;//so luong
        $static=Statistic::where('order_date',$order_dater)->get();
        if($static){
            $static_count= $static->count();
        }else{
            $static_count=0;
        }
    
        $gio =DB::table('tbl_order')
        ->join('tbl_details','tbl_order.order_code','=','tbl_details.order_code')->where('tbl_order.order_code',$order_code)->orderBy( 'tbl_details.order_details_id','ASC')->get();
        
            $now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
           
             foreach($gio as $key2 => $qty){
          
                    $quantity+=$qty->product_sales_quantity;
                    // $total_order+=1;
                    $sales+=$qty->product_price*$qty->product_sales_quantity;//so luong nhan gia =>doanh so
                    $profit+=(($qty->product_price*$qty->product_sales_quantity)-($qty->product_cost*$qty->product_sales_quantity));//doanh so

        }
        if($static_count>0){
            $static_update=Statistic::where('order_date',$order_dater)->first();
            $static_update->sales= $static_update->sales+$sales;
            $static_update->profit= $static_update->profit+$profit;
            $static_update->quantity=  $static_update->quantity+$quantity;
            $static_update->total_order=  $static_update->total_order +  1;
            // $total_order
            $data=array();
            $data['sales']= $static_update->sales;
            $data['profit']= $static_update->profit;
            $data['quantity']=  $static_update->quantity;
            $data['total_order']=   $static_update->total_order;
            DB::table('tbl_statistical')->where('order_date',$order_dater)->update($data);

        }else{
            $static_new=new Statistic();
            $static_new->order_date=$order_dater;
            $static_new->sales= $sales;
            $static_new->profit= $profit;
            $static_new->quantity=  $quantity;
            $static_new->total_order=1;
            $static_new->save();

        }
    }

    Session::put('mes','Cập nhật đơn hàng thành công');
    return Redirect::to('manager-order');


}
public function confirm_order(Request $request){
    $data = $request->all();
   
   
          
    $shipping = new Shipping();
    $shipping->shipping_name = $data['shipping_name'];
    $shipping->shipping_phone = $data['shipping_phone'];
    $shipping->shipping_email = $data['shipping_email'];
    $shipping->shipping_address = $data['shipping_address'];
    $shipping->shipping_city = $data['shipping_city'];
    $shipping->shipping_huyen = $data['shipping_huyen'];
    $shipping->shipping_xa = $data['shipping_xa'];

    $shipping->shipping_notes = $data['shipping_notes'];
    $shipping->shipping_method = $data['shipping_method'];
    $shipping->save();
    
    $cate=DB::table('tbl_shipping')->orderBy('shipping_id','desc')->first();
    $shipping_id=$cate->shipping_id;

    $checkout_code = substr(md5(microtime()),rand(0,26),5);
   
    if($data['order_coupon']){

        $cates=DB::table('tbl_coupon')->orderBy('coupon_id','DESC')->get();
        foreach($cates as $key =>$valu){
            if($valu->coupon_code==$data['order_coupon']){
                $datas=array();
                $datas['coupon_time']=$valu->coupon_time-1;
                DB::table('tbl_coupon')->where('coupon_id',$valu->coupon_id)->update($datas);
                
            }

        }
       
       
    }

   

    $order = new Order;
    $order->customer_id = Session::get('customer_id');
    $order->shipping_id =   $shipping_id;
    $order->order_status = 1;
    $order->order_code = $checkout_code;

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $order->created_at = now();
   
    $today=Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
    $order->order_date=$today;
    $order->save();
    if(Session::get('cart')==true){
       foreach(Session::get('cart') as $key => $cart){
           $order_details = new OrderDetails;
           $order_details->order_code = $checkout_code;
           $order_details->product_id = $cart['product_id'];
           $order_details->product_name = $cart['product_name'];
           $order_details->product_price = $cart['product_price'];
           $order_details->product_cost=$cart['product_cost'];
           $order_details->product_sales_quantity = $cart['product_qty'];
           $order_details->product_coupon = $data['order_coupon'];
           $order_details->product_feeship =$data['order_fee'];
           $order_details->save();
       }
    }



    Session::forget('coupon');
    Session::forget('fee');
    Session::forget('cart');
    Session::forget('persion');
    
    return redirect()->back();
}
public function vnpay_payment(Request $request){
    $data = $request->all();
   
    // $shipping = new Shipping();
    // $shipping->shipping_name = $data['shipping_nam'];
    // $shipping->shipping_phone = $data['shipping_phon'];
    // $shipping->shipping_email = $data['shipping_emai'];
    // $shipping->shipping_address = $data['shipping_addres'];
    // $shipping->shipping_city = $data['shipping_city'];
    // $shipping->shipping_huyen = $data['shipping_huyen'];
    // $shipping->shipping_xa = $data['shipping_xa'];

    // $shipping->shipping_notes = $data['shipping_notes'];
    // $shipping->shipping_method = 0;
    // $shipping->save();
    
    // $cate=DB::table('tbl_shipping')->orderBy('shipping_id','desc')->first();
    // $shipping_id=$cate->shipping_id;

    $checkout_code = substr(md5(microtime()),rand(0,26),5);
   
    // if($data['order_coupon']){

    //     $cates=DB::table('tbl_coupon')->orderBy('coupon_id','DESC')->get();
    //     foreach($cates as $key =>$valu){
    //         if($valu->coupon_code==$data['order_coupon']){
    //             $datas=array();
    //             $datas['coupon_time']=$valu->coupon_time-1;
    //             DB::table('tbl_coupon')->where('coupon_id',$valu->coupon_id)->update($datas);
                
    //         }

    //     }
       
       
    // }

   

    // $order = new Order;
    // $order->customer_id = Session::get('customer_id');
    // $order->shipping_id =   $shipping_id;
    // $order->order_status = 1;
    // $order->order_code = $checkout_code;

    // date_default_timezone_set('Asia/Ho_Chi_Minh');
    // $order->created_at = now();
   
    // $today=Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
    // $order->order_date=$today;
    // $order->save();
    // if(Session::get('cart')==true){
    //    foreach(Session::get('cart') as $key => $cart){
    //        $order_details = new OrderDetails;
    //        $order_details->order_code = $checkout_code;
    //        $order_details->product_id = $cart['product_id'];
    //        $order_details->product_name = $cart['product_name'];
    //        $order_details->product_price = $cart['product_price'];
    //        $order_details->product_cost=$cart['product_cost'];
    //        $order_details->product_sales_quantity = $cart['product_qty'];
    //        $order_details->product_coupon = $data['order_coupon'];
    //        $order_details->product_feeship =$data['order_fee'];
    //        $order_details->save();
    //    }
    // }
   
 
          
   


$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";//trang toi
$vnp_Returnurl = "http://127.0.0.1:8000/thank";//trang cha ve
$vnp_TmnCode = "BCS3DMG9";//Mã website tại VNPAY 
$vnp_HashSecret = "OVWHVBYRCQFNITZBQKFJOJGNERJWTOKF"; //Chuỗi bí mật

$vnp_TxnRef = $checkout_code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
$vnp_OrderInfo = 'Thanh toán đơn hàng';
$vnp_OrderType ='billpayment';
$vnp_Amount = $data['total_after']*100;
$vnp_Locale = 'vn';
$vnp_BankCode = 'NCB';
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount,
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef
   
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}
if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
    $inputData['vnp_Bill_State'] = $vnp_Bill_State;
}





//var_dump($inputData);
ksort($inputData);
$query = "";
$i = 0;
$hashdata = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
}
$returnData = array('code' => '00'
    , 'message' => 'success'
    , 'data' => $vnp_Url);
    if (isset($_POST['redirect'])) {
      
         $shipping = new Shipping();
    $shipping->shipping_name = $data['shipping_nam'];
    $shipping->shipping_phone = $data['shipping_phon'];
    $shipping->shipping_email = $data['shipping_emai'];
    $shipping->shipping_address = $data['shipping_addres'];
    $shipping->shipping_city = $data['shipping_city'];
    $shipping->shipping_huyen = $data['shipping_huyen'];
    $shipping->shipping_xa = $data['shipping_xa'];

    $shipping->shipping_notes = $data['shipping_notes'];
    $shipping->shipping_method = 0;
    $shipping->save();
    
    $cate=DB::table('tbl_shipping')->orderBy('shipping_id','desc')->first();
    $shipping_id=$cate->shipping_id;

   
   
    if($data['order_coupon']){

        $cates=DB::table('tbl_coupon')->orderBy('coupon_id','DESC')->get();
        foreach($cates as $key =>$valu){
            if($valu->coupon_code==$data['order_coupon']){
                $datas=array();
                $datas['coupon_time']=$valu->coupon_time-1;
                DB::table('tbl_coupon')->where('coupon_id',$valu->coupon_id)->update($datas);
                
            }

        }
       
       
    }

   

    $order = new Order;
    $order->customer_id = Session::get('customer_id');
    $order->shipping_id =   $shipping_id;
    $order->order_status = 1;
    $order->order_code = $checkout_code;

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $order->created_at = now();
   
    $today=Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
    $order->order_date=$today;
    $order->save();
    if(Session::get('cart')==true){
       foreach(Session::get('cart') as $key => $cart){
           $order_details = new OrderDetails;
           $order_details->order_code = $checkout_code;
           $order_details->product_id = $cart['product_id'];
           $order_details->product_name = $cart['product_name'];
           $order_details->product_price = $cart['product_price'];
           $order_details->product_cost=$cart['product_cost'];
           $order_details->product_sales_quantity = $cart['product_qty'];
           $order_details->product_coupon = $data['order_coupon'];
           $order_details->product_feeship =$data['order_fee'];
           $order_details->save();
       }
    }
   


    header('Location: ' . $vnp_Url);
    die();

       
    } else {

        

        echo json_encode($returnData);
    }



}
public function thank(){
    Session::forget('coupon');
    Session::forget('fee');
    Session::forget('cart');
    Session::forget('persion');
    $cate_product_tuoi=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','21')->first();
        $cate_product_si=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
       
      
       


        return view('pages.checkout.thank')->with('category', $cate_product)->with('cate_product_tuoi', $cate_product_tuoi)->with('cate_product_si', $cate_product_si);
    



}

      


}
