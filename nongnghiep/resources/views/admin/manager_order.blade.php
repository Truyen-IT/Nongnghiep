@extends('admin_layout')
@section('admin_content')
<style>
  .text-alert{
    color:blue;
    padding-bottom: 4px;
  }
</style>
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>
    <div class="row w3-res-tb">
     
     
    
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('mes');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light" id="cate">
        <thead>
          <tr>
           
            <th>TT</th>
            <th>Mã đơn hàng</th>
            <th>Ngày giờ đặt hàng</th>
            <th>Tình trạng đơn hàng</th>
          

            <th style="width:30px;">Chỉnh sửa</th>
          </tr>
        </thead>
        <tbody>
          @php 
          $i = 0;
          @endphp
          @foreach($order as $key => $ord)
            @php 
            $i++;
            @endphp
          <tr>
            <td><i>{{$i}}</i></label></td>
            <td>{{ $ord->order_code }}</td>
            <td>{{ $ord->created_at }}</td>
            <td>@if($ord->order_status==1)
                    Đơn hàng mới
                @elseif($ord->order_status==2) 
                    Đã xử lý
                @elseif($ord->order_status==3) 
                    Đang vận chuyển
                    @elseif($ord->order_status==4) 
                    Đang giao hàng
                    @elseif($ord->order_status==5) 
                    Giao hàng thành công
                    @elseif($ord->order_status==6) 
                    Đơn hàng đã hủy
                   
                @endif
            </td>
           
           
            <td>
              <a href="{{URL::to('/views-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-eye text-success text-active"></i></a>

              <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng này ko?')" href="{{URL::to('/delete-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing {{$i}} of {{$k}} items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                    {{$order->links('pagination::bootstrap-4')}}
                    </ul>
                </div>
      </div>
    </footer>
   
  </div>
</div>
@endsection