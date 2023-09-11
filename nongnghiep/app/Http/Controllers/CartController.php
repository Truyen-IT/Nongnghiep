<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
session_start();
use App\Models\Coupon;

class CartController extends Controller
{
    public function check_coupon(Request $request){
        $data = $request->all();
        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session==true){
                    $is_avaiable = 0;
                    if($is_avaiable==0){
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                            'coupon_time'=>$coupon->coupon_time,

                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                            'coupon_time'=>$coupon->coupon_time,

                        );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back()->with('message','Thêm mã giảm giá thành công');
            }

        }else{
            return redirect()->back()->with('error','Mã giảm giá không đúng');
        }


    }
    public function gio_hang(){
        $cate_product_tuoi=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','21')->first();
        $cate_product_si=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
       
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','!=','21')
        ->where('category_id','!=','22')->orderBy('category_id','desc')->get();
       
        return view('pages.cart.cart_ajax')->with('category', $cate_product)->with('cate_product_tuoi', $cate_product_tuoi)->with('cate_product_si', $cate_product_si);


    }
    public function add_cart_ajax(Request $request){
       
        $data =$request->all();
        $session_id=substr(md5(microtime()),rand(0,26),5);
        $cart= Session::get('cart');
        if($cart == true){
            $is_valable =0;
            foreach($cart as $key=>$val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_valable++;

                }
            }
            if( $is_valable ==0){
                $cart[]=array(
                    'session_id'=>$session_id,
                    'product_name'=>$data['cart_product_name'],
                    'product_id'=>$data['cart_product_id'],
                    'product_cost'=>$data['cart_price_cost'],

                    'product_image'=>$data['cart_product_image'],
                    'product_qty'=>$data['cart_product_qty'],
                    'product_price'=>$data['cart_product_price'],
    
                );
                Session::put('cart',$cart);

            }


        }else{
            $cart[]=array(
                'session_id'=>$session_id,
                'product_name'=>$data['cart_product_name'],
                'product_id'=>$data['cart_product_id'],
                'product_cost'=>$data['cart_price_cost'],
                'product_image'=>$data['cart_product_image'],
                'product_qty'=>$data['cart_product_qty'],
                'product_price'=>$data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }
       
        Session::save();
      

    }    

    public function save_cart(Request $request){
        $productId=$request->productid_hidden;
       
        $productId=$request->productid_hidden;
        $quantity=$request->qty;
      
       //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
       Cart::destroy();
       $product_infor=DB::table('tbl_product')->where('product_id', $productId)->first();
       $data['id']=$product_infor->product_id;
       $data['qty']= $quantity;
       $data['name']=$product_infor->product_name;
       $data['price']=$product_infor->product_price;
       $data['weight']=$product_infor->product_price;
       $data['options']['image']=$product_infor->product_image;
       Cart::add($data);
       Cart::setGlobalTax(10);//10%
       return Redirect::to('/show-cart');


       
    }

    public function show_cart(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        return view('pages.cart.show_cart')->with('category', $cate_product);

    }
    public function delete_to_cart($rowId){
      
         Cart::update( $rowId, 0);
        return Redirect::to('/show-cart');

    }
    public function update_cart_qty(Request $request){
        $rowId=$request->rowId_cart;
        $qty=$request->quantity;
        Cart::update( $rowId,  $qty);
        return Redirect::to('/show-cart');

    }
    public function update_cart(Request $request){
        $data =$request->all();
        $cart= Session::get('cart');
        if($cart==true){
            foreach($data['cart_qty'] as $key=>$qty){
                foreach($cart as $session => $val){
                    if($val['session_id']==$key){
                        $cart[$session]['product_qty']= $qty; 

                    }
              
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('mes','Cập nhật số lượng thành công');


        }
       

    }
    public function delete_sp($session_id){
       
        // echo '<pre>';
        //            print_r(Session::get('cart'));
        //            echo '</pre>';
                   $cart= Session::get('cart');
        if($cart==true){
            foreach($cart as $key=>$val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }

        }
       Session::put('cart',$cart);
       return redirect()->back()->with('mes','Xóa sản phẩm thành công');

 }
 public function xoa_tatca(){
    $cart= Session::get('cart');
    if($cart==true){
        Session::forget('cart');
        Session::forget('coupon');
        return redirect()->back()->with('mes','Xóa tất cả sản phẩm thành công');

    }


 }

}

