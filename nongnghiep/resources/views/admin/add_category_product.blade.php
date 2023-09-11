@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Danh Mục Sản Phẩm
                        </header>
                        <?php
        $name =Session::get('mes');
    if( $name){
        echo '<span class="text-alert">'.$name.'</span>';
        Session::put('mes',null);

    }
   
   ?> 
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save_category-product')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục (*)</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    <p class="alert-danger">{{$errors->first('category_name')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục (*)</label>
                                    <textarea type="text" name="category_desc" class="form-control" id="exampleInputPassword1" placeholder="Password">  </textarea >
                                    <p class="alert-danger">{{$errors->first('category_desc')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh danh mục (*)</label>
                                    <input type="file" name="category_product_image" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    <p class="alert-danger">{{$errors->first('category_product_image')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển thị (*):</label>
                                  
                                    <input type="radio" id="gender" name="category_status" value="0" />Ẩn
                                    <input type="radio" id="gender" name="category_status" value="1" />Hiển thị <br />

                                    <p class="alert-danger">{{$errors->first('category_status')}}</p>
                                  
                                </div>
                               
                                <button type="submit" name="add_category_product"  class="btn btn-info">Thêm danh mục sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
           
        </div>

@endsection
