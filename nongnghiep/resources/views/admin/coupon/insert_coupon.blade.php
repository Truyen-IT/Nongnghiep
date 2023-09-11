@extends('admin_layout')
@section('admin_content')
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Mã Giảm Giá
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
                    <form role="form" action="{{URL::to('/save_coupon')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên mã giảm giá (*)</label>
                            <input type="text" require name="coupon_name" class="form-control" require
                                id="exampleInputEmail1" placeholder="Enter email">
                                <p class="alert-danger">{{$errors->first('coupon_name')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Code mã giảm giá (*)</label>
                            <textarea type="text" require name="coupon_code" class="form-control"
                                id="exampleInputPassword1" placeholder="Password">  </textarea>
                                <p class=" alert-danger">{{$errors->first('coupon_code')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số lượng mã giảm giá (*)</label>
                            <textarea type="text" require name="coupon_time" class="form-control"
                                id="exampleInputPassword1" placeholder="Password">  </textarea>
                                <p class=" alert-danger">{{$errors->first('coupon_time')}}</p>
                                
                        </div>


                        <div class="form-group">
                            <label for="exampleInputFile">Tính trạng mã giảm giá (*)</label>
                            <select require name="coupon_condition" id="" class="form-control input-sm m-bot15">
                                <option value="">-----chọn----- </option>
                                <option value="1">Giảm theo %</option>
                                <option value="2">Giảm theo tiền </option>

                            </select>
                            <p class="alert-danger">{{$errors->first('coupon_condition')}}</p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nhập số % or số tiền giảm (*)</label>
                            <textarea require type="text" name="coupon_number" class="form-control"
                               placeholder="Password"> </textarea>
                                <p class=" alert-danger">{{$errors->first('coupon_number')}}</p>
                        </div>

                        <button type="submit" name="insert_coupon" class="btn btn-info">Thêm mã giảm giá</button>
                    </form>
                </div>

            </div>
        </section>

    </div>

</div>

@endsection