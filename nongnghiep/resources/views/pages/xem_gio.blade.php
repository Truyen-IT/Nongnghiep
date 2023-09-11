@extends('layout')
<!--lay theo ten day la phan morong cua welcom-->

@section('content')
<section class="dev">
<?php
         $customer_id= Session::get('customer_id');
       
        
        ?>
    <div class="container modal-body ">
        <div class="row as">
         <h3><a href="{{URL::to('/xem-laigio/'.$customer_id)}}">ĐƠN HÀNG</a>>></h3><h4>Chi tiết đơn hàng</h4>
</div>
    <?php


$customer_id=Session::get('customer_id');
?>
    

    <table class="table table-condensed">
   
        <thead>
            <tr class="cart_menu table-success">
                <td class="image"><h2>Sản phẩm</h2></td>
                <td class="description"><h2>Giá</h2></td>
                <td class="price"><h2>Số lượng</h2></td>
                <td class="quantity"><h2>Tổng tiền</h2></td>

            </tr>
        </thead>
        <tbody>


            @php
            $tong=0;
            $k=0;
            @endphp
          
            @foreach($xem_gio as $key =>$v_content)
            @php
            $i=$v_content->product_sales_quantity*$v_content->product_price;
           
            $tienship=$v_content->product_feeship;
            
            $tong+=$i

            @endphp
             

            @foreach($magiam as $key =>$ma)
              @if($ma->coupon_code==$v_content->product_coupon)
                @php
                $k=$ma->coupon_id
               @endphp
              
            @endif
            
            @endforeach
            



           



            <tr class="btn-outline-success">

                <td class="cart_description ">
                    <h4><h3 >{{$v_content->product_name}}</h3></h4>
                </td>
                <td class="cart_price">
                <h3>{{number_format($v_content->product_price).'.VND'}}</h3>
                </td>

                <td class="cart_total">
                <h3>{{$v_content->product_sales_quantity}}</h3>

                </td>


                <td class="cart_total">
                <h3>{{number_format($v_content->product_sales_quantity*$v_content->product_price).'.VND'}}</h3>

                </td>

            </tr>
            @endforeach
            <tr>
                <td>

  

               




                
                @if($k!=0)
                @foreach($magiam as $key =>$ma)
               
                @if($k==$ma->coupon_id)

               
                    @if($ma->coupon_condition==2)
                    @php 
                      $giam = $ma->coupon_number;
                      echo '
                        <div class="row col-6">
                        <div class="col-sm-5"><h5>Tạm tính:</h5></div>
                         <div class="col-sm-4"> <h5>'.number_format($tong,0,',','.').'.VND</h5></div>
                       
                        <div class="col-sm-5"><h5>Giảm:</h5></div>
                         <div class="col-sm-4"> <h5>'.number_format($giam,0,',','.').'.VND</h5></div>
                         <div class="col-sm-5"><h5>Phí vận chuyển:</h5></div>
                         <div class="col-sm-4"> <h5>'.number_format($tienship,0,',','.').'.VND</h5></div>
                         <div class="col-sm-5"><h3>Tổng tiền:</h3></div>
                         <div class="col-sm-4"> <h3>'.number_format(($tong-$giam)+$tienship,0,',','.').'.VND</h3></div>
                        </div>';
                    @endphp
                    @elseif($ma->coupon_condition==1)
                    @php 
                      $giam = ($tong*$ma->coupon_number)/100;  
                   echo '<div class="row col-6">
                        <div class="col-sm-5"><h5>Tạm tính:</h5></div>
                         <div class="col-sm-4"> <h5>'.number_format($tong,0,',','.').'.VND</h5></div>
                       
                        <div class="col-sm-5"><h5>Giảm:</h5></div>
                         <div class="col-sm-4"> <h5>'.number_format($giam,0,',','.').'.VND</h5></div>
                         <div class="col-sm-5"><h5>Phí vận chuyển:</h5></div>
                         <div class="col-sm-4"> <h5>'.number_format($tienship,0,',','.').'.VND</h5></div>
                         <div class="col-sm-5"><h3>Tổng tiền:</h3></div>
                         <div class="col-sm-4"> <h3>'.number_format(($tong-$giam)+$tienship,0,',','.').'.VND</h3></div>
                        </div>';
                        
                        @endphp
                    
                    @endif
                    

                
                
                
                 @endif 
                
                  @endforeach

                  
             @else



                   @php 
                       
                   echo '<div class="row col-6">
                        <div class="col-sm-5"><h5>Tạm tính:</h5></div>
                         <div class="col-sm-4"> <h5>'.number_format($tong,0,',','.').'đ</h5></div>
                       
                        <div class="col-sm-5"><h5>Phí vận chuyển:</h5></div>
                         <div class="col-sm-4"> <h5>'.number_format($tienship,0,',','.').'đ</h5></div>
                         <div class="col-sm-5"><h3>Tổng tiền:</h3></div>
                         <div class="col-sm-4"> <h3>'.number_format($tong+$tienship,0,',','.').'đ</h3></div>
                        </div>';
                        
                        @endphp

                   
                   
                   @endif
            
           
               
           
              
             
             
             
             
                
                

                

                </td>
            </tr>



        </tbody>

    </table>
</div>
</div>
</section>





@endsection