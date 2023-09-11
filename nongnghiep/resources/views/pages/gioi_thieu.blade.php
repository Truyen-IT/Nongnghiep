@extends('layout')
<!--lay theo ten day la phan morong cua welcom-->
@section('content')
<div class="heading">
    <h1>Nông Sản Langbian</h1>
   
</div>

<section class="about">


    <div class="image">
        <img src="{{asset('images/image/about-img.jpg')}}" alt="">
    </div>

    <div class="content">
       <h4> <a href="{{URL::to('trangchu')}}">Trang chủ >></a> Giới thiệu </h4>
        <span>chào mừng bạn đến cửa hàng của chúng tôi</span>
        <h3>cửa hàng thực phẩm công nghệ và nông sản tươi</h3>
        <p>Nhằm tạo điều kiện thuận lợi cho khách hàng mua sản phẩm Nước cốt sâm dây Ngọc Linh Langbiang Food và các sản phẩm thực phẩm công nghệ của Nông sản LangBiang: Trà hoa, trà OO long, Cà phê, Trái cây sấy lạnh, nước cốt, bột rau củ..... Quý khách có thể mua tại hệ thống ONINE, bao gồm: website, shopee, lazada, tiki....hoặc mua trực tiếp tại hơn 350 cửa hàng, đại lý, hệ thống nhà thuốc trên toàn quốc..</p>
        
        <a href="#" class="btn">Đọc thêm</a>
    </div>

</section>

<section class="gallery">

    <h2 class="title">Giới thiệu<span></span> <a href="#"></a> </h2>

    <div class="box-container">

        <div class="box">
            <img src="{{asset('images/image/gallery-img-1.jpg')}}" alt="">
            <div class="icons">
                <a href="#" class="fas fa-eye"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share-alt"></a>
            </div>
        </div>

        <div class="box">
            <img src="{{asset('images/image/gallery-img-2.jpg')}}" alt="">
            <div class="icons">
                <a href="#" class="fas fa-eye"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share-alt"></a>
            </div>
        </div>

        <div class="box">
            <img src="{{asset('images/image/gallery-img-3.jpg')}}" alt="">
            <div class="icons">
                <a href="#" class="fas fa-eye"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share-alt"></a>
            </div>
        </div>

        <div class="box">
            <img src="{{asset('images/image/gallery-img-4.jpg')}}" alt="">
            <div class="icons">
                <a href="#" class="fas fa-eye"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share-alt"></a>
            </div>
        </div>

        <div class="box">
            <img src="{{asset('images/image/gallery-img-5.jpg')}}" alt="">
            <div class="icons">
                <a href="#" class="fas fa-eye"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share-alt"></a>
            </div>
        </div>

        <div class="box">
            <img src="{{asset('images/image/gallery-img-6.jpg')}}" alt="">
            <div class="icons">
                <a href="#" class="fas fa-eye"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share-alt"></a>
            </div>
        </div>

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