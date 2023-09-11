@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Thông tin khách hàng
    </div>

    
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên khách hàng</th>
            <th>Số điện thoại khách hàng</th>
            <th>Email khách hàng</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        <tr>
     
         <td>{{$cus->customer_name}}</td>

             <td>{{$cus->customer_phone}}</td>
             <td>{{$cus->customer_email}}</td>
            
          </tr>
     
        </tbody>
      </table>

    </div>
   
  </div>
</div>
<br>
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Thông tin người nhận hàng
    </div>
    
    
    <div class="table-responsive">
                     
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên người nhân hàng</th>
            <th>Địa chỉ nhận hàng</th>
            <th>Số điện thoại người nhận hàng</th>
            <th>Email</th>
            <th>Ghi chú</th>
            <th>Hình thức thanh toán</th>
          
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        
          <tr>
           
            <td>{{$shipping->shipping_name}}</td>
            <td>{{$shipping->shipping_address}}, {{$shipping->shipping_xa}}, {{$shipping->shipping_huyen}}, {{$shipping->shipping_city}}.</td>
             <td>{{$shipping->shipping_phone}}</td>
             <td>{{$shipping->shipping_email}}</td>
             <td>{{$shipping->shipping_notes}}</td>
             <td>@if($shipping->shipping_method==0) Chuyển khoản @else Tiền mặt @endif</td>
            
          
          </tr>
     
        </tbody>
      </table>

    </div>
   
  </div>
</div>
<br><br>

<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết đơn hàng
    </div>
   
    <div class="table-responsive">
    
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              TT
            </th>
            <th>Tên sản phẩm</th>
            
            <th>Mã giảm giá</th>
           
            <th>Số lượng</th>
            <th>Giá sản phẩm</th>
            <th>Phí ship hàng</th>
            <th>Tổng tiền</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        @php 
          $i = 0;
          $total = 0;
        
          @endphp
          @foreach($order_details as $key => $details)
          @php 
          $i++;
          $subtotal = $details->product_price*$details->product_sales_quantity;
          $total+=$subtotal;
          @endphp
         <td><i>{{$i}}</i></td>
          <td>{{$details->product_name}}</td>
          <td>@if($details->product_coupon!='no')
                  {{$details->product_coupon}}
                @else 
                  Không mã
                @endif
            </td>
          <td>{{$details->product_sales_quantity}}</td>   
          
            <td>{{number_format($details->product_price ,0,',',',')}}.VND</td>
            <td>{{number_format($details->product_feeship ,0,',',',')}}.VND</td>
            <td>{{number_format($subtotal ,0,',','.')}}.VND</td>
           
          </tr>
        @endforeach
        <tr>
            <td colspan="2">  
            @php 
                $total_coupon = 0;
              @endphp
              @if($coupon_condition==1)
                  @php
                  $total_after_coupon = ($total*$coupon_number)/100;
                 
                  echo 'Tổng giảm :'.number_format($total_after_coupon,0,',',',').'.VND'.'</br>';
                  $total_coupon = $total + $details->product_feeship - $total_after_coupon ;
                  @endphp
              @else 
                  @php
                  echo 'Tổng giảm :'.number_format($coupon_number,0,',',',').'.VND'.'</br>';
                  $total_coupon = $total + $details->product_feeship - $coupon_number ;

                  @endphp
              @endif

              Phí ship : {{number_format($details->product_feeship,0,',','.')}}.VND</br> 
              Thanh toán: {{number_format($total_coupon,0,',','.')}}.VND
            </td>
          </tr>
          

         
        
    
    </tbody>
      </table>
      <tr>
         
         
          <div class="form-group">
            
                                  
                                    @foreach($order_details as $key => $details)
                                    <form action="{{URL::to('/update-don/'.$details->order_code)}}">
                                    @endforeach
                                    @csrf
                                    <select name="status" id="" class="form-control input-sm m-bot15">
                                       
                                        <option value="2">Duyệt</option>
                                        <option value="3">Đang vận chuyển</option>
                                        <option value="4">Đang giao hàng</option>
                                        <option value="5">Giao hàng thành công</option>
                                      
                                    </select>
                                    <input type="submit" class="btn btn-outline-success" value="Cập Nhật Lại Đơn Hàng">
                                  </form>
                               
                                </div>
                                <a target="_blank" class="btn btn-success" href="{{url('/print-order/'.$details->order_code)}}">In đơn hàng</a>
          <a target="_blank" class="btn btn-success" href="{{url('/manager-order')}}">Trở Về</a>
         
          </tr>
          
    </div>
   
  </div>
</div>



@endsection 