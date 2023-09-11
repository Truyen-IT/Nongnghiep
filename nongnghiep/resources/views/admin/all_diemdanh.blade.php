@extends('admin_layout')
@section('admin_content')


<?php

    
    date_default_timezone_set('Asia/Damascus');
    $d = date("Y-m-d");

    $Tarrive = mktime(07,15,00);
    $TimeArrive = date("H:i:sa", $Tarrive);
 
    $Tleft = mktime(17,30,00);
    $Timeleft = date("H:i:sa", $Tleft);

    if (!empty($_POST['seldate'])) {
        $seldate = $_POST['date'];
    }
    else{
        $seldate = $d;
      }
   
    $_SESSION["exportdata"] = $seldate;
   
   
?>



<style>
.col{
    background-image: url("{{asset('images/cart/2.jp')}}");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: top right;
    background-size: cover;
}

header .head h1 {
    font-family: aguafina-script;
    text-align: center;
    color: blue;
}

header .head img {
    float: left;
}

header .opt {
    float: right;
    margin: -100px 20px 0px 0px
}

header .opt a {
    text-decoration: none;
    font-family: cursive;
    text-align: center;
    font-size: 20px;
    color: red;
    margin-right: 15px
}

header .opt a:hover {
    opacity: 0.8;
    cursor: pointer;
}

header .opt #inp {
    padding: 3px;
    margin: 0px 0px 0px 33px;
    background-color: #00A8A9;
    font-family: cursive;
    font-size: 16px;
    opacity: 0.6;
    color: red;
}

header .opt #inp:hover {
    background-color: #00A8A9;
    opacity: 0.8;
}

header .opt input {
    padding-left: 5px;
    margin: 2px 0px 3px 20px;
    border-radius: 7px;
    border-color: #A40D0F;
    background-color: #8E8989;
    color: black;
}

header .opt p {
    font-family: cursive;
    text-align: left;
    font-size: 19px;
    color: #f2f2f2;
}

.export {
    margin: 0px 0px 10px 20px;
    background-color: #900C3F;
    font-family: cursive;
    border-radius: 7px;
    width: 145px;
    height: 28px;
    color: #FFC300;
    border-color: #581845;
    font-size: 17px
}

.export:hover {
    cursor: pointer;
    background-color: #C70039;
}

.table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
.tex{
    color: black;
    padding-top: 14px;
}
.tabl td,
.tabl th {
    border: 1px solid #ddd;
    padding: 8px;
    opacity: 0.6;
    color: black;
}

.table tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table tr:nth-child(odd) {
    background-color: #f2f2f2;
    opacity: 0.9;
}

.table tr:hover {
    background-color: #ddd;
    opacity: 0.8;
}

.table th {
    opacity: 0.6;
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #00A8A9;
    color: black;
}
.text-right{
    margin-left: 500px;
}
</style>


<div  class="col">
<header>

    <div class="head">
        <!-- <img src="{{asset('images/cart/rfid1.jpg')}}" width="40" height="40"> -->
        <h1>RFID<br>Hệ Thống Điểm Danh</h1>
    </div>

    <div class="opt">
        <table border="0">
            <tr>

                <p class="tex">
                <form action="{{Request::url()}}?sort_by=date">
                    @csrf
                    <input type="date" name="date"><br>
                    <input type="submit" name="sorf" id="sorf" value="Chọn ngày">
                </form>
                </p>
                </td>
            </tr>
        </table>
    </div>
</header>


@if($i==" ")
<a class="btn btn-warning" href="{{URL::to('/export_1')}}">Xuất ra file Excel</a>

@else 
<a  class="btn btn-warning" href="{{URL::to('/export_2/'.$i)}}">Xuất ra file Excel</a>
@endif




<table  class="tabl" id="cate" >
<thead> 
    <tr>
        <th>ID.Số</th>
        <th>CardID</th>
        <th>Tên nhân viên</th>
        <th>Tiền theo ngày</th>
        <th>Ngày</th>
        <th>Giờ vào</th>
        <th>Giờ ra</th>
</tr>
</thead >
    <tbody>
        @php
        $i=0;
        @endphp
        @foreach($all_diemdanh as $key=> $cat)
        @php
        $i++;
        @endphp
        <tr>
            <td class="tex"><label class="i-checks m-b-none">{{$i}}</label></td>

            <td>{{$cat->admin_maso}}</td>
            <td>{{$cat->nhanvien_hoten}}</td>
            <td>{{number_format($cat->captien).'.'.'VND'}}.</td>
            <td><span class="text-ellipsis">{{$cat->admin_time}}</span></td>
           
            <td><span class="text-ellipsis">{{$cat->admin_day}}</span></td>
           
            <td><span class="text-ellipsis">{{$cat->admin_arive}}</span></td>

        </tr>




        @endforeach
        
      

    </tbody>
    



</table>
<div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                    {{$all_diemdanh->links('pagination::bootstrap-4')}}
                    </ul>
                </div>
        </div>

















</div>











@endsection