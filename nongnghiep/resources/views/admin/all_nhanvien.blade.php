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
            <th>Tên nhân viên</th>
           
            <th>Chức vụ nhân viên</th>
            <th>Chi tiết ngày làm</th>
            <th>Xem thông tin nhân viên</th>
            <th>Quản lí trạng thái</th>
            <th>Xóa nhân viên</th>
          </tr>
        </thead>
        <tbody>
          @php
          $i=0;
          @endphp
          @foreach($all_nhanvien as $key=> $cat)
          @php
          $i++;
          @endphp
          <tr>
            <td>{{$cat->nhanvien_hoten}}</td>
            <td> {{$cat->cap_name}}</td>
                            <td><a href="{{URL::to('/ngaylam-nv/'.$cat->nhanvien_id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
            <td>
             
              <a href="{{URL::to('/xem-nhanvien/'.$cat->nhanvien_id)}}" class="active" ui-toggle-class=""><i class="fa fa-eye" aria-hidden="true"></i></a>
            </td>
            <td><span class="text-ellipsis">
              
            <?php
             if($cat->trangthai==0){
            ?>
             <a href="{{URL::to('/edit-nv1/'.$cat->nhanvien_id)}}">Đình chỉ làm việc</a>  
         <?php
             }else{

             
        ?>
                <a href="{{URL::to('/edit-nv2/'.$cat->nhanvien_id)}}">Trở lại làm việc</a>   
            
            <?php
            }
            
            ?>
            </span></td>
           
           

            <td>
           <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"  href="{{URL::to('/delete-nhanvien/'.$cat->nhanvien_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
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
                    {{$all_nhanvien->links('pagination::bootstrap-4')}}
                    </ul>
          
        </div>
      </div>
    </footer>
  </div>
</div>



@endsection
