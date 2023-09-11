@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin nhân viên
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @foreach($nhanvien as $key =>$nhanvien)
        <div class="col-sm-4">
            <div class="card" style="width: 24rem; height:17rem;">
                <img src="upload/{{$nhanvien->nhanvien_hinhanh}}" alt="" height="150%" width="100%">
            </div>

        </div>
        <div class="col-sm-8 ">
            <table class="table">
                <tr class="row">
                    <td class="col-sm-4">Tên nhân viên:</td>
                    <td class="">{{$nhanvien->nhanvien_hoten}}</td>
                </tr>
                <tr class="row">
                    <td class="col-sm-4">Chức vụ nhân viên:</td>
                    <td class="">{{$nhanvien->cap_name}}</td>
                </tr>
                <tr class="row">
                    <td class="col-sm-4">Ngày bắt đầu làm:</td>
                    <td class="">{{$nhanvien->nhanvien_ngay}}</td>
                </tr>
              
                <tr class="row">
                    <td class="col-sm-4">Email:</td>
                    <td class="">{{$nhanvien->nhanvien_email}}</td>
                </tr>
                <tr class="row">
                    <td class="col-sm-4">Mật khẩu:</td>
                    <td class="">{{$nhanvien->nhanvien_matkhau}}</td>
                </tr>
                <tr class="row">
                    <td class="col-sm-4">Địa chỉ:</td>
                    <td class="">{{$nhanvien->nhanvien_diachi}}</td>
                </tr>
                <tr class="row">
                    <td class="col-sm-4">Số điện thoại:</td>
                    <td class="col-sm-8">{{$nhanvien->nhanvien_sdt}}</td>
                </tr>
                <tr class="row">
                    <td class="col-sm-4"><a href="{{URL::to('/all-nhanvien')}}" class="btn btn-primary btm-sm">Trở về</a>
                    </td>
                    <td class="col-sm-8"><a href="{{URL::to('/capnhatnhanvien/'.$nhanvien->nhanvien_id)}}"
                            class="btn btn-primary btm-sm">Cập nhật thông tin nhân viên</a></td>

                </tr>
            </table>

        </div>

    </div>
</div>






@endforeach






@endsection