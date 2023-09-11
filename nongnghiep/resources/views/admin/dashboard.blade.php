@extends('admin_layout')
@section('admin_content')

<div class="container-fluid">

<style >
    p.title_thongke{
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }
    .cas{
        margin-bottom: 3px;
        
    background-color: #b1154a; /* tương đương giá trị theo tên green '#81C79','#fc8710','#FF6541','#A4ADD3','#766B56 */
    border: 12px solid #7FFF00;  
    }
    .cas1{
        margin-bottom: 3px;
       
        
       background-color: #b1154a; /* tương đương giá trị theo tên green */
       border: 12px solid #b1154a;  
       }
       .cas2{
        margin-bottom: 3px;
       
        
       background-color: #9932CC; /* tương đương giá trị theo tên green */
       border: 12px solid #FF6541;  
       }
       .cas3{
        margin-bottom: 3px;


       }
       .cas5{
        border: 12px solid #81C79; 

       }
       .ac{
        margin-top: 5px;
       }

</style>

<div class="row">

<h3 class="title_thongke">Thống kê đơn hàng theo doanh số</h3>
<form autocomplete="off" action="">
    @csrf
    <div class="col-md-2">
        <p class="">Từ ngày <input type="text" id="datepicker" class="form-control"></p>
        <input type="button" id="btn-dashboard-filter" class=" ac btn btn-primary btn-sm" value="Lọc kết quả">
    </div>
    <div class="col-md-2">
    <p>Đến ngày<input type="text" id="datepicker2" class="form-control"></p>
    
    </div>
    
    <div class="col-sm-2">
        <p>Lọc theo
        <select  class="dashboard-filter form-control ">
                        <option >-----Chọn-----</option>
                      
                        <option value="7ngay">7 ngày qua</option>
                        <option value="thangtruoc">Tháng trước</option>
                        <option value="thangnay">Tháng này</option>
                        <option value="365ngayqua">365 ngày qua</option>
                        

                    </select>
        </p>
    </div>
    <div class="col-sm-6">
    </div>
 
    <div class="col-sm-5">
        <h4  class="cas3">Chi tiết</h4>
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-2 cas2"></div>
                <div class="col-sm-5">Doanh số</div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-2 cas1 "></div>
                <div class="col-sm-5">Lợi nhuân</div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-2 cas"></div>
                <div class="col-sm-5">Số lượng</div>
            </div>
        </div>
    </div>

</form>
<div class="col-md-12">
<div id="myfirstchart" style="height: 250px;"></div>

</div>

</div>

<div class="row">


<div class="row">
    <div class="col-sm-6 col-xs-12">
        <h3>Thống kê tổng khách hàng, sản phẩm, đơn hàng.</h3>
        <div id="donut-example"></div>
      

    </div>
  
    <style>
        ol.list{
            margin: 10px 0;
            color: #fff;
        }
        ol.list a{
            color: black;
            font-weight: 300;

        }
        ol.list p{
            color: black;
            font-weight: 300;
            font-size: larger;

        }
        ol.list span{
            color: blueviolet;
        }
        .cl{
            border: 2px solid yellow;
        }

        </style>


    <div class="col-sm-5 col-xs-12">

    <div class="">
  <h3>Thống kê sản phẩm xem nhiều nhất.</h3>
  

  <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Lượt xem</th>
            
          
          </tr>
        </thead>
        <tbody>
        
          <tr>
          @foreach($product_view as $key=>$val)  
      <tr class="success">
        <td>{{$val->product_name}}</td>
        @if($val->product_views!=NULL)
        <td>{{$val->product_views}}</td>
        @else
        <td>0</td>
        @endif
      
      </tr>
      @endforeach
            
              </tr>
          
         
    
          
        </tbody>
      </table>
    </div>
   

    </div>
</div>


    </div>
    <div class="col-sm-6 col-xs-12">
        <h3>Thống kê tổng sản phẩm tốt cho sức khỏe.</h3>
        <div id="donut-example1"></div>
      

    </div>
</div>




@endsection
