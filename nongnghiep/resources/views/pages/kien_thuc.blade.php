@extends('layout')
<!--lay theo ten day la phan morong cua welcom-->
@section('contentt')

<div class="heading">
    <h1>NÔNG NGHIÊP</h1>
    <p> <a href="{{URL::to('trangchu')}}">TRANG CHỦ >></a> KIẾN THỨC </p>
   
</div>

<section class="blogs">

    <h1 class="title"> CHÚNG TÔI <span>KIẾN THỨC</span> <a href="#">Xem tất cả >></a> </h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src=" {{asset('images/image/blog-1.jpg')}}" alt="">
            </div>
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i> 21-5-2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> bởi quản trị viên </a>
                </div>
                <h3>tiêu đề blog ở đây</h3>
                <p>Lorem Ipsum Chỉ Đơn Giản Là Một Đoạn Văn Bản Giả, Được Dùng Vào Việc Trình Bày Và Dàn Trang Phục Vụ Cho In Ấn.</p>
                <a href="#" class="btn">đọc thêm</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="{{asset('images/image/blog-2.jpg')}}" alt="">
            </div>
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i> 21-5-2021 </a>
                    <a href="#"> <i class="fas fa-user"></i>bởi quản trị viên </a>
                </div>
                <h3>tiêu đề blog ở đây</h3>
                <p>Lorem Ipsum Chỉ Đơn Giản Là Một Đoạn Văn Bản Giả, Được Dùng Vào Việc Trình Bày Và Dàn Trang Phục Vụ Cho In Ấn.</p>
                <a href="#" class="btn">đọc thêm</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="{{asset('images/image/blog-3.jpg')}}" alt="">
            </div>
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i> 21-5-2021 </a>
                    <a href="#"> <i class="fas fa-user"></i>bởi quản trị viên </a>
                </div>
                <h3>tiêu đề blog ở đây</h3>
                <p>Lorem Ipsum Chỉ Đơn Giản Là Một Đoạn Văn Bản Giả, Được Dùng Vào Việc Trình Bày Và Dàn Trang Phục Vụ Cho In Ấn.</p>
                <a href="#" class="btn">đọc thêm</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="{{asset('images/image/blog-4.jpg')}}" alt="">
            </div>
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i>21-5-2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> bởi quản trị viên</a>
                </div>
                <h3>tiêu đề blog ở đây</h3>
                <p>Lorem Ipsum Chỉ Đơn Giản Là Một Đoạn Văn Bản Giả, Được Dùng Vào Việc Trình Bày Và Dàn Trang Phục Vụ Cho In Ấn.</p>
                <a href="#" class="btn">đọc thêm</a>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="{{asset('images/image/blog-5.jpg')}}" alt="">
            </div>
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i>21-5-2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> bởi quản trị viên</a>
                </div>
                <h3>tiêu đề blog ở đây</h3>
                <p>Lorem Ipsum Chỉ Đơn Giản Là Một Đoạn Văn Bản Giả, Được Dùng Vào Việc Trình Bày Và Dàn Trang Phục Vụ Cho In Ấn.</p>
                <a href="#" class="btn">đọc thêm</a>
            </div>
        </div>
        <div class="box">
            <div class="image">
                <img src="{{asset('images/image/blog-6.jpg')}}" alt="">
            </div>
            <div class="content">
                <div class="icons">
                    <a href="#"> <i class="fas fa-calendar"></i>21-5-2021 </a>
                    <a href="#"> <i class="fas fa-user"></i> bởi quản trị viên</a>
                </div>
                <h3>tiêu đề blog ở đây</h3>
                <p>Lorem Ipsum Chỉ Đơn Giản Là Một Đoạn Văn Bản Giả, Được Dùng Vào Việc Trình Bày Và Dàn Trang Phục Vụ Cho In Ấn.</p>
                <a href="#" class="btn">đọc thêm</a>
            </div>
        </div>

     

    </div>

</section>



@endsection