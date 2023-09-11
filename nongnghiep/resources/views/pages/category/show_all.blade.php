@extends('layout')


@section('content')
<style>
.ass {
    width: 20%;
    height: 10;
}

</style>
<style>
    div .asd{
        margin-top: 12px;
        font-size: 17px;
        margin-left: 12px;

    }
    div .admin{
        margin-top: 6px;
        font-size: 15px;

    }
</style>
<div class="heading">
   

    <h1>Nông sản Langbian</h1>


</div>






<section class="products">

    <h4 class="cim" > <a href="{{URL::to('trangchu')}}">Trang chủ >></a> Tất cả sản phẩm
    </h4>








    <div class="row ">
        <div class="col-sm-3 ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 container">
                        <div class="left-sidebar">
                            <div class="panel-group category-products price-ranges" id="accordian">

                                <div class="list-group border">
                                    <a href="#" class="list-group-item active ">
                                        <h3>Có thể bạn sẽ thích</h3>
                                    </a>


                                    <!-- @foreach($category as $key => $cate)




                                     <a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}"
                                        class="list-group-item  btn-outline-success">
                                        <h4>{{$cate->category_name}}</h4>
                                    </a> 
                                    @endforeach -->
                                    @foreach($yeu_product as $key => $ca)
                                    @foreach($yeu_product1 as $key => $y)
                                    @if($ca->product_id==$y->product_id)
                                    <a href="{{URL::to('chi-tiet-san-pham/'.$ca->product_id)}}"
                                        class="list-group-item  btn-outline-success">
                                        <div class="hinh row">
                                            <div class="col-sm-4"><img src="{{URL::to('upload/'.$ca->product_image)}}"
                                                    width="130%" alt=""> </div>

                                            <div class="col-sm-8">
                                                <h4>{{$ca->product_name}}</h4>
                                                <h5>{{number_format($ca->product_price).'','đ'}}đ</h5>
                                            </div>
                                        </div>
                                    </a>
                                    @endif
                                    @endforeach
                                    @endforeach

                                </div>



                            </div>
                            <!--/category-productsr-->


                            <div class="price-ranges">
                                <!--price-range-->



                                <div class="list-group  border">
                                    <a href="#" class="list-group-item active">
                                        <h3>LỌC THEO GIÁ</h3>
                                    </a>

                                    <div class="col-sm-12">
                                        <div class="form-group price-ranges">
                                        <form action="">
                                                <div id="slider-range" style="height:8px;"></div>
                                                

                                                <div class="row">
                                                    <p class="asd">Giá:&nbsp</p>
                                              
                                                <input class="admin" type="text" id="amount" readonly
                                                    style="border:0; color:#f6931f; font-weight:bold;">
                                                </div>  <input type="hidden" name="start_price" id="start_price">
                                                <input type="hidden" name="end_price" id="end_price">
                                                <br>
                                                <input class="bor" type="submit" name="filter_price" class="btn btn-sm"
                                                    value="Lộc Giá">
                                            </form>

                                        </div>
                                    </div>



                                </div>


                            </div>



                            <div class="panel-group category-products price-ranges" id="accordian">

                                <div class="list-group border">
                                    <a href="#" class="list-group-item active ">
                                        <h3>Sản phẩm xem nhiều nhất</h3>
                                    </a>


                                    <!-- @foreach($category as $key => $cate)




     <a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}"
        class="list-group-item  btn-outline-success">
        <h4>{{$cate->category_name}}</h4>
    </a> 
    @endforeach -->
                                    @foreach($xem_nhieu_product as $key => $ca)
                                    <a href="{{URL::to('chi-tiet-san-pham/'.$ca->product_id)}}"
                                        class="list-group-item  btn-outline-success">
                                        <div class="hinh row">
                                            <div class="col-sm-4"><img src="{{URL::to('upload/'.$ca->product_image)}}"
                                                    width="130%" alt=""> </div>

                                            <div class="col-sm-8">
                                                <h4>{{$ca->product_name}}</h4>
                                                <h5>{{number_format($ca->product_price).'','đ'}}đ</h5>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach

                                </div>



                            </div>


                            <!--/price-range-->

                        </div>
                    </div>


                </div>
            </div>







        </div>

        <div class="col-sm-9">
            <div class="row  ccc">
               
                <div class="col-sm-4">
                    <div class="form-group">
                        <form action="{{URL::to('/danh-muc-san-pham-all')}}" method="get">
                        <p>Hổ trợ cho sức khỏe</h4>
                            <select name="benh" id="benh" class="form-control input-sm m-bot15 ">
                                <option value="">-----------Chọn---------</option>

                                <option value="tieuduong">Bệnh tiểu đường
                                </option>
                                <option value="trinao">Tăng cường trí não
                                </option>
                                <option value="thieumau">Hỗ trợ người thiếu máu</option>
                                <option value="tieuhoa">Hỗ trợ quá trình tiêu hóa</option>



                            </select>

                       




                    </div>
                    
                </div>

                <div class="col-sm-2 ">
                    <div class="form-group">
                            <h4 for="">Sắp xếp</h4>
                           
                            <select name="sapxep"  class="form-control input-sm m-bot15 ">
                                <option value="">---------Chọn-------</option>

                                <option value="caothap">Thứ tự theo giá:cao đến thấp
                                </option>
                                <option value="thapcao">Thứ tự theo giá:thấp đến cao
                                </option>
                                <option value="az">Thứ tự theo ký tự A - Z</option>
                                <option value="za">Thứ tự theo ký tự Z - A</option>



                            </select>

                      




                    </div>
                    
                    
                </div>
                <div class="col-sm-2 try">
                    <div class="form-group">
                    <h2 for=""></h2>
                           
                          
                            <input type="submit" class="btn btn-primary btn-lg" value="Lọc">



                          

                      




                    </div>
                    
                    
                </div>
                
                   
                
            </form>

                @php
                $i=0 ;
                $k=0;
                @endphp
                @foreach($category_id as $key => $pro)
                @php
                $i++;
                @endphp
                @endforeach

                @foreach($all_product1 as $key => $ca)

                @php
                $k++;
                @endphp
                @endforeach
                <div class="col-sm-4">
                    <h1 class="title1"><a>
                            Tổng sản phẩm:&nbsp@php
                            echo $k;
                            @endphp</a> </h1>


                </div>



            </div>


            <!-- <div class="row ">
            <form action="{{URL::to('/loc')}}" method="get">
              
                <div class="col-md-4">
                <div class="form-group ">
                  
                    <select class="form-control" name="theloai" id="sel1">
                        <option value="">sap xep</option>
                        <option value="2">san pham tieu duong</option>
                        <option value="3">san pham tot cho suc khoe</option>
                        <option value="4">tot cho nguoi benh bao tu</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group ">
                 
                    <select class="form-control" name="sapxep" id="sel1">
                        <option value="">gia tu that den cao</option>
                        <option value="thap">gia tu cao den thap</option>
                        <option>A-Z</option>
                        <option>Z-A</option>
                    </select>
                </div>
            </div>
            
            
               
           <input type="submit" class="btn btn-sm btn-primary" value="loc">
            </form>
         </div> -->




            <div class="box-container container ">




                @foreach($category_id as $key => $pro)
                <div class="box">

              
                    <form>
                        @csrf
                        <input type="hidden" value="{{$pro->product_id}}" class="cart_product_id_{{$pro->product_id}}">
                        <input  id="wishlist_productname{{$pro->product_id}}" type="hidden" value="{{$pro->product_name}}"
                            class="cart_product_name_{{$pro->product_id}}">
                        <input type="hidden" value="{{$pro->product_image}}"
                            class="cart_product_image_{{$pro->product_id}}">
                        <input     type="hidden" value="{{$pro->product_price}}"
                            class="cart_product_price_{{$pro->product_id}}">
                        
                            <input  id="wishlist_productprice{{$pro->product_id}}" type="hidden"    value="{{number_format($pro->product_price,0,',',',')}}VND"
                          >

                            <input type="hidden" value="{{$pro->price_cost}}" class="cart_price_cost_{{$pro->product_id}}">

                        <input type="hidden" value="1" class="cart_product_qty_{{$pro->product_id}}">


                        <div class="icons">
                            <button type="button" class="add-to-cart" data-id_product="{{$pro->product_id}}"
                                name="add-to-cart"><a class="fas fa-shopping-cart"></a></button>

                                <button type="button"  class="add-to-cart" id="{{$pro->product_id}}" onclick="add_wistlist(this.id);"
                               > <a class="fas fa-heart"></a></button>
                            <a  id="wishlist_producturl{{$pro->product_id}}"  href="{{URL::to('chi-tiet-san-pham/'.$pro->product_id)}}" class="fas fa-eye"></a>
                        </div>
                        <div class="image">
                            <img   id="wishlist_productimage{{$pro->product_id}}"   src="{{URL::to('upload/'.$pro->product_image)}}" alt="">
                        </div>
                       
                       
                       
                       
                        <div class="content">
                            <div class="content">
                                <h3>{{$pro->product_name}}</h3>
                                <div class="price">{{number_format($pro->product_price).''.'VND'}}</div>
                                <div class="stars">

                                    @php
                                    $k=0;
                                    $i=0;
                                    $t=0;

                                    @endphp

                                    @foreach($rating as $key=>$ra)
                                    @if($ra->product_id==$pro->product_id)

                                    @php
                                    $k++;
                                    $i=$i+$ra->rating;
                                    @endphp


                                    @endif

                                    @endforeach





                                    <?php
            
              try {

                
                $result = $i/$k;
               
               }
               catch (DivisionByZeroError $e) { 
                
                $result=0;
                 
               }

            ?>



                                    @for($count=1;$count<=5;$count++) @php if($count<=$result){ $color='color:#FF0000;'
                                        ; } else{ $color='color:#cccccc;' ; } @endphp <i
                                        style="cursor:pointer; {{$color}}" class="fas fa-star"></i>

                                        @endfor




                                </div>
                            </div>
                        </div>

                    </form>
                </div>


                @endforeach





            </div>
            {{$category_id->links('pagination::bootstrap-4')}}
        </div>









</section>



























@endsection

@section('con')

<section class="footer">

<div class="box-container">

    <div class="box">
        <h3>Đường dẫn nhanh</h3>
        <a href="{{URL::to('trangchu')}}"> <i class="fas fa-arrow-right"></i> Trang chủ</a> 
       
        <a href="about.html"> <i class="fas fa-arrow-right"></i>Thực phẩm công nghệ</a>

        
        <a href="{{URL::to('/danh-muc-san-pham/'.$cate_product_tuoi->category_id)}}"> <i class="fas fa-arrow-right"></i>Nông sản tươi</a>
        <a href="{{URL::to('/danh-muc-san-pham-si/'.$cate_product_si->category_id)}}"> <i class="fas fa-arrow-right"></i>Sĩ nông sản</a>
        <a href="{{URL::to('/gioi-thieu')}}"> <i class="fas fa-arrow-right"></i> Giới thiệu</a>
        <a href="{{URL::to('/lien-he')}}"> <i class="fas fa-arrow-right"></i> Liên hệ</a>
      
    </div>

    <div class="box">
        <h3>Về chúng tôi</h3>
        <a href="#"> <i class="fas fa-arrow-right"></i>LBA cung cấp Nông sản, đặc sản vùng miền Sạch - Chuẩn - Chất</a>
        <a href="#"> <i class="fas fa-arrow-right"></i>Chi Nhánh TP. Hồ Chí Minh: 62 đường 21, P8, Q.Gò Vấp, Tp.HCM </a>
        <a href="#"> <i class="fas fa-arrow-right"></i>Số điện thoại: 083 960 7053 </a>
        <a href="#"> <i class="fas fa-arrow-right"></i>Email: sales.m@langbiangagri.com </a>
    
    </div>

    <div class="box">
        <h3>Theo dõi chúng tôi</h3>
        <a href="https://www.facebook.com/truyen.phan.7161953"> <i class="fab fa-facebook-f"></i> facebook </a>
        <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
        <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
        <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
        <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
    </div>

    <div class="box">
        <h3>Bản tin</h3>
        <p>Đăng ký để cập nhật mới nhất</p>
        <form action="">
            <input type="email" placeholder="Nhập email của bạn">
            <input type="submit" value="Đặt mua" class="btn">
        </form>
        <img src="image/payment.png" class="payment" alt="">
    </div>

</div>

</section>

<section class="credit">Được tạo bởi mr.cat nhà thiết kế web| Đã đăng ký Bản quyền!</section>
@endsection