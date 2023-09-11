<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiemdanhController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index']);//cai class roi toi cai ham

Route::get('/trangchu',[HomeController::class,'index']);
Route::get('/tatca',[HomeController::class,'tatca']);
Route::post('/tim-kiem',[HomeController::class,'tim_kiem']);
Route::get('/xem-gio-hang/{order_code}',[HomeController::class,'xem_gio_hang']);
Route::post('/xem-gio-hang',[HomeController::class,'xem_lai_gio_hang']);
Route::get('/xem-laigio/{customer_id}',[HomeController::class,'xem_laigio']);
Route::get('/gioi-thieu',[HomeController::class,'gioi_thieu']);
Route::get('/lien-he',[HomeController::class,'lien_he']);
Route::get('/kien-thuc',[HomeController::class,'kien_thuc']);
Route::get('/xoa-gio-hang/{order_code}',[HomeController::class,'xoa_gio_hang']);



//danh muc san pham trang chu
Route::get('/loc',[CategoryProduct::class,'loc']);
Route::get('/danh-muc-san-pham-all',[CategoryProduct::class,'show_category_home_all']);
Route::get('/danh-muc-san-pham/{category_id}',[CategoryProduct::class,'show_category_home']);
Route::get('/danh-muc-san-pham-si/{category_id}',[CategoryProduct::class,'show_category_home_si']);
Route::get('/chi-tiet-san-pham/{product_id}',[CategoryProduct::class,'show_chi_tiet']);
Route::get('/chi-tiet-san-pham-si/{product_id}',[CategoryProduct::class,'show_chi_tiet_si']);

Route::post('/insert-rating',[CategoryProduct::class,'insert_rating']);

//backend admin
Route::get('/all-customer',[AdminController::class,'all_customer']); 
Route::get('/admin',[AdminController::class,'index']); 
Route::get('/dashboard',[AdminController::class,'dashboard']); 
Route::post('/admin-dashboard',[AdminController::class,'dashboard_dangnhap']); //do gui bang phuong thuc post
Route::get('/logout',[AdminController::class,'logout']);

Route::post('/filter-by-date',[AdminController::class,'filter_by_date']);
Route::post('/dashboard-filter',[AdminController::class,'dashboard_filter']);
Route::post('/day-order',[AdminController::class,'day_order']);

//category product
Route::get('/add-category-product',[CategoryProduct::class,'add_category_product']); 
Route::get('/all-category-product',[CategoryProduct::class,'all_category_product']); 
Route::post('/save_category-product',[CategoryProduct::class,'save_category_product']); 
Route::get('/hienthi/{category_id}',[CategoryProduct::class,'hienthi']); //truyen vao doi so vaf ten truyen la gi cung duoc
Route::get('/an/{category_id}',[CategoryProduct::class,'an']); 
//Route::post('/save_category-product',[CategoryProduct::class,'save_category_product']); 
Route::get('/edit_category-product/{category_id}',[CategoryProduct::class,'edit']);
Route::get('/delete_category-product/{category_id}',[CategoryProduct::class,'delete']);  
Route::post('/update_category-product/{category_id}',[CategoryProduct::class,'update']);

//cap
Route::get('/add-capnhanvien',[DiemdanhController::class,'add_capnhanvien']); 
Route::post('/save_capnhanvien',[DiemdanhController::class,'save_capnhanvien']); 
Route::get('/all-capnhanvien',[DiemdanhController::class,'all_capnhanvien']); 
Route::get('/edit_cap/{cap_id}',[DiemdanhController::class,'edit_cap']);
Route::post('/update-cap/{cap_id}',[DiemdanhController::class,'update_cap']);
Route::get('/delete_chuc/{cap_id}',[DiemdanhController::class,'delete_chuc']);

//diem danh
Route::get('/add-nhanvien',[DiemdanhController::class,'add_nhanvien']); 
Route::get('/all-diemdanh',[DiemdanhController::class,'all_diemdanh']); 
Route::post('/save_nhanvien',[DiemdanhController::class,'save_nhanvien']); 
Route::get('/capnhatnhanvien/{id_nhanvien}',[DiemdanhController::class,'capnhat_nhanvien']);///
Route::post('/update_nhanvien/{category_id}',[DiemdanhController::class,'update_nhanvien']); 
Route::get('/all-nhanvien',[DiemdanhController::class,'all_nhanvien']); 
Route::get('/delete-nhanvien/{cap_id}',[DiemdanhController::class,'delete_nhanvien']);
Route::get('/xem-nhanvien/{cap_id}',[DiemdanhController::class,'xem_nhanvien']);
Route::post('/tatca-diemdanh',[DiemdanhController::class,'tatca_diemdanh']);
Route::post('/ngay-one',[DiemdanhController::class,'ngay_one']);
Route::post('/all-one',[DiemdanhController::class,'all_one']);
Route::get('/ngaylam-nv/{nhanvien_id}',[DiemdanhController::class,'ngaylam_nv']);
Route::post('/in',[DiemdanhController::class,'in']);
Route::get('/export_1',[DiemdanhController::class,'export_1']);
Route::get('/export_2/{ngay}',[DiemdanhController::class,'export_2']);

Route::get('/edit-nv1/{nhanvien_id}',[DiemdanhController::class,'edit_nv1']);
Route::get('/edit-nv2/{nhanvien_id}',[DiemdanhController::class,'edit_nv2']);
Route::get('/edit-kh1/{customer_id}',[DiemdanhController::class,'edit_kh1']);
Route::get('/edit-kh2/{customer_id}',[DiemdanhController::class,'edit_kh2']);
//product
Route::get('/add-image-product',[ProductController::class,'add_image_product']); 
Route::get('/all-image-product',[ProductController::class,'all_image_product']);
Route::get('/delete-lagery-product/{lagery_id}',[ProductController::class,'delete_lagery_product']); 
Route::get('/edit-image-product/{lagery_id}',[ProductController::class,'edit_image_product']); 
Route::post('/update-image-product/{lagery_id}',[ProductController::class,'update_image_product']);
Route::post('/save-image-product',[ProductController::class,'save_image_product']); 
Route::get('/add-product',[ProductController::class,'add_product']); 
Route::get('/all-product',[ProductController::class,'all_product']); 
Route::post('/save-product',[ProductController::class,'save_product']); 
Route::get('/hienthi1/{product_id}',[ProductController::class,'hienthi']); //truyen vao doi so vaf ten truyen la gi cung duoc
Route::get('/an1/{product_id}',[ProductController::class,'an']); 
//Route::post('/save_category-product',[CategoryProduct::class,'save_category_product']); 
Route::get('/edit-product1/{product_id}',[ProductController::class,'edit']);
Route::get('/delete-product1/{product_id}',[ProductController::class,'delete']);  
Route::post('/update-product/{product_id}',[ProductController::class,'update']);

//cart


Route::post('/save-cart',[CartController::class,'save_cart']);
Route::get('/show-cart',[CartController::class,'show_cart']);
Route::get('/delete-cart/{rowId}',[CartController::class,'delete_to_cart']);
Route::post('/update-cart-qty',[CartController::class,'update_cart_qty']);

//check coupon
Route::post('/check-coupon',[CartController::class,'check_coupon']);
Route::get('/insert-coupon',[CouponController::class,'insert_coupon']);
Route::get('/all-coupon',[CouponController::class,'all_coupon']);
Route::post('/save_coupon',[CouponController::class,'save_coupon']);
Route::get('/delete-coupon/{coupon_id}',[CouponController::class,'delete_coupon']);
Route::get('/unset-coupon',[CouponController::class,'unset_coupon']);


//

Route::post('/add-cart-ajax',[CartController::class,'add_cart_ajax']);
Route::get('/gio-hang',[CartController::class,'gio_hang']);
Route::post('/update-cart',[CartController::class,'update_cart']);
Route::get('/delete-sp/{session_id}',[CartController::class,'delete_sp']);
Route::get('/xoa-tatca',[CartController::class,'xoa_tatca']);
//check out

Route::post('/vnpay-payment',[CheckoutController::class,'vnpay_payment']);
Route::post('/confirm-order',[CheckoutController::class,'confirm_order']);
Route::get('/del-fee',[CheckoutController::class,'del_fee']);
Route::get('/log-checkout',[CheckoutController::class,'login_checkout']);
Route::get('/logout-checkout',[CheckoutController::class,'logout_checkout']);
Route::get('/dang-ki',[CheckoutController::class,'dang_ki']);

Route::post('/add-customer',[CheckoutController::class,'add_customer']);
Route::post('/order-pay',[CheckoutController::class,'order_pay']);
Route::get('/checkout',[CheckoutController::class,'checkout']);
Route::get('/payment',[CheckoutController::class,'payment']);
Route::post('/save-checkout',[CheckoutController::class,'save_checkout']);
Route::post('/login-customer',[CheckoutController::class,'login_customer']);
Route::post('/insert-delivery-home',[CheckoutController::class,'insert_delivery_home']);
Route::post('/calculate-fee',[CheckoutController::class,'calculate_fee']);
Route::post('/calculate-feee',[CheckoutController::class,'calculate_feee']);
Route::get('/delete-order/{order_code}',[CheckoutController::class,'delete_order']);
Route::get('/update-don/{order_code}',[CheckoutController::class,'update_don']);
Route::get('/thank',[CheckoutController::class,'thank']);



//don hang
Route::get('/manager-order',[OrderController::class,'manager_order']);
Route::get('/print-order/{session_id}',[OrderController::class,'print_order']);

// Route::get('/manage-oder',[CheckoutController::class,'manage_oder']);
Route::get('/views-order/{order_code}',[OrderController::class,'views_order']);
//delevery
Route::get('/delevery',[DeliveryController::class,'delevery']);
Route::post('/select-delivery',[DeliveryController::class,'select_delivery']);
Route::post('/insert-delivery',[DeliveryController::class,'insert_delivery']);
Route::post('/select-feeship',[DeliveryController::class,'select_feeship']);
Route::post('/save-diachi',[DeliveryController::class,'save_diachi']);
Route::post('/update-delivery',[DeliveryController::class,'update_delivery']);

//comment

Route::post('/save-comment',[CommentController::class,'save_comment']);

Route::get('/load-users',[DiemdanhController::class,'load_users']);