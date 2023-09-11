@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            sửa hình ảnh sản phẩm
                        </header>
                        <?php
        $name =Session::get('mes');
    if( $name){
        echo '<span class="text-alert">'.$name.'</span>';
        Session::put('mes',null);

    }
   
   ?> 
                        <div class="panel-body">
                            @foreach($edit_image_product as $key =>$pro)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-image-product/'.$pro->lagery_id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="exampleInputFile">Tên sản phẩm (*)</label>
                                    <select name="product_lagery_name" id="" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key =>$cate)
                                        @if($cate->category_id==$pro->lagery_id)
                                        <option selected value="{{$cate->product_id}}">{{$cate->product_name}}</option>
                                       @else
                                       <option selected value="{{$cate->product_id}}">{{$cate->product_name}}</option>
                                        @endif
                                     
                                        
                                        @endforeach

                                    </select>
                                  
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_lagery_image" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    <img src="{{URL::to('upload/'.$pro->lagery_image)}}" alt="" height="100" width="100">
                                </div>
                               
                               
                               
                                <button type="submit" name="add_category_product"  class="btn btn-info">Cập nhật hình ảnh sản phẩm</button>
                            </form>
                            </div>
                            @endforeach

                        </div>
                    </section>

            </div>
           
        </div>

@endsection
