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
          Thông tin nhân viên
        </div>
        <div class="row w3-res-tb">
        <?php
        $name =Session::get('mes');
    if( $name){
        echo '<span class="text-alert">'.$name.'</span>';
        Session::put('mes',null);

    }
   
   ?>


        </div>
        <div class="table-responsive">
      <table class="table table-striped b-t b-light" id="cate">
      <thead>
          <tr>
            
            <th>Tên khách hàng</th>
           
            <th>Email Khách hàng</th>
            <th>Số điện thoại khách hàng</th>
            <th>Trạng thái tài khoản</th>
            
          </tr>
        </thead>
        <tbody>
          
          
         
          <tr>
          @foreach($cate_product as $key=> $cat)
            <td>{{$cat->customer_name}}</td>
            <td> {{$cat->customer_email}}</td>
            <td> {{$cat->customer_phone}}</td>
                           
            <td><span class="text-ellipsis">
              
              <?php
               if($cat->trangthai==0){
              ?>
               <a href="{{URL::to('/edit-kh1/'.$cat->customer_id)}}">Khóa tài khoản</a>  
           <?php
               }else{
  
               
          ?>
                  <a href="{{URL::to('/edit-kh2/'.$cat->customer_id)}}">Mở tài khoản</a>   
              
              <?php
              }
              
              ?>
              </span></td>
            
           
            
          </tr>
          @endforeach
         
         
          
          
          
          </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
       
        <div class="col-sm-7 text-right text-center-xs">                
        
          <ul class="pagination pagination-sm m-t-none m-b-none">
                   
                    </ul>
          
        </div>
      </div>
    </footer>
  </div>
</div>



@endsection
