@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
          Liệt Kê chức vụ Nhân Viên
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
      <table class="table table-striped b-t b-light" id="cap">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
              TT
              </label>
            </th>
            <th>Chức vụ nhân viên</th>
            <th>Tiền lương theo ngày</th>
           
            <th>Chỉnh sửa</th>
           
          </tr>
        </thead>
        <tbody>
          @php
          $i=0;
          @endphp
          @foreach($all_capnhanvien as $key=> $cat)
          @php
          $i++;
          @endphp
          <tr>
            <td><label class="i-checks m-b-none">{{$i}}</label></td>
            <td>{{$cat->cap_name}}</td>
            <td><span class="text-ellipsis">{{number_format($cat->captien).''.'đ'}}</span></td>
          
            <td>
              <a href="{{URL::to('/edit_cap/'.$cat->cap_id)}}" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa chức vụ nhân viên?')"  href="{{URL::to('/delete_chuc/'.$cat->cap_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
          
            </td>
          </tr>
          
         
         
          
          @endforeach
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Showing {{$i}} of {{$k}} items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
          {{$all_capnhanvien->links('pagination::bootstrap-4')}}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>



@endsection
