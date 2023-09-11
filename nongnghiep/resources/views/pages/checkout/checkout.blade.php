@extends('layout')


@section('content')











<style>
.col {

    background-color: whitesmoke;
    padding: 16px;
    margin-bottom: 25px;

}

.tring {
    padding-top: 12px;
}

.col1 {}

.co {
    border-right: solid;
    border-right-width: thin;
  
}
.sda{
    color: white;
}

.ca {
    background-color:darkcyan;
    padding: 12px;
}

.c {
    background-color:darkcyan;
    padding: 12px;
}

.note {
    padding-bottom: 12px;
}

div .hat {
    padding-left: 13px;
    font-size: 15px;
}

div .hat1 {
    padding-left: 13px;
    color: white;
    font-size: 15px;
}
.ass{
    width: 80%;
}
.r{
    color: white;
}
.pa{
    margin-top: 2px;
    margin-bottom: 2px;
    color: white;
}
.er{
    margin-top: 6px;
}
.as{
    width: 400px;
    height: 90px;
}

</style>





<?php

$name =Session::get('mes');
if( $name){
echo '<span class="text-alert">'.$name.'</span>';
Session::put('mes',null);

}
?>
</div>
<section class="dev">
    <div class="table-responsive cart_info">

        <div class="container col-sm-11">
            <div class="row">

                <div class="col-sm-6 ca co">
                    <div class="shopper-informations container">
                        <div class="row">

                            <div class="container">
                                <h2>Nông sản langbian</h2>
                                <h4><a class="r" href="{{URL::to('/gio-hang')}}">Giỏ hàng</a>> Thông tin gửi hàng.</h4>

                                <div class="row">
                                    <p class="hat">Bạn đã có tài khoản?</p>
                                    <a href="{{URL::to('//dang-ki')}}" class="hat1">Đăng kí ngay</a>
                                </div>

                               


                                <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                                    data-target="#myModal">+Chọn địa chỉ giao hàng</button>

                                <div class=" pass">
                                    @if(Session::get('persion')==true)


                                    @foreach(Session::get('persion') as $key =>$per)
                                    <div class="col-sm-12 pa">

                                        <h5 class="er">Tên: {{$per['shipping_name']}}</h5>
                                        <h6>Email: {{$per['shipping_email']}}</h6>
                                        <h6>Số điện thoại: {{$per['shipping_phone']}}</h6>
                                        <h6>Địa chỉ:
                                            {{$per['shipping_address']}}, {{$per['name_xaphuong']}}. {{$per['name_quanhuyen']}}, {{$per['name_city']}}
                                            .</h6>

                                    </div>





                                    @endforeach
                                    @endif
                                </div>

                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                               
                                              
                                            </div>
                                            <div class="modal-body cas">
                                                <div class="col-sm-12">


                                               







                                                    <div class="container">
                                                        <h2>Chọn đia chỉ gửi hàng</h2>
                                                        <!-- Trigger the modal with a button -->
                                                        <button type="button" class="btn btn-info btn-lg"
                                                            data-toggle="modal" data-target="#myModa">+Thêm địa chỉ gửi
                                                            hàng</button>
                                                        <div class="row">

                                                            @foreach($diachi as $key =>$dia)

                                                            <div class="col-sm-12">
                                                                <form>
                                                                    @csrf
                                                                    <div class="row  pass">

                                                                        <div class="passs">
                                                                            <div class="col-sm-12 as ">
                                                                                <h4>{{$dia->shipping_name}}  </h4>
                                                                                <h5>{{$dia->shipping_email}} </h5>
                                                                                <h5>{{$dia->shipping_phone}}</h5>
                                                                                <h5>{{$dia->shipping_address}},{{$dia->name_xaphuong}},{{$dia->name_quanhuyen}},{{$dia->name_city}}
                                                                                </h5>


                                                                            </div>

                                                                            <div class="col-sm-4">

                                                                                <input type="hidden"
                                                                                    value="{{$dia->diachi_id}}"
                                                                                    class="diachi_id_{{$dia->diachi_id}}">
                                                                                <input type="hidden"
                                                                                    value="{{$dia->shipping_name}}"
                                                                                    class="shipping_name_{{$dia->diachi_id}}">
                                                                                <input type="hidden"
                                                                                    value="{{$dia->shipping_email}}"
                                                                                    class="shipping_email_{{$dia->diachi_id}}">
                                                                                <input type="hidden"
                                                                                    value="{{$dia->shipping_phone}}"
                                                                                    class="shipping_phone_{{$dia->diachi_id}}">
                                                                                <input type="hidden"
                                                                                    value="{{$dia->shipping_address}}"
                                                                                    class="shipping_address_{{$dia->diachi_id}}">
                                                                                <input type="hidden"
                                                                                    value="{{$dia->city}}"
                                                                                    class="city_{{$dia->diachi_id}}">
                                                                                <input type="hidden"
                                                                                    value="{{$dia->province}}"
                                                                                    class="province_{{$dia->diachi_id}}">
                                                                                <input type="hidden"
                                                                                    value=" {{$dia->wards}}"
                                                                                    class="wards_{{$dia->diachi_id}}">
                                                                                <input type="hidden"
                                                                                    value="{{$dia->name_city}}"
                                                                                    class="name_city_{{$dia->diachi_id}}">
                                                                                <input type="hidden"
                                                                                    value="{{$dia->name_quanhuyen}}"
                                                                                    class="name_quanhuyen_{{$dia->diachi_id}}">
                                                                                <input type="hidden"
                                                                                    value=" {{$dia->name_xaphuong}}"
                                                                                    class="name_xaphuong_{{$dia->diachi_id}}">
                                                                                <input type="hidden"
                                                                                    value=" {{$dia->feeship}}"
                                                                                    class="feeship_{{$dia->diachi_id}}">

                                                                                <input type="button" value="Chọn"
                                                                                    data-diachi_id="{{$dia->diachi_id}}"
                                                                                    class="btn btn-sucess calculate_deliver">
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </form>
                                                            </div>
                                                            @endforeach
                                                            <div class="col-sm-12"></div>
                                                        </div>

                                                        <div class="modal fade" id="myModa" role="dialog">

                                                            <div class="modal-dialog ">

                                                                <!-- Modal content-->


                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        
                                                                        
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <div class="col-sm-12 ">
                                                                            <div class="bill-to">
                                                                                <h3>Thêm địa chỉ giao hàng</h3>
                                                                                <div class="panel-body">

                                                                                    <form
                                                                                        action="{{URL::to('/save-diachi')}}"
                                                                                        method="post">
                                                                                        @csrf

                                                                                        <div class="form-group">
                                                                                            <label for="email">Họ tên
                                                                                                người
                                                                                                nhận:</label>
                                                                                            <input type="text"
                                                                                                name="shipping_name"
                                                                                                class="form-control shipping_name"
                                                                                                placeholder="Họ và tên người gửi">

                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleInputPassword1">Chọn
                                                                                                thành
                                                                                                phố</label>
                                                                                            <select name="city"
                                                                                                id="city"
                                                                                                class="form-control input-sm m-bot15 choose city">

                                                                                                <option value="">--Chọn
                                                                                                    tỉnh
                                                                                                    thành phố--
                                                                                                </option>
                                                                                                @foreach($city as $key
                                                                                                => $ci)
                                                                                                <option
                                                                                                    value="{{$ci->matp}}">
                                                                                                    {{$ci->name_city}}
                                                                                                </option>
                                                                                                @endforeach

                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleInputPassword1">Chọn
                                                                                                quận
                                                                                                huyện</label>
                                                                                            <select name="province"
                                                                                                id="province"
                                                                                                class="form-control input-sm m-bot15 province choose">
                                                                                                <option value="">--Chọn
                                                                                                    quận
                                                                                                    huyện--
                                                                                                </option>

                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleInputPassword1">Chọn
                                                                                                xã
                                                                                                phường</label>
                                                                                            <select name="wards"
                                                                                                id="wards"
                                                                                                class="form-control input-sm m-bot15 wards">
                                                                                                <option value="">--Chọn
                                                                                                    xã
                                                                                                    phường--
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="email">Địa chỉ
                                                                                                gửi
                                                                                                hàng:</label>
                                                                                            <input type="text"
                                                                                                name="shipping_address"
                                                                                                class="form-control shipping_address"
                                                                                                placeholder="Địa chỉ gửi hàng">

                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="email">Email
                                                                                                người
                                                                                                nhận:</label>
                                                                                            <input type="text"
                                                                                                name="shipping_email"
                                                                                                class="form-control shipping_email"
                                                                                                placeholder="Điền email">

                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="email">Số điện
                                                                                                thoại
                                                                                                người
                                                                                                nhận:</label>
                                                                                            <input type="text"
                                                                                                name="shipping_phone"
                                                                                                class="form-control shipping_phone"
                                                                                                placeholder="Số điện thoại">

                                                                                        </div>

                                                                                        <input type="submit" value="Lưu"
                                                                                            name="send_order"
                                                                                            class="btn btn-primary">
                                                                                    </form>


                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>




                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>


                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>







                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                              
                            </div>



                           















                            @php
                            $total_after=0;
                            @endphp




                            <div class="col-sm-12">
                                <div class="bill-to">
                                
                                    <div class="panel-body">
                                        <form action="{{URL::to('/vnpay-payment')}}" method="post">

                                            @csrf

                                            <img class="ass" src="{{asset('images/home/1200x1200.gif')}}" alt="">
                                            <!-- <div class="form-group">

                                                <textarea name="shipping_notes" class="form-control shipping_notes"
                                                    placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>

                                            </div> -->
                                          




                                            @if(Session::get('fee'))
                                            <input type="hidden" name="order_fee" class="order_fee"
                                                value="{{Session::get('fee')}}">
                                            @else
                                            <input type="hidden" name="order_fee" class="order_fee" value="10000">
                                            @endif

                                            @if(Session::get('coupon'))
                                            @foreach(Session::get('coupon') as $key => $cou)
                                            <input type="hidden" name="order_coupon" class="order_coupon"
                                                value="{{$cou['coupon_code']}}">
                                            @endforeach
                                            @else
                                            <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                                            @endif

                                            @if(Session::get('persion'))


                                            @foreach(Session::get('persion') as $key =>$per)

                                            <input type="hidden" name="shipping_nam" class="shipping_nam"
                                                value="{{$per['shipping_name']}}">
                                            <input type="hidden" name="shipping_addres" class="shipping_addres"
                                                value="{{$per['shipping_address']}}">
                                            <input type="hidden" name="shipping_emai" class="shipping_emai"
                                                value="{{$per['shipping_email']}}">
                                            <input type="hidden" name="shipping_phon" class="shipping_phon"
                                                value="{{$per['shipping_phone']}}">
                                            <input type="hidden" name="shipping_city" class="shipping_city"
                                                value="{{$per['name_city']}}">
                                            <input type="hidden" name="shipping_huyen" class="shipping_huyen"
                                                value="{{$per['name_quanhuyen']}}">
                                            <input type="hidden" name="shipping_xa" class="shipping_xa"
                                                value="{{$per['name_xaphuong']}}">
                                            <input type="hidden" name="payment_select" class="payment_select" value="1">
                                            <!-- <input type="hidden" name="shipping_method" class="shipping_xa"
                                        value="1"> -->
                                            <input type="hidden" name="tongtien" class="payment_select" value="1">




                                            @endforeach





                                            @endif


                                            <!-- 
                                    <input type="button" value="Thanh toán tiền mặt" name="send_order"
                                        class="btn btn-primary btn-lg send_order">
                        <button  name="redirect" class="btn btn-primary btn-lg">Thanh toán vnpay</button>
                                        
                                </form>  -->

                                    </div>

                                </div>
                            </div>






                        </div>
                    </div>
                </div>






                <div class="col-sm-6 c">
                    <h2>GIỎ HÀNG</h2>

                    <form action="{{URL::to('/update-cart')}}" method="post">
                        @csrf


                        <table class="table  table-bordered ">

                            <tbody>
                                @if(Session::get('cart')==true)

                                @php
                                $total= 0;
                                @endphp

                                @foreach(Session::get('cart') as $key =>$cart)


                                @php
                                $subtotal= $cart['product_qty']*$cart['product_price'];
                                $total+=$subtotal;
                                @endphp
                                <tr>
                                    <td class="cart_product col-sm-3">
                                        <a href=""><img src="{{asset('/upload/'.$cart['product_image'])}}"
                                                alt="{{$cart['product_name']}}" height="70" width="80%" /></a>
                                    </td>
                                    <td class="cart_description col-sm-3">
                                        <h3>
                                            <p>{{$cart['product_name']}}</p>
                                        </h3>
                                    </td>

                                    <td class="cart_quantity col-sm-3">
                                        <div class="cart_quantity_button">

                                            <input class=" form-control cart_quantity_input " type="number"
                                                name="cart_qty[{{$cart['session_id']}}]"
                                                value="{{$cart['product_qty']}}" autocomplete="off" size="2">

                                        </div>

                                    </td>
                                    <td class="cart_total">
                                        <h3>
                                            <p class="cart_total_price">

                                                {{number_format($subtotal,0,',',',')}}.VND


                                            </p>
                                        </h3>
                                    </td>
                                    <!-- <td>
                                         <div class="col-sm-7 ">
                                            <div class="row">
                                                <input type="submit" value="Cập nhật số lượng sản phẩm"
                                                    name="update_qty" id="" class=" text-chu btn btn-primary ">


                                            </div>
                                        </div> -->
                                    </td> 

                                </tr>

                                @endforeach

                            </tbody>
                        </table>




                        <div class="note">
                            <div class="note">
                                @if(Session::get('cart'))
                                <form action="{{URL::to('/check-coupon')}}" method="post">
                                    @csrf
                                    <input type="hidden" class="form-control" name="coupon"
                                        placeholder="Nhập mã giảm giá tại đây">
                                    <input type="hidden" class="btn btn-primary check_coupon" name="check_coupon"
                                        value="Lưu">
                                </form>

                                <form action="{{URL::to('/check-coupon')}}" method="post">
                                    @csrf
                                    <input type="text" class="form-control" name="coupon"
                                        placeholder="Nhập mã giảm giá tại đây">
                                    <input type="submit" class="btn btn-primary check_coupon" name="check_coupon"
                                        value="Lưu">

                                </form>
                                @endif

                            </div>






                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>Tạm tính:</h5>
                                </div>
                                <div class="col-sm-4">
                                    <h5>
                                        <p> {{number_format($total,0,',',',')}}.VND</p>

                                    </h5>
                                </div>

                            </div>


                            @if(Session::get('coupon'))



                            @foreach(Session::get('coupon') as $key =>$cou)

                            @if($cou['coupon_condition']==1 && $cou['coupon_time']>=1 )
                            <div class="row note">
                                <div class="col-sm-6">
                                    <h5>Mã giảm</h5>
                                </div>
                                <div class="col-sm-4">
                                    <h5>{{$cou['coupon_number']}}%</h5>
                                </div>

                            </div>




                            @php
                            $total_coupon=($total*$cou['coupon_number'])/100;
                            echo '
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5> Tổng giảm</h5>
                                </div>
                                <div class="col-sm-4">
                                    <h5>'.number_format($total_coupon,0,',','.').'.VND</h5>
                                </div>
                            </div>';


                            @endphp
                            <div class="row note">

                                <div class="col-sm-2 "> <a class="btn btn-primary "
                                        href="{{URL::to('/unset-coupon')}}">Xóa mã
                                        giảm giá</a></div>
                            </div>
                            @php
                            $total_after_coupon=$total-$total_coupon
                            @endphp


                            @elseif($cou['coupon_condition']==2 && $cou['coupon_time']>=1)

                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>
                                        Mã giảm:</h5>
                                </div>
                                <div class="col-sm-4">
                                    <h5>{{number_format($cou['coupon_number'],0,',','.')}}.VND</h5>
                                </div>
                            </div>
                            <p>
                                @php
                                $total_coupon=$total-$cou['coupon_number'];

                                @endphp

                            </p>
                            <div class="row note">

                                <div class="col-sm-2 "> <a class="btn btn-primary "
                                        href="{{URL::to('/unset-coupon')}}">Xóa mã
                                        giảm giá</a></div>
                            </div>
                            <p>
                                @php
                                $total_after_coupon= $total_coupon;
                                @endphp
                                @endif
                                @endforeach






                                @endif
                            <div class="">
                                <div class="row ">
                                    <div class="col-sm-6">
                                        <h5>Phí Vận Chuyển</h5>
                                    </div>

                                    @if(Session::get('fee'))

                                    <div class="col-sm-4">
                                        <h5>{{number_format(Session::get('fee'),0,',',',')}}.VND</h5>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-2"> <a class="btn btn-primary  cart_quantity_delete"
                                            href="{{URL::to('/del-fee')}}">Xóa phi vận chuyển</i></a>
                                    </div>
                                </div>
                                @else
                                <div class="col-sm-4">
                                    <h5>-</h5>
                                </div>

                                @endif

                            </div>


                        </div>





                        @php $total_after_fee=$total;

                        @endphp
                        <div class="row ">
                            <div class="col-sm-6">
                                <h1>Tổng tiền:</h1>
                            </div>

                            <div class="col-sm-4">
                                <h1>
                                    @php
                                    if(Session::get('fee') && !Session::get('coupon')){
                                    $total_after = $total_after_fee + Session::get('fee');
                                    echo number_format($total_after,0,',','.').'.VND';
                                    }elseif(!Session::get('fee') && Session::get('coupon')){
                                    $total_after = $total_after_coupon;
                                    echo number_format($total_after,0,',','.').'.VND';
                                    }elseif(Session::get('fee') && Session::get('coupon')){

                                    $total_after = $total_after_coupon;
                                    $total_after = $total_after + Session::get('fee');
                                    echo number_format($total_after,0,',','.').'.VND';
                                    }elseif(!Session::get('fee') && !Session::get('coupon')){
                                    $total_after = $total;
                                    echo number_format($total_after,0,',','.').'.VND';
                                    }

                                    @endphp

                                </h1>
                            </div>

                        </div>


                        @else
                        <tr>
                            @php
                            
                            echo '<h4 class="text-alert sda">Làm ơn thêm sản phẩm vào giỏ hàng</h4>';
                            @endphp

                        </tr>
                        @endif


                    </form>


                    @if(Session::get('cart')==true)

                    <form action="{{URL::to('/vnpay-payment')}}" method="post">

                        @csrf


                        <div class="form-group tring">

                            <textarea name="shipping_notes" class="form-control shipping_notes"
                                placeholder="Ghi chú đơn hàng của bạn nếu có" rows="5"></textarea>

                        </div>





                        @if(Session::get('fee'))
                        <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
                        @else
                        <input type="hidden" name="order_fee" class="order_fee" value="10000">
                        @endif

                        @if(Session::get('coupon'))
                        @foreach(Session::get('coupon') as $key => $cou)
                        <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
                        @endforeach
                        @else
                        <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                        @endif

                        @if(Session::get('persion'))


                        @foreach(Session::get('persion') as $key =>$per)

                        <input type="hidden" name="shipping_nam" class="shipping_nam" value="{{$per['shipping_name']}}">
                        <input type="hidden" name="shipping_addres" class="shipping_addres"
                            value="{{$per['shipping_address']}}">
                        <input type="hidden" name="shipping_emai" class="shipping_emai"
                            value="{{$per['shipping_email']}}">
                        <input type="hidden" name="shipping_phon" class="shipping_phon"
                            value="{{$per['shipping_phone']}}">
                        <input type="hidden" name="shipping_city" class="shipping_city" value="{{$per['name_city']}}">
                        <input type="hidden" name="shipping_huyen" class="shipping_huyen"
                            value="{{$per['name_quanhuyen']}}">
                        <input type="hidden" name="shipping_xa" class="shipping_xa" value="{{$per['name_xaphuong']}}">
                        <input type="hidden" name="payment_select" class="payment_select" value="1">
                        <!-- <input type="hidden" name="shipping_method" class="shipping_xa"
    value="1"> -->
                        <input type="hidden" name="tongtien" class="payment_select" value="1">




                        @endforeach





                        @endif


                        <input type="hidden" name="total_after" class="total_after" value="{{$total_after}}">

                        <input type="button" value="Thanh toán tiền mặt" name="send_order"
                            class="btn btn-primary btn-lg send_order">
                        <input type="submit" name="redirect" class="btn btn-primary btn-lg" value="Thanh toán vnpay">

                    </form>
                    @endif

                </div>

            </div>

        </div>




</section>















































@endsection