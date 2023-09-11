@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            cập nhật chức vụ nhân viên
                        </header>
                        <?php
        $name =Session::get('mes');
    if( $name){
        echo '<span class="text-alert">'.$name.'</span>';
        Session::put('mes',null);

    }
   
   ?> 
                        <div class="panel-body">
                            @foreach($edit_cap as $key => $cates)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-cap/'.$cates->cap_id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chức vụ nhân viên (*)</label>
                                    <input type="text" value="{{$cates->cap_name}}" name="cap_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                               
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tiền lương theo ngày (*)</label>
                                    <input type="text" value="{{$cates->captien}}" name="cap_tien" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                   
                                </div>
                               
                                <button type="submit" name="update_category_product"  class="btn btn-info">Cập nhật chức vụ nhân viên</button>
                            </form>
                            </div>
                            @endforeach

                        </div>
                    </section>

            </div>
           
        </div>

@endsection
