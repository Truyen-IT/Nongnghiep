@extends('layout')
<!--lay theo ten day la phan morong cua welcom-->

@section('content')
<style>
div .a{
    font-weight: bold;
    font-size: 20px;

}
div .b{
    font-weight: bold;
    font-size: 17px;

}
div .c{
    font-size: 17px;
}
.ds{
    padding-top: 5px;
}
.d{
    padding-left: 15px;
    padding-bottom: 12px;
}
    
</style>
<section class="dev">

    <div class="container">
        @foreach($detail_product as $key =>$de)
        <form>
            @csrf
            <input type="hidden" value="{{$de->product_id}}" class="cart_product_id_{{$de->product_id}}">
            <input type="hidden" value="{{$de->product_name}}" class="cart_product_name_{{$de->product_id}}">
            <input type="hidden" value="{{$de->product_image}}" class="cart_product_image_{{$de->product_id}}">
            <input type="hidden" value="{{$de->product_price}}" class="cart_product_price_{{$de->product_id}}">
            <input type="hidden" value="{{$de->price_cost}}" class="cart_price_cost_{{$de->product_id}}">
            <input type="hidden" value="1" class="cart_product_qty_{{$de->product_id}}">
            <h4 class="me"><a href="{{URL::to('trangchu')}}">Trang chủ</a>>><a
                            href="{{URL::to('danh-muc-san-pham/'.$de->category_id)}}">{{$de->category_name}}</a>>>{{$de->product_name}}
                    </h4>
            <div class="row container">
                
                <div class="col-sm-4">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 container">

                                <div class="list-group border">
                                    <a href="#" class="list-group-item active ">
                                        <h3>Danh mục sản phẩm</h3>
                                    </a>
                                    @foreach($category as $key => $cate)




                                    <a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}"
                                        class="list-group-item  btn-outline-success">
                                        <h4>{{$cate->category_name}}</h4>
                                    </a>
                                    @endforeach
                                </div>



                            </div>
                            
                    
                   


                        </div>
                       
                    </div>
                    <div class="container-fluid">
                        
                    <div class="list-group border ac">
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
                                            <div class="col-sm-4"><img src="{{URL::to('upload/'.$ca->product_image)}}" width="130%" alt=""> </div>
                                         
                                         <div class="col-sm-8">
                                            <h4>{{$ca->product_name}}</h4>
                                            <h5>{{number_format($ca->product_price).'','đ'}}đ</h5> </div>
                                        </div>  
                                    </a>
                                    @endif
                                    @endforeach
                                    @endforeach

                                    
                                </div>
                    
                    
                    
                    
                    <div class="row">
                            <div class="col-sm-12 container">

                               
                                    
                                   
                       <div class="row">

                         
                       
                     
                       

                   
                                   
                                       
                                  
                                  
                                </div>



                            </div>
                            
                    
                   


                        </div>
                       
                    </div>
                   
                   


                </div>

                <div class="row col">


                

                <div class="col-sm-7">
                    @foreach($lagery as $key =>$valua)



                    <div class="mySlides">

                        <img src="{{URL::to('upload/'.$valua->lagery_image)}}" width="100%" alt="" />
                    </div>



                    @endforeach
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                    <div class="caption-container">
                        <p id="caption"></p>
                    </div>

                    <div class="row">
                        @php
                        $i=0;
                        @endphp

                        @foreach($lagery as $key =>$valua)
                        @php
                        $i++;
                        @endphp

                        <div class="column produ">
                            <img class="demo cursor" src="{{URL::to('upload/'.$valua->lagery_image)}}"
                                style="width:100%;" onclick="currentSlide({{$i}})">

                        </div>








                        @endforeach
                    </div>



                </div>



                <div class="col-sm-4">
                    <h2 class="text-1">Chi tiết sản phẩm</h2>
                    <h2 class="text-1">{{$de->product_name}}.</h2>
                    <h4 class="text-2">{{$de->product_content}}</h4>
                  
                    <div class="row  text4">
                        <label class="text-3">Số lượng:&nbsp</label>
                        <input class="btn-lg text-3 form-control col-sm-4" type="number" name="qty" min="1" value="1" />
                       
                    </div>


                    
                @if($magiam->coupon_condition==2)
                    <div class="row tet ">
                        <h5 class="text-1" >Nhập mã:&nbsp </h5><h5 class="te">{{$magiam->coupon_code}}</h5>
                        <h5 class="">Giảm ngay:&nbsp{{ number_format($magiam->coupon_number).'.đ'}}</h5> 
                        <h5>Số lượng còn lại:&nbsp @if($magiam->coupon_time==0)
                            Hết mã giảm giá.
                           @else
                            {{$magiam->coupon_time}}
                             @endif</h5>
                    </div>
                    @else
                    <div class="row tet ">
                        <h5 class="text-1" >Nhập mã:&nbsp </h5><h5 class="te">{{$magiam->coupon_code}}</h5>
                        <h5 class="">Giảm ngay:&nbsp{{$magiam->coupon_number}}%</h5> 
                        <h5>Số lượng còn lại:&nbsp{{$magiam->coupon_time}}</h5>
                    </div>
                    @endif
                    <div>
                    @php
                     $current_url=Request::url();
                    
                    @endphp

                   
                
                </div>

                </div>
                
                <h1 class="text-2">Đánh Giá Sản Phẩm</h1>
                <div class="col-sm-12 content">

                @php

                @endphp
                <ul class=" text-1 row list-inline rating">

                    @for($count=1;$count<=5;$count++) @php if($count<=$rating){ $color='color:#ffcc00;' ; } else{
                        $color='color:#ccc;' ; } @endphp <li id="{{$de->product_id}}-{{$count}}" data-index="{{$count}}"
                        data-product_id="{{$de->product_id}}" data-rating="$rating" class="rating"
                        style="cursor:pointer; {{$color}} font-size:30px;">&#9733</li>
                        @endfor
                </ul>

            </div>
        </form>
   
    
            
            
                 
            
            </div>

            

            
            
            
                </div>
                <div class="container mt-3">
       
        <br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active " data-toggle="tab" href="#home">
                    <h4> Thông tin thực phẩm</h4>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#menu1">
                    <h4>Bình Luận</h4>
                </a>
            </li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            
            <div id="home" class=" tab-pane active"><br>
            @if($de->product_desc !=NULL)
                <p class="a">Công dụng sản phẩm:</p>
                <p class="c">&nbsp&nbsp{{$de->product_desc}}.</p>
                @endif
                @if($de->product_mota !=NULL)
                <p class="a">Mô tả sản phẩm:</p>
                <p class="c">&nbsp&nbsp{{$de->product_mota}}.</p>
                @endif
                @if($de-> product_thanhduong !=NULL)
                <p class="a">Thành phần dinh dưỡng:</p>
                <p class="c">&nbsp&nbsp{{$de->product_thanhduong}}.</p>
                @endif


                @if($de->product_thanhphan !=NULL)
                <div class="row d">
                <p class="b">Thành phần sản phẩm:</p> 
                <p class="c">&nbsp&nbsp{{$de->product_thanhphan}}.</p>
               </div>
               
               @endif
               @if($de->product_chungnhan !=NULL)
                <div class="row d">
                <p class="b">Chứng nhận:</p> 
                <p class="c">&nbsp{{$de-> product_chungnhan}}.</p>
               </div>
               
               @endif
               @if($de->product_chatluong !=NULL)
                <div class="row d">
                <p class="b">Chất lượng:</p> 
                <p class="c">&nbsp{{$de->product_chatluong}}.</p>
               </div>
               
               @endif
               @if($de->product_hdsd !=NULL)
               <div class="row d">
                <p class="b">HDSD:</p> 
                <p class="c">&nbsp{{$de->product_hdsd}}.</p>
               </div>
               @endif
               @if($de->product_baoquan !=NULL)
               <div class="row d">
                <p class="b">Bảo quản:</p> 
                <p class="c">&nbsp{{$de->product_baoquan}}.</p>
               </div>
               @endif
               @if($de->product_hsd !=NULL)
               <div class="row d">
                <p class="b">HDS:</p> 
                <p class="c">&nbsp{{$de->product_hsd}}.</p>
               </div>
               @endif
               @if($de->product_donggoi !=NULL)
               <div class="row d">
                <p class="b">Đóng gói:</p> 
                <p class="c">&nbsp{{$de->product_donggoi}}.</p>
               </div>
               @endif

               

               @if($de->product_thetichthuc !=NULL)
               <div class="row d">
                <p class="b">Thể tích thực:</p> 
                <p class="c">&nbsp{{$de->product_thetichthuc}}.</p>
               </div>
               @endif
               @if($de-> product_xuatxu !=NULL)
               <div class="row d">
                <p class="b">Xuất xứ:</p> 
                <p class="c">&nbsp{{$de->product_xuatxu}}.</p>
               </div>
               @endif
               @if($de-> product_muasi !=NULL)
               <div class="row d">
                <p class="b">Liên hệ mua sỉ:</p> 
                <p class="c">&nbsp{{$de->product_muasi}}.</p>
               </div>
               @endif
               @if($de->product_luuy !=NULL)
               <div class="row d">
                <p class="b">*LƯU Ý:</p> 
                <p class="c">&nbsp{{$de->product_luuy}}.</p>
               </div>
               @endif

            
           
            
            </div>
            <div id="menu1" class="container tab-pane fade"><br>


                <div class="">

                @php
                 $current_url=Request::url();
                 @endphp
                <div class="fb-comments" data-href="{{$current_url}}" data-width="100%" data-numposts="5"></div>
                   

            </div>

        </div>
    </div>
            
            
            
            
                </div>   
                 
       


</section>
@endforeach





<section class="products">

    <h1 class="title"><span>Sản Phẩm Cùng loại</span></h1>
    <div class="box-container">
        @foreach($relate_product as $key => $pro)
        <div class="box">
            <form>
                @csrf
                <input type="hidden" value="{{$pro->product_id}}" class="cart_product_id_{{$pro->product_id}}">
                <input type="hidden" id="wishlist_productname{{$pro->product_id}}" value="{{$pro->product_name}}" class="cart_product_name_{{$pro->product_id}}">
                <input type="hidden" value="{{$pro->product_image}}" class="cart_product_image_{{$pro->product_id}}">
                <input type="hidden" value="{{$pro->product_price}}" class="cart_product_price_{{$pro->product_id}}">
                <input type="hidden" value="{{$pro->price_cost}}" class="cart_price_cost_{{$pro->product_id}}">
                <input type="hidden" value="1" class="cart_product_qty_{{$pro->product_id}}">

                <input type="hidden"  id="wishlist_productprice{{$pro->product_id}}"  value="{{$pro->product_content}}"
                            class="cart_product_content_{{$pro->product_id}}">
                
                <div class="icons">
                    


                <button type="button"  class="add-to-cart" id="{{$pro->product_id}}" onclick="add_wistlist(this.id);"
                               > <a class="fas fa-heart"></a></button> 
                    <a  id="wishlist_producturl{{$pro->product_id}}" href="{{URL::to('chi-tiet-san-pham-si/'.$pro->product_id)}}" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img  id="wishlist_productimage{{$pro->product_id}}" src="{{URL::to('upload/'.$pro->product_image)}}" alt="">
                </div>
                <div class="content">
                    <h3>{{$pro->product_name}}</h3>
                    <h3>{{$pro->product_content}}</h3>
                 
                    <div class="stars">

                        @for($count=1;$count<=5;$count++) @php if($count<=$rating){ $color='color:#FF0000;' ; } else{
                            $color='color:#cccccc;' ; } @endphp <i style="cursor:pointer; {{$color}}"
                            class="fas fa-star"></i>

                            @endfor


                    </div>
                </div>

            </form>
        </div>

        @endforeach







    </div>





</section>





@endsection

@section('con')

<section class="footer">

<div class="box-container">

    <div class="box">
        <h3>đường dẫn nhanh</h3>
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
        <h3>theo dõi chúng tôi</h3>
        <a href="https://www.facebook.com/truyen.phan.7161953"> <i class="fab fa-facebook-f"></i> facebook </a>
        <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
        <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
        <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
        <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
    </div>

    <div class="box">
        <h3>bản tin</h3>
        <p>đăng ký để cập nhật mới nhất</p>
        <form action="">
            <input type="email" placeholder="Nhập email của bạn">
            <input type="submit" value="đặt mua" class="btn">
        </form>
    
    </div>

</div>

</section>

<section class="credit">được tạo bởi mr.cat nhà thiết kế web| Đã đăng ký Bản quyền!</section>
@endsection