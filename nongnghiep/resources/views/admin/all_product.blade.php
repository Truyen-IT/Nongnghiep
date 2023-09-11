@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
          liệt kê Tất Cả sản Phẩm
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
                        <th>Tên sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Danh mục</th>
                        <th>Sản phẩm nổi bật</th>
                        <th>Hiển thị</th>
                        <th>Chỉnh sửa</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=0;
                    @endphp
                    @foreach($all_product as $key=> $cates)
                    @php
                    $i=$i+1;
                    @endphp
                    <tr>
                        <td><label class="i-checks m-b-none">{{$i}}</label></td>
                        <td>{{$cates->product_name}}</td>
                        <td><span class="text-ellipsis">{{$cates->product_content}}</span></td>
                        <td><img src="upload/{{$cates->product_image}}" alt="" height="50" width="50"></td>
                        <td><span class="text-ellipsis">{{$cates->product_price}}</span></td>
                        <td><span class="text-ellipsis">{{$cates->category_name}}</span></td>
                        <td><span class="text-ellipsis">
                                <?php if($cates->product_noibat==1){?>
                                <p>Nổi bật</p>
                                <?php } else{?>
                                <p>Không nổi bật</p>
                                <?php }?> </span></td>
                        <td><span class="text-ellipsis">
                                <?php
                         if($cates->product_status==0){
                                ?>
                                <a href="{{URL::to('/hienthi1/'.$cates->product_id)}}">Không hiển thị</a>
                                <?php
                                }else{
                                  ?>
                                <a href="{{URL::to('/an1/'.$cates->product_id)}}">Hiển thị</a>
                               <?php
                               }
             
                                ?>
                              </span></td>






                        <td>
                            <a href="{{URL::to('/edit-product1/'.$cates->product_id)}}" class="active"
                                ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
                            <a onclick="return confirm('Bạn có chắc muốn xóa?')"
                                href="{{URL::to('/delete-product1/'.$cates->product_id)}}" class="active"
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
                    {{$all_product->links('pagination::bootstrap-4')}}
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>



@endsection