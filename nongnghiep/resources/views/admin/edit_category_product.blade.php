@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            cập nhật danh mục sản phẩm
                        </header>
                        <?php
        $name =Session::get('mes');
    if( $name){
        echo '<span class="text-alert">'.$name.'</span>';
        Session::put('mes',null);

    }
   
   ?> 
                        <div class="panel-body">
                            @foreach($edit_category_product as $key => $cates)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update_category-product/'.$cates->category_id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục (*)</label>
                                    <input type="text" value="{{$cates->category_name}}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm (*)</label>
                                    <input type="file" name="category_product_image" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    <img src="{{URL::to('upload/'.$cates->category_product_image)}}" alt="" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <input type="text" value="{{$cates->category_desc}}" name="category_product_desc" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                   
                                </div>
                               
                                <button type="submit" name="update_category_product"  class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                            </div>
                            @endforeach

                        </div>
                    </section>

            </div>
           
        </div>

@endsection
