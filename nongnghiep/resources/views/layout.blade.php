<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | NongNghiep</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('css/set.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('font-awesome/css/font-awesome.min.css')}}" />
    <!-- <link href="{{asset('css/animate.css')}}" rel="stylesheet"> -->
    <!-- <link href="{{asset('css/stt.css')}}" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet"> -->
    <!-- @php
                     $current_url=Request::url();
                    
                    @endphp
    <meta property="og:url"           content="$current_url" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Your Website Title" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" /> -->
      <!-- @php
                     $current_url=Request::url();
                    
                    @endphp
<meta property="og:url"           content="{{$current_url}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Your Website Title" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" /> -->
   
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"/>	
    
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/sweetalert.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/css2/style.css')}}">
    <!-- <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css">
   
    <link rel="shortcut icon" href="{asset{('images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
</head>
<!--/head-->

<style>
.add{
    width: 37px;
}


</style>
<body>
<header class="header">


    <a href="{{URL::to('trangchu')}}" class="logo"> <img class="add" src="{{asset('images/home/1200x1200.gif')}}" alt=""> Nông Nghiệp</a>

    <nav class="navbar">
        <a href="{{URL::to('trangchu')}}">TRANG CHỦ</a>
       
        
            <div class="header-2">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="{{URL::to('/danh-muc-san-pham-all')}}" role="button" id="dropdownMenuLink"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    
                     THỰC PHẨM CÔNG NGHỆ
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach($category as $key => $cate)
                        <li><a class="dropdown-item"
                                href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a>
                        </li>

                        @endforeach

                       

                    </ul>
                </div>


            </div>
      

        <a href="{{URL::to('/danh-muc-san-pham/'.$cate_product_tuoi->category_id)}}">NÔNG SẢN TƯƠI</a>  
        <a href="{{URL::to('/danh-muc-san-pham-si/'.$cate_product_si->category_id)}}"> SỈ NÔNG SẢN</a>
        <!-- <a href="{{URL::to('/gioi-thieu')}}">GIỚI THIỆU</a>
    -->
        
        <!-- <a href="{{URL::to('/kien-thuc')}}">KIẾN THỨC</a> -->
        <a href="{{URL::to('/lien-he')}}">LIÊN HỆ</a>
    </nav>

    <div class="icons row">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="search-btn" class="fas fa-search"></div>
        @if(Session::get('cart')==true)
        @php
        $z=0;
        @endphp
        @foreach(Session::get('cart') as $key =>$va)
        @php
        $z++;
        @endphp
        @endforeach
      
        <a href="{{URL::to('/gio-hang')}}" > <div id="cart-btn" class="fas fa-shopping-cart">{{$z}}</div></a>
        @else
        <a href="{{URL::to('/gio-hang')}}" > <div id="cart-btn" class="fas fa-shopping-cart"></div></a>
        @endif
       
        <?php
         $customer_id= Session::get('customer_id');
        if($customer_id ==NULL) {
        
        ?>
        <div id="login-btn" class="fas fa-user"></div>

        <?php }else{ ?>
            
               
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?php
                          $name =Session::get('customer_name');


                              if( $name){
                  
                             echo ucfirst($name);
                            
                            }
   
                       ?>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li class="nav-item"><a class="btn btn-outline-success"
                                href="{{URL::to('/xem-laigio/'.$customer_id)}}">Quản lí đơn hàng</a>
                       
                        </li>
                        <li><a class="btn btn-outline-success dropdown-item"
                                href="{{URL::to('/logout-checkout')}}"><i class="fa fa-log-in" aria-hidden="true"></i>Đăng Xuất</a>
                        </li>

                      


                    </ul>
                </div>
                <?php } 
                ?>


            
    </div>
   
    <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>   <?php
        $name =Session::get('mes');
    if( $name){
        echo '<span class="text-alert">'.$name.'</span>';
        Session::put('mes',null);

    }
   
   ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <form action="{{URL::to('/tim-kiem')}}" class="search-form" method="post">
      @csrf   
        <input type="search" name="tukhoa" placeholder="search here..." id="search-box">
        <label for="search-box" class="fas fa-search"></label>
    </form>

    <!-- <div class="shopping-cart">
        <div class="box">
            <i class="fas fa-times"></i>
            <img src="image/cart-1.jpg" alt="">
            <div class="content">
                <h3>organic food</h3>
                <span class="quantity">1</span>
                <span class="multiply">x</span>
                <span class="price">$18.99</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-times"></i>
            <img src="image/cart-2.jpg" alt="">
            <div class="content">
                <h3>organic food</h3>
                <span class="quantity">1</span>
                <span class="multiply">x</span>
                <span class="price">$18.99</span>
            </div>
        </div>
        <div class="box">
            <i class="fas fa-times"></i>
            <img src="image/cart-3.jpg" alt="">
            <div class="content">
                <h3>organic food</h3>
                <span class="quantity">1</span>
                <span class="multiply">x</span>
                <span class="price">$18.99</span>
            </div>
        </div>
        <h3 class="total"> total : <span>56.97</span> </h3>
        <a href="#" class="btn">checkout cart</a>
    </div> -->

    <form action="{{URL::to('/login-customer')}}" class="login-form" method="post">
        @csrf  
        <h3>ĐĂNG NHẬP</h3>
      
        <input type="email" name="customer_email"  placeholder="Nhập email của bạn" class="box" >
        <p class="alert-danger">{{$errors->first('customer_email')}}</p>
        <input type="password" name="customer_password"    placeholder="Nhập mật khẩu của bạn" class="box">
        <p class="alert-danger">{{$errors->first('customer_password')}}</p>
        <div class="remember">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me">Nhớ tôi</label>
        </div>
        <input type="submit" value="Đăng nhập" class="btn">
        <p>Quên mật khẩu?<a href="#">Bấm vào đây</a></p>
        <p>Chưa có tài khoản? <a href="{{URL::to('/dang-ki')}}">Tạo tài khoản</a></p>
    </form>

</header>









    




    <!--/slider-->
    
        @yield('contentt')

        
        @yield('cont')

       




   
    

      @yield('content')
      @yield('contenttt')

     @yield('con')


     

     <div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


    <!--/Footer-->
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0" nonce="grIcHPoK"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0" nonce="f4r94gHm"></script>
   

    <script type="text/javascript" src="{{asset('js/jquery-1.10.2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('js/price-range.js')}}"></script>
    <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/a.js')}}"></script>
    <!-- <script src="{{asset('js/sweetalert.min.js')}}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
     <!-- <script src="https://code.jquery.com/jquery.js"></script>  -->
   
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>     -->
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> hu nut keo -->
	<!-- <script type="text/javascript" src="{{asset('js/jquery.validate.js')}}"></script> -->
    <script>
        function view(){
            if(localStorage.getItem('data')!=null){
                var data =JSON.parse(localStorage.getItem('data'));
                data.reverse();
                document.getElementById('row_wishlist').style.overflow ='scroll';
                 document.getElementById('row_wishlist').style.height='385px';
                for(i=0;i<data.length;i++){
                    // $("#row_wishlist").append('truyen');
                    var name=data[i].name;
                    var price=data[i].price;
                    var imge=data[i].imge;
                    var url=data[i].url;
                    $("#row_wishlist").append('<div > <a href="'+url+'" class="list-group-item  btn-outline-success"> <div class="hinh row"> <div class="col-sm-4"><img src="'+imge+'" width="130%" alt=""> </div> <div class="col-sm-8"><h4>'+name+'</h4> <h5>'+price+'</h5> </div> </div> </a></div>');
                }

            }

        }
        view();

        function add_wistlist(clicked_id){
        var id=clicked_id;
         var name=document.getElementById('wishlist_productname'+id).value;
        var price=document.getElementById('wishlist_productprice'+id).value;
        var imge=document.getElementById('wishlist_productimage'+id).src;
        var url=document.getElementById('wishlist_producturl'+id).href;

            // alert(id);
            // alert(name);
            // alert(price);
            // alert(imge);
            //  alert(url);
            var newItem={
                'url':url,
                'id':id,
                'name':name,
                'price':price,
                'imge':imge
            }
            if(localStorage.getItem('data')==null){
                localStorage.setItem('data','[]');
            }
            var old_data=JSON.parse(localStorage.getItem('data'));
           
            
            var matches =$.grep(old_data,function(obj){
                return obj.id==id;
            })
            if(matches.length){
                swal("Sản phẩm bạn đã yêu thích ròi, nên không thể thêm")
              
            }else{
                swal("Đã thêm vào sản phẩm yêu thích của bạn")
                old_data.push(newItem);
                $("#row_wishlist").append('<div > <a href="'+newItem.url+'" class="list-group-item  btn-outline-success"> <div class="hinh row"> <div class="col-sm-4"><img src="'+newItem.imge+'" width="130%" alt=""> </div> <div class="col-sm-8"><h4>'+newItem.name+'</h4> <h5>'+newItem.price+'</h5> </div> </div> </a></div>');
             

            }
            localStorage.setItem('data',JSON.stringify(old_data));
        
            }
        </script> 
    <script>
    $.validator.setDefaults({
			submitHandler: function () {
                
                
                
                
                alert("submitted!");}
		
        
        
        
            });
		$(document).ready(function () {
			$("#signupForm").validate({
				rules: {
					firstname: "required",
					lastname: "required",
					username: { required: true, minlength: 2},
					password: { required: true, minlength: 5},
					confirm_password: { required: true, minlength: 5, equalTo: "#password"},
					email: { required: true, email: true},
					agree: "required"
				},
				messages: {
					firstname: "Bạn chưa nhập họ của bạn",
					lastname: "Bạn chưa nhập tên của bạn",
					username: {
						required: "Bạn chưa nhập vào tên đăng nhập",
						minlenght: "Tên đăng nhập phải có ít nhất 2 kí tự",
					},
					password: {
						required: "Bạn chưa nhập mật khẩu",
						minlenght: "Mật khẩu phải có ít nhất 5 kí tự",
					},
					confirm_password: {
						required: "Bạn chưa nhập mật khẩu",
						minlenght: "Mật khẩu phải có ít nhất 5 kí tự",
						equalTo: "Mật khẩu  không trùng khớp với mật khẩu đã nhập"
					},
					email: "Hộp thư điện tử không hợp lệ",
					agree: "Bạn phải đồng ý với các quy định của chúng tôi"

				},
				errorElement: "div",
				errorPlacement: function (error, element){
					error.addClass("invalid-feedback");
					if (element.prop("type") === "checkbox"){
						error.insertAfter(element.siblings("lable"));
					}else{
						error.insertAfter(element);
					}
				},
				highlight: function (element, errorClass, validClass) {
					$(element).addClass("is-invalid").removeClass("is-invalid");
				},
				unhighlight: function (element, errorClass, validClass) {
					$(element).addClass("is-invalid").removeClass("is-invalid");
				}
			});
		});
        </script>
 <script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>

<script>
jQuery(document).ready(function() {
        
	jQuery('.carousel[data-type="multi"] .item').each(function(){
		var next = jQuery(this).next();
		if (!next.length) {
			next = jQuery(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo(jQuery(this));
	  
		for (var i=0;i<2;i++) {
			next=next.next();
			if (!next.length) {
				next = jQuery(this).siblings(':first');
			}
			next.children(':first-child').clone().appendTo($(this));
		}
	});
        
});
</script> 
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script>





  $( function() {
    $("#slider-range").slider({
      orientation: "horizontal",
      range: true,
      min:{{$min_pri}},
      max:{{$max_pric}},
      values:[{{$min_pri}},{{$max_pri}}],
      step:10,
      slide:function( event, ui ) {
        $("#amount").val( + ui.values[0] +"đ"+ " - " + ui.values[1]+"đ");
        $("#start_price" ).val(ui.values[ 0 ]);
        $("#end_price" ).val(ui.values[ 1 ]);
      }
    });                 
    $("#amount").val(  $("#slider-range").slider("values",0 )+ "đ-" +
       $("#slider-range").slider("values",1)+"đ");
  } );
  </script>
    
    
  
    
    <script type="text/javascript">
    $(document).ready(function() {
        $('.add-to-cart').click(function() {
            $('.add-to-cart').click(function() {
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_price_cost = $('.cart_price_cost_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                // alert(cart_price_cost);
                //  alert(cart_product_id);
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'post',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_price_cost:cart_price_cost,
                        cart_product_qty: cart_product_qty,
                        _token: _token
                    },
                    success: function() {

                       
  
                           swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });

                    }



                })


            })

        })

    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {

        fetch_delivery();

        function fetch_delivery() {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url('/select-feeship')}}',
                method: 'POST',
                data: {
                    _token: _token
                },
                success: function(data) {
                    $('#load_delivery').html(data);
                }
            });
        }

        $('.add_delivery').click(function() {

            var city = $('.city').val();
            var province = $('.province').val();
            var wards = $('.wards').val();
            var fee_ship = $('.fee_ship').val();
            var _token = $('input[name="_token"]').val();
            //    alert(city);
            //    alert(province);
            //    alert(wards);
            //    alert(fee_ship);
            $.ajax({
                url: '{{url('/insert-delivery-home')}}',
                method: 'POST',
                data: {
                    city: city,
                    province: province,
                    _token: _token,
                    wards: wards,
                    fee_ship: fee_ship
                },
                success: function(data) {
                    fetch_delivery();
                }
            });


        });
        $('.choose').on('change', function() {
            var action = $(this).attr('id'); //lay id
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            //  alert(ma_id);
            //   alert(_token);

            if (action == 'city') {
                result = 'province';
            } else {
                result = 'wards';
            }
            $.ajax({ //gui ddi
                url: '{{url('/select-delivery')}}',
                method: 'POST',
                data: {
                    action: action,
                    ma_id: ma_id,
                    _token: _token
                },
                success: function(data) {
                    $('#' + result).html(data);
                }
            });
        });
    })
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.calculate_delivery').click(function() {
            var matp = $('.city').val(); //cac cai class
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if (matp == '' && maqh == '' && xaid == '') {
                alert('Làm ơn chọn để tính phí vận chuyển');
            } else {
                $.ajax({
                    url:'{{url('/calculate-fee')}}',
                    method: 'POST',
                    data: {
                        matp: matp,
                        maqh: maqh,
                        xaid: xaid,
                        _token: _token
                    },
                    success: function() {
                        location.reload();
                    }
                });
            }
        });
    });
    </script>
     <script type="text/javascript">
    $(document).ready(function() {
        $('.calculate_deliver').click(function() {
            var id = $(this).data('diachi_id');
            var diachi_id = $('.diachi_id_' + id).val();
           var shipping_name= $('.shipping_name_' + id).val();
           var shipping_email= $('.shipping_email_' + id).val();
           var shipping_phone= $('.shipping_phone_' + id).val();
           var shipping_address=$('.shipping_address_' + id).val();
           var city=$('.city_' + id).val();
           var province=$('.province_' + id).val();
           var wards=$('.wards_' + id).val();
           var name_city=$('.name_city_' + id).val();
           var name_quanhuyen=$('.name_quanhuyen_' + id).val();
           var name_xaphuong=$('.name_xaphuong_' + id).val();
           var feeship=$('.feeship_' + id).val();
          
          

            var _token = $('input[name="_token"]').val();
          
            // alert(name_xaphuong);
            // alert(name_quanhuyen);
            // alert(name_city)
            // alert(shipping_address)

            

            
           
            $.ajax({
                    url:'{{url('/calculate-feee')}}',
                    method:'POST',
                    data: {
                        diachi_id:diachi_id,
                        shipping_name:shipping_name,
                        shipping_email:shipping_email,
                        shipping_phone:shipping_phone,
                        shipping_address:shipping_address,
                        city:city,
                        province:province,
                        wards:wards,
                        feeship:feeship,
                        name_city:name_city,
                        name_quanhuyen:name_quanhuyen,
                        name_xaphuong: name_xaphuong,








                        _token: _token
                    },
                    success: function() {
                        alert('Thêm địa chỉ thành công')
                        location.reload();
                    }
                });
            
        });
    });
    </script>
    <script type="text/javascript">
     $(document).ready(function() {
        $('#sorf').on('change',function() {
            var url = $(this).val(); //cac cai class
           
            if(url){
                window.location=url;//requet lai trang voi duong dan nay

            }
           return false;
          
          
        });
    });
    </script>
     <script type="text/javascript">
     $(document).ready(function() {
        $('#sor').on('change',function() {
            var url = $(this).val(); //cac cai class
           
            if(url){
                window.location=url;//requet lai trang voi duong dan nay

            }
           return false;
          
          
        });
    });
    </script>
    
    <script type="text/javascript">
        function  remove_background(product_id){
            for(var count =1;count<=5;count++){
                $('#'+product_id+'-'+count).css('color','#ccc');

            }
        }
       

       $(document).on('mouseenter','.rating',function() {
        var index=$(this).data("index");
        var product_id=$(this).data('product_id');
        remove_background(product_id);
        for(var count =1;count<=index;count++){
            $('#'+product_id+'-'+count).css('color','#ffcc00');
        }
       }
       );
       $(document).on('mouseleave','.rating',function() {
        var index=$(this).data("index");
        var product_id=$(this).data('product_id');
        var rating=$(this).data('rating');
        remove_background(product_id);
        for(var count =1;count<=rating;count++){
            $('#'+product_id+'-'+count).css('color','#ffcc00');
        }
       }
       );
       $(document).on('click','.rating',function() {
        var index=$(this).data("index");
        var product_id=$(this).data('product_id');
        var _token = $('input[name="_token"]').val();
        $.ajax({
                url:'{{url('/insert-rating')}}',
                method: 'post',
                data: {
                    index:index,
                    product_id: product_id,
                    _token: _token
                   
                },
                success: function(data) {
                    if(data=='done')
                    swal("Đánh giá sao thành công!", "Click ok để thoát!", "success");
                }
            });
        });
    



        </script>


<script>
$('input.input-qty').each(function() {
  var $this = $(this),
    qty = $this.parent().find('.is-form'),
    min = Number($this.attr('min')),
    max = Number($this.attr('max'))
  if (min == 0) {
    var d = 0
  } else d = min
  $(qty).on('click', function() {
    if ($(this).hasClass('minus')) {
      if (d > min) d += -1
    } else if ($(this).hasClass('plus')) {
      var x = Number($this.val()) + 1
      if (x <= max) d += 1
    }
    $this.attr('value', d).val(d)
  })
})
</script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.send_order').click(function() {
            var shipping_email = $('.shipping_emai').val();
            var shipping_name = $('.shipping_nam').val();
            var shipping_address = $('.shipping_addres').val();
            var shipping_phone = $('.shipping_phon').val();
            var shipping_notes = $('.shipping_notes').val();
            var shipping_method = $('.payment_select').val();
            var order_fee = $('.order_fee').val();
            var order_coupon = $('.order_coupon').val();
            
           var shipping_city=$('.shipping_city').val();
           var shipping_huyen=$('.shipping_huyen').val();
           var shipping_xa=$('.shipping_xa').val();

            var _token = $('input[name="_token"]').val();
            // alert(order_fee);

          if(order_fee==10000){
            alert("Làm ơn chọn địa chỉ giao hàng")
          }
          else{


            $.ajax({
                url:'{{url('/confirm-order')}}',
                method:'post',
                data: {
                    shipping_email: shipping_email,
                    shipping_name: shipping_name,
                    shipping_address: shipping_address,
                    shipping_phone: shipping_phone,
                    shipping_notes: shipping_notes,
                   
                    shipping_method: shipping_method,
                    order_coupon: order_coupon,
                    shipping_city:shipping_city,
                    shipping_huyen:shipping_huyen,
                    shipping_xa:shipping_xa,
                    order_fee: order_fee,
                    _token: _token
                },
                success: function() {
                   
                    alert('Gửi đơn hàng thành công')
                    location.reload();
                }
            });

           }


        });
    });
    </script>
    <script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
  });
});
</script>
<script>
$(document).ready(function(){
  $("#myBttn").click(function(){
    $("#myModa").modal();
  });
});
</script>
   
   <script src="jss/script.js"></script>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

</html>