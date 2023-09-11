@extends('layout')
<!--lay theo ten day la phan morong cua welcom-->
@section('content')
<div class="heading">
    <h1>Nông Sản Langbian</h1>
   
</div>

<section class="contact">
<h4> <a href="{{URL::to('trangchu')}}">Trang chủ >></a> Liên hệ </h4>

    <div class="icons-container">

        <div class="icons">
            <i class="fas fa-phone"></i>
            <h3>Số của chúng tôi</h3>
            <p>0834563780</p>
            <p>0923456378</p>
        </div>

        <div class="icons">
            <i class="fas fa-envelope"></i>
            <h3>email của chúng tôi</h3>
            <p>nongsanlangbian.gmail.com</p>
            <p>Phantritruyen@gmail.com</p>
        </div>

        <div class="icons">
            <i class="fas fa-map-marker-alt"></i>
            <h3>Địa chỉ của chúng tôi</h3>
            <p>Thành phố hồ chí minh</p>
        </div>

    </div>

    <div class="row">

        <form action="">
            <h3>Liên lạc</h3>
            <div class="inputBox">
                <input type="text" placeholder="nhập tên của bạn" class="box">
                <input type="email" placeholder="nhập email của bạn" class="box">
            </div>
            <div class="inputBox">
                <input type="number" placeholder="nhập số của bạn" class="box">
                <input type="text" placeholder="nhập chủ đề của bạn" class="box">
            </div>
            <textarea placeholder="your message" cols="30" rows="10"></textarea>
            <input type="submit" value="gửi tin nhắn" class="btn">
        </form>

        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30153.788252261566!2d72.82321484621745!3d19.141690214227783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b63aceef0c69%3A0x2aa80cf2287dfa3b!2sJogeshwari%20West%2C%20Mumbai%2C%20Maharashtra%20400047!5e0!3m2!1sen!2sin!4v1633968347413!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>

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
            <input type="submit" value="đặt mua" class="btn">
        </form>
        <img src="image/payment.png" class="payment" alt="">
    </div>

</div>

</section>

<section class="credit">Được tạo bởi mr.cat nhà thiết kế web| Đã đăng ký Bản quyền!</section>
@endsection