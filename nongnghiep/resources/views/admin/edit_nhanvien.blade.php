@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật nhân viên
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
                    @foreach($nhanvien as $key => $vat)
                    <form role="form" action="{{URL::to('/update_nhanvien/'.$vat->nhanvien_id)}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nhân viên (*) </label>
                            <input type="text" name="name_nhanvien" value="{{$vat->nhanvien_hoten}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="gioitinh_nhanvien" >Giới tính (*)  </label>
                            @if($vat->nhanvien_gioitinh==1)
                            
                            <input type="radio" id="gender"  name="gender" checked value="1" />Nam
                            <input type="radio" id="gender" name="gender" value="0" />Nu <br />
                            @else
                       
                            <input type="radio" id="gender"  name="gender"value="1" />Nam
                           
                            <input type="radio" id="gender" name="gender"  checked   value="0" />Nu<br />
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mã số nhân viên (*) </label>

                            <input type="text" name="maso_nhanvien" value="{{$vat->nhanvien_maso}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình ảnh (*) </label>

                            <input type="file" name="hinhanh_nhanvien" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                                <img src="{{URL::to('xem-nhanvien/upload/'.$vat->nhanvien_hinhanh)}}" alt="" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">email (*) </label>

                            <input type="email" name="email_nhanvien"   value="{{$vat->nhanvien_email}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mật khẩu (*) </label>

                            <input type="password" name="matkhau_nhanvien"  value="{{$vat->nhanvien_matkhau}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số điện thoại (*) </label>

                            <input type="text" name="sdt_nhanvien"   value="{{$vat->nhanvien_sdt}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">địa chỉ (*) </label>

                            <input type="text" name="diachi_nhanvien"  value="{{$vat->nhanvien_diachi}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Trạng thái (*) </label>
                            <select name="trangthai_nhanvien" id="register_country"class="form-control input-sm m-bot15">
                                <option value="1">Đang làm </option>
                                <option value="0">Đình chỉ</option>
                                </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ngày bắt đầu làm (*) </label>

                            <input type="date" name="ngay_nhanvien"  value="{{$vat->nhanvien_ngay}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>


                        <div class="form-group">
                           
                            <label for="exampleInputFile">Chức vụ nhân viên (*) </label>
                                    <select name="cap_id" id="" class="form-control input-sm m-bot15">
                                        @foreach($all_cap as $key =>$cate)
                                        @if($cate->cap_id==$vat->cap_id)
                                        <option selected value="{{$cate->cap_id}}">{{$cate->cap_name}}</option>
                                       @else
                                       <option selected value="{{$cate->cap_id}}">{{$cate->cap_name}}</option>
                                        @endif
                                     
                                        
                                        @endforeach

                                    </select>

                        </div>


                        <button type="submit" name="add_nhanvien" class="btn btn-info">Cập nhật nhân viên</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

    </div>

</div>

@endsection