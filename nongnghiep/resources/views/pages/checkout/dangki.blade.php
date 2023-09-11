@extends('layout')
<!--lay theo ten day la phan morong cua welcom-->

@section('content')
<div class="heading">
<h1>Nông sản Langbian</h1>

  
</div>






<section class="gallery">
<h4 class="cim" > <a href="{{URL::to('trangchu')}}">Trang chủ >></a> Đăng kí
    </h4>

    <div class="col-sm-12">



    <div class="container">
		<div class="row">
			<div class="col-sm-8 offset-sm-2">

				<div class="mt-2">
				
				</div>

				<div class="card">
					<div class="card-header">
						<h3>Đăng kí thành viên</h3>
					</div>
					<div class="card-body">
						<form  action="{{URL::to('/add-customer')}}" method="post" class="form-horizontal" >
                        @csrf
							

							

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="username">Tên đăng nhập</label>
								<div class="col-sm-5">
									<input type="text" autocomplete="off" class="form-control"  name="customer_name" placeholder="Tên đăng nhập" />
								 <p class="alert-danger">{{$errors->first('customer_name')}}</p></div>
                               
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="email">Hộp thư điện tử</label>
								<div class="col-sm-5">
									<input  type="text" autocomplete="off" class="form-control" id="email" name="customer_email" placeholder="Hộp thư điện tử" />
								 <p class="alert-danger">{{$errors->first('customer_email')}}</p></div>
                               
							</div>
                            <div class="form-group row">
								<label class="col-sm-4 col-form-label" for="email">Số điện thoại</label>
								<div class="col-sm-5">
									<input  type="text"  class="form-control" id="" name="customer_phone" placeholder="Số điện thoại" />
								 <p class="alert-danger">{{$errors->first('customer_phone')}}</p></div>
                               
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="password">Mật khẩu</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="customer_password" name="customer_password" placeholder="Mật khẩu" />
								 <p class="alert-danger">{{$errors->first('customer_password')}}</p></div>
                               
							</div>

							<div class="form-group row">
								<label class="col-sm-4 col-form-label" for="confirm_password">Nhập lại mật khẩu</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="customer_password_confirmation" name="customer_password_confirmation" placeholder="Nhập lại mật khẩu" />
                                    <p class="alert-danger">{{$errors->first('customer_password_confirmation')}}</p>
                                </div>
                               
							</div>

							

							<div class="row">
								<div class="col-sm-5 offset-sm-4">
									<button type="submit" class="btn btn-primary" name="signup" value="Sign up">Đăng ký</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div> <!-- Cột nội dung -->
		</div>
    
         <!-- <form action="{{URL::to('/add-customer')}}" method="post">
         @csrf
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label"><h2>Tên:</h2></label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control"  placeholder="Tên của ban">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label"><h2>Email:</h2>
                  </label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label"><h2>Số điện thoại:</h2></label>
                <div class="col-sm-10">
                    <input type="text" name="sodienthoai" class="form-control"  placeholder="Số điện thoại">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label"><h2>Mật khẩu:</h2></label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Nhập mật khẩu">
                </div>
            </div>


            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Đăng kí</button>
                </div>
            </div>
        </form> -->



        
            <!--sign up form-->
            <!-- <form action="{{URL::to('/add-customer')}}" method="post">
               
                <input type="text" name="name" placeholder="Name" />
                <input type="email" name="email" placeholder="Email Address" />
                <input type="password" name="password" placeholder="Password" />
                <input type="text" name="sodienthoai" placeholder="So dien thoai" />
                <button type="submit" class="btn btn-default">dang ki</button>
            </form> -->
        

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