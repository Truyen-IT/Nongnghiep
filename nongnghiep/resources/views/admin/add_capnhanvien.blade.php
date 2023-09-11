@extends('admin_layout')
@section('admin_content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm chức vụ nhân viên
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
                                <form role="form" action="{{URL::to('/save_capnhanvien')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chức vụ nhân viên (*)</label>
                                    <input type="text" name="cap_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    <p class="alert-danger">{{$errors->first('cap_name')}}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số tiền theo chức vụ :(VND)</label>
                                    
                                    <input type="text" name="captien" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                    <p class="alert-danger">{{$errors->first('captien')}}</p>
                                </div>
                               
                                <button type="submit" name="cap_nhanvien"  class="btn btn-info">Thêm chức vụ nhân viên</button>
                            </form>
                            </div>

                        </div>
                    </section> 

            </div>
           
        </div>

@endsection
