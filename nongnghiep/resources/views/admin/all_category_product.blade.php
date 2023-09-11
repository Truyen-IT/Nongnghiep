@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
          Tất Cả Danh Mục
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
              <label class="i-checks m-b-none">TT
              </label>
            </th>
            <th>Tên danh mục</th>
            <th>Hình ảnh danh mục</th>
            <th>Nội dung</th>
            <th>Hiển thị or ẩn</th>
            <th>Chỉnh sửa</th>
          
          </tr>
        </thead>
        <tbody>
          @php
          $k=0;
          @endphp
          @foreach($all_category_product as $key=> $cate)
          @php
          $k++;
          @endphp
          <tr>
            <td><label class="i-checks m-b-none">{{$k}}</label></td>
            <td>{{$cate->category_name}}</td>
            <td><img src="upload/{{$cate->category_product_image}}" alt="" height="70" width="100"></td>
            <td><span class="text-ellipsis">{{$cate->category_desc}}</span></td>
            <td><span class="text-ellipsis">
              
            <?php
             if($cate->category_status==0){
            ?>
             <a href="{{URL::to('/hienthi/'.$cate->category_id)}}">Hiển Thị</a>  
        <?php
             }else{

             
        ?>


            <a href="{{URL::to('/an/'.$cate->category_id)}}">Không hiển thị</a>   
            
            <?php
            }
            
            ?>
            </span></td>
            
            
            
            
            
            
                            <td>
              <a href="{{URL::to('/edit_category-product/'.$cate->category_id)}}" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"  href="{{URL::to('/delete_category-product/'.$cate->category_id)}}" class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
            </td>
            
          </tr>
          
         
         
          
          @endforeach
          
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing {{$k}} of {{$i}} items</small>
        </div>
                      
        <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                    {{$all_category_product->links('pagination::bootstrap-4')}}
                    </ul>
                </div>
        </div>
   
    </footer>
  </div>
</div>



@endsection
