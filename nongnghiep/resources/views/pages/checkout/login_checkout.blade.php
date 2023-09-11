@extends('layout')<!--lay theo ten day la phan morong cua welcom-->

@section('content')<!--lay noi dung-->

<div class="header-2">
    <div class="col-sm-12">

        <div class="hinhnen">
            <h2 class="title text-center-left"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="20"
                    fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path
                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                </svg>Dang ki tai khoan</h2>
        </div>
   
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>dang nhap</h2>
						<form action="{{URL::to('/login-customer')}}" method="post">
						@csrf
							<input type="email" name="email_acount" placeholder="Email Address" />
                            <input type="password" name="password_acount" placeholder="mat khau" />
							<span>
								<input type="checkbox" class="checkbox"> 
								ghi nho toi
							</span>
							<button type="submit" class="btn btn-default">dang nhap</button>
						</form>
					</div><!--/login form-->
				</div>
				
				
				
			</div>
		</div>
	





@endsection