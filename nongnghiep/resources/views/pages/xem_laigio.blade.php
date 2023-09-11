@extends('layout')
<!--lay theo ten day la phan morong cua welcom-->

@section('content')

<section class="dev">
  
    <div class="container modal-body">
    <h3>ĐƠN HÀNG</h3>
        <table class="table table-condensed table-hover" id="cate">
            <thead>
                <tr class="cart_menu table-success">
                    <td class="image">
                        <h2>TT</h2>
                    </td>
                    <td class="image">
                        <h2>Tên người gửi</h2>
                    </td>
                    <td class="description">
                        <h2>Số điện thoại</h2>
                    </td>
                    <td class="price">
                        <h2> Nơi gửi</h2>
                    </td>
                    <td class="price">
                        <h2>Trạng thái</h2>
                    </td>
                    <td class="price">
                        <h2>Trạng thái thanh toán</h2>
                    </td>
                    <td class="price">
                        <h2>Ngày</h2>
                    </td>

                    <td class="quantity">
                        <div class="container"><h2>Xem đơn</h2> </td>
                        <td class="quantity">
                        <div class="container"> </td>
                </tr>
            </thead>



            <tbody>
                @php
                $i=0;
                @endphp
                @foreach($cate_giohang as $key =>$v_content)
                @php
                $i++;
                @endphp
                <tr >
                    <td class="cart_description">
                        <h3>{{$i}}</h3>
                    </td>
                    <td class="cart_description">
                        <h3>{{$v_content->shipping_name}}</h3>
                    </td>
                    <td class="cart_price">
                        <h3>{{$v_content->shipping_phone}}</h3>
                    </td>
                    <td class="cart_price">
                        <h3>{{$v_content->shipping_address}},{{$v_content->shipping_city}},{{$v_content->shipping_huyen}},{{$v_content->shipping_xa}}.</h3>
                    </td>

                    <td class="cart_total">
                        @if($v_content->order_status==1)
                        <h3>Chờ xác nhận </3>

                            @elseif($v_content->order_status==2)
                            <h3>Đã xác nhận</h3>
                            @elseif($v_content->order_status==3)
                            <h3>Đang vận chuyển</h3>
                            @elseif($v_content->order_status==4)
                            <h3>Đang giao hàng</h3>
                            @elseif($v_content->order_status==5)
                            <h3>Giao hàng thành công</h3>
                            @elseif($v_content->order_status==6)
                            <h3>Đơn hàng đã hủy</h3>

                            @endif




                    </td>
                    <td class="cart_total">
                       @if($v_content->shipping_method==1)
                        <p><h3>Thanh Toán khi nhận hàng</h3></p>
                        @else
                        <p><h3>Đã thanh toán Online</h3></p>
                        @endif

                    </td>
                    <td class="cart_total">
                        <p><h3>{{$v_content->created_at}}</h3></p>

                    </td>
                   
                    




                   
                    <td><a href="{{URL::to('/xem-gio-hang/'.$v_content->order_code)}}"><i class="fa fa-eye"
                                aria-hidden="true"></i></a></td>

                    <td>
                    @if($v_content->order_status==1)    
                    <a class="btn btn-primary btn-lg" href="{{URL::to('/xoa-gio-hang/'.$v_content->order_code)}}">Hủy đơn</a>
                    @elseif($v_content->order_status==2)
                    <a class="btn btn-primary btn-lg" href="{{URL::to('/xoa-gio-hang/'.$v_content->order_code)}}">Hủy đơn</a>
                    @endif
                </td>
                    </tr>
                   

                    @endforeach
         </tbody>
       </table>

      




    </div>
</section>






























@endsection