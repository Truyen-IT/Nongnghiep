@extends('layout')
<!--lay theo ten day la phan morong cua welcom-->

@section('content')


<section class="products  pen ">

    
    
    

    <div class="row">
    <h1 class="ass">SẢN PHẨM:"{{$keywords}}"</h1>
      <div class="col-sm-12">
   
         <div class="box-container container">
        
                
        @foreach($search as $key => $pro)
        <div class="box">
           


            <form>
                @csrf
                <input type="hidden" value="{{$pro->product_id}}" class="cart_product_id_{{$pro->product_id}}">
                <input type="hidden" value="{{$pro->product_name}}" class="cart_product_name_{{$pro->product_id}}">
                <input type="hidden" value="{{$pro->product_image}}" class="cart_product_image_{{$pro->product_id}}">
                <input type="hidden" value="{{$pro->product_price}}" class="cart_product_price_{{$pro->product_id}}">
                <input type="hidden" value="{{$pro->price_cost}}" class="cart_price_cost_{{$pro->product_id}}">
                <input type="hidden" value="1" class="cart_product_qty_{{$pro->product_id}}">


                <div class="icons">
                    
                

                            <button type="button" class="add-to-cart" data-id_product="{{$pro->product_id}}"
                                name="add-to-cart"><a class="fas fa-shopping-cart"></a></button>

                    <a href="#" class="fas fa-heart"></a>
                    <a href="{{URL::to('chi-tiet-san-pham/'.$pro->product_id)}}" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="{{URL::to('upload/'.$pro->product_image)}}" alt="">
                </div>
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
                     @for($count=1;$count<=5;$count++) 
                     @php 
                       if($count<=$result){
                            $color='color:#ff7f00;' ; } 
                            
                            else{ $color='color:#cccccc;' ; }
                            
                    @endphp 
                    <i style="cursor:pointer; {{$color}}" class="fas fa-star"></i>

                     @endfor

                  
                        
                    </div>
                </div>

            </form>
           
        </div>
      
        @endforeach





            </div>
           
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

























