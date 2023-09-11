@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
          Liệt Kê mã giảm giá
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
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                               TT
                            </label>
                        </th>
                        <th>Tên mã giảm giá</th>
                        <th>Code mã giảm giá</th>
                        <th>Số lượng mã giảm giá</th>
                       
                        <th>Điều kiện giảm giá</th>
                        <th>Số giảm</th>
                        <th style="width:30px;">Xóa</th>

                       
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=0;
                    @endphp
                    @foreach($coupon as $key=> $cate)
                    @php
                    $i++;
                    @endphp
                    <tr>
                        <td><label class="i-checks m-b-none">{{$i}}</label></td>
                        <td>{{$cate->coupon_name}}</td>
                        <td>{{$cate->coupon_code}}</td>
                        <td>{{$cate->coupon_time}}</td>
                        <td><span class="text-ellipsis">

                                <?php
                             if($cate->coupon_condition==1){
                                ?>
                                <a href="{{URL::to('/hienthi/'.$cate->category_id)}}">Giảm theo % </a>
                                <?php
                              }else{
                               ?>
                               <a href="{{URL::to('/an/'.$cate->category_id)}}">Giảm theo giá tiền</a>
                               <?php
                               }
            
                               ?>
                            </span></td>
                        <td><span class="text-ellipsis">

                                <?php
                              if($cate->coupon_condition==1){
                              ?>
                                <a href="{{URL::to('/hienthi/'.$cate->category_id)}}">Giảm{{$cate->coupon_number}}% </a>
                                <?php
                               }else{
                                 ?>
                               <a href="{{URL::to('/an/'.$cate->category_id)}}">Giảm:{{$cate->coupon_number}}VND </a>

                                <?php
                               }
                             ?>
                            </span></td>






                        <td>

                            <a onclick="return confirm('Bạn có chắc muốn xóa mã giảm giá này?')"
                                href="{{URL::to('/delete-coupon/'.$cate->coupon_id)}}" class="active"
                                ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
                        </td>

                    </tr>




                    @endforeach

                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing {{$i}}of {{$k}} items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                    {{$coupon->links('pagination::bootstrap-4')}}
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>



@endsection