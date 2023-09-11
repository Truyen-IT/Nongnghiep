@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Nhân Viên
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
                    <form role="form" action="{{URL::to('/save_nhanvien')}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhân viên (*)</label>
                            <input type="text" name="nhanvien_hoten" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                                <p class="alert-danger">{{$errors->first('nhanvien_hoten')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="nhanvien_gioitinh">Giới tính (*) </label>
                            <input type="radio" id="gender" name="nhanvien_gioitinh" value="0" />Nam
                            <input type="radio" id="gender" name="nhanvien_gioitinh" value="1" />Nữ <br />
                            <p class="alert-danger">{{$errors->first('nhanvien_gioitinh')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mã số nhân viên (*) </label>

                            <input type="text" name="nhanvien_maso" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                                <p class="alert-danger">{{$errors->first('nhanvien_maso')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình ảnh (*)</label>

                            <input type="file" name="hinhanh_nhanvien" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email (*)</label>

                            <input type="email" name="nhanvien_email" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                                <p class="alert-danger">{{$errors->first('nhanvien_email')}}</p>
                        </div>
                        <div class="form-group">
                            <label  for="exampleInputPassword1">Tên đăng nhập (*)</label>

                            <input type="text"  name="name_nhanvien" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                                <p class="alert-danger">{{$errors->first('name_nhanvien')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password (*)</label>

                            <input type="password" autocomplete="off" name="matkhau_nhanvien" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số điện thoại (*)</label>

                            <input type="text" name="nhanvien_sdt" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                                <p class="alert-danger">{{$errors->first('nhanvien_sdt')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Địa chỉ (*)</label>

                            <input type="text" name="nhanvien_diachi" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                                <p class="alert-danger">{{$errors->first('nhanvien_diachi')}}</p>
                        </div>
                        <input type="hidden" name="trangthai_nhanvien" value="1" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                       
                        
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ngày bắt đầu làm (*)</label>

                            <input type="date" name="nhanvien_ngay" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                                <p class="alert-danger">{{$errors->first('nhanvien_ngay')}}</p>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputFile">Cấp nhân viên (*)</label>
                            <select name="cap_id" id="" class="form-control input-sm m-bot15">
                                @foreach($all_cap as $key =>$cate)
                                <option value="{{$cate->cap_id}}">{{$cate->cap_name}}</option>
                                @endforeach

                            </select>

                        </div>


                        <button type="submit" name="add_nhanvien" class="btn btn-info">Thêm nhân viên</button>
                    </form>
                </div>

            </div>
        </section>

    </div>

</div>

@endsection