@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
          liệt kê Tất cả hình ảnh sản Phẩm
        </div>
        <?php
        $name =Session::get('mes');
    if( $name){
        echo '<span class="text-alert">'.$name.'</span>';
        Session::put('mes',null);

    }
   
   ?>
        <div class="row w3-res-tb">

       

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
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh sản phẩm</th>
                        
                        <th>Chỉnh sửa</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=0;
                    @endphp
                    @foreach($all_image_product as $key=> $cates)
                    @php
                    $i=$i+1;
                    @endphp
                    <tr>
                        <td><label class="i-checks m-b-none">{{$i}}</label></td>
                        <td>{{$cates->product_name}}</td>
                        
                        <td><img src="upload/{{$cates->lagery_image}}" alt="" height="50" width="50"></td>
                      






                        <td>
                            <a href="{{URL::to('/edit-image-product/'.$cates->lagery_id)}}" class="active"
                                ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa?')"
                                href="{{URL::to('/delete-lagery-product/'.$cates->lagery_id)}}" class="active"
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
                    <small class="text-muted inline m-t-sm m-b-sm">Showing {{$i}} of {{$k}}  product</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                    {{$all_image_product->links('pagination::bootstrap-4')}}
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>



@endsection