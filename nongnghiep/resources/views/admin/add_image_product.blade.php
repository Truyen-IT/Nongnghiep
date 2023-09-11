@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm hình ảnh sản phẩm
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
                                <form role="form" action="{{URL::to('/save-image-product')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputFile">Tên sản phẩm (*)</label>
                                    <select name="product_id" id="" class="form-control input-sm m-bot15">
                                        @foreach($pro as $key =>$valu)
                                        <option value="{{$valu->product_id}}">{{$valu->product_name}}</option>
                                        @endforeach
                                    
                                       

                                    </select>
                                  
                                  
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh danh mục(*)</label>
                                    <input type="file" multiple name="lagery_image[]" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                   
                                </div>
                                
                               
                                <button type="submit" name="add_category_product"  class="btn btn-info">Thêm hình ảnh cho sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
           
        </div>

@endsection
