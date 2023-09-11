@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Danh Sách ngày làm nhân viên
        </div>
        <div class="row w3-res-tb">
        <div class="row w3-res-tb">
            

              
            <div class="row">
                 <div class="col-sm-3">
                 @foreach($all_diemdanh as $key=> $cat)
                    <form action="{{URL::to('/ngaylam-nv/'.$cat->nhanvien_id)}}" method="get">
                      
                        <input type="hidden" name="id" value="{{$cat->nhanvien_id}}">
                        @endforeach
                        
                </div>
                <div class="col-sm-3">
                    Ngày Đầu<input type="date" name="ngaydau" >
                </div>
                <div class="col-sm-3">
                    Ngày Cuối<input type="date" name="ngaycuoi">
                </div>
                <div class="col-sm-3">
                <input class="btn btn-sm btn-default" value="Tìm Kiếm" type="submit">
                </div>
             
            </div>
            </form>

       



    </div>



            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">

            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light" id="cate">
                <thead>
                    <tr>
                       
                        <th>ID</th>
                        <th>Tên Nhân viên</th>
                        <th>Tiền lương theo ngày</th>
                        <th>Ngày làm</th>
                        

                      
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total= 0;
                    $i=0;
                    @endphp

                    @foreach($all_diemdanh as $key=> $cat)
                    @php
                    $total= $total +$cat->captien;
                    $i++;

                    @endphp
                    <tr>
                        
                        <td>{{$cat->admin_maso}}</td>
                        <td>{{$cat->nhanvien_hoten}}</td>
                        <td>{{number_format($cat->captien).''.'VND'}}</td>
                        <td><span class="text-ellipsis">{{$cat->admin_time}}</span></td>
                       

                       

                    </tr>






                    @endforeach



                </tbody>
            </table>
            <div> @php
                echo 'Số ngày làm:&nbsp'.$i;
                echo '<p>Tổng tiền:&nbsp'.number_format($total,0,',','.').'đ</p>';
                @endphp</div>
            


        </div>
        <div class="row col-sm-6">
                <div class="col-sm-2"><a class="btn btn-primary btn-sm" href="{{URL::to('/all-nhanvien')}}">Trở về</a></div>
                <div class="col-sm-1"></div>
                <div class="col-sm-2">
                    <form action="{{URL::to('/in')}}" method="post">

                        @csrf
                        @foreach($all_diemdanh as $key => $nhanvien)


                        <input type="hidden" name="ten" value="{{$nhanvien->nhanvien_hoten}}">
                        <input type="hidden" name="socap" value="{{$nhanvien->cap_name}}">
                        <input type="hidden" name="tien" value="{{$nhanvien->captien}}">
            

                        @endforeach
                        <input type="hidden" name="songay" value="{{$i}}">
                        <input type="hidden" name="tongtien" value="{{$total}}">
                        <input type="submit" name="in" class="btn btn-primary btn-sm" value="In ngày làm">

                    </form>
                </div>

            </div>

        <footer class="panel-footer">
            <div class="row">

                
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                       
                      {{$all_diemdanh->links('pagination::bootstrap-4')}}
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>



@endsection