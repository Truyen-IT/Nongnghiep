<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('css1/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('css1/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('css1/font.css')}}" type="text/css"/>
<link href="{{asset('css1/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('css1/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css1/monthly.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<!-- //calendar -->
<!-- //font-awesome icons -->


<script src="{{asset('js1/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('js1/raphael-min.js')}}"></script>
<script src="{{asset('js1/morris.js')}}"></script>

</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        NongNghiep
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->
        <!-- <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-tasks"></i>
                <span class="badge bg-success">8</span>
            </a>
            <ul class="dropdown-menu extended tasks-bar">
                <li>
                    <p class="">You have 8 pending tasks</p>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Target Sell</h5>
                                <p>25% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="45">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Product Delivery</h5>
                                <p>45% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="78">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Payment collection</h5>
                                <p>87% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="60">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="task-info clearfix">
                            <div class="desc pull-left">
                                <h5>Target Sell</h5>
                                <p>33% , Deadline  12 June’13</p>
                            </div>
                                    <span class="notification-pie-chart pull-right" data-percent="90">
                            <span class="percent"></span>
                            </span>
                        </div>
                    </a>
                </li>

                <li class="external">
                    <a href="#">See All Tasks</a>
                </li>
            </ul>
        </li> -->
        <!-- settings end -->
        <!-- inbox dropdown start-->
        
        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->
       
        <!-- notification dropdown end -->
    </ul>
    <!--  notification end -->
</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li> -->
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <?php
                if(Session::get('admin_name')){
                  $name =Session::get('admin_name');}
                  else{
               $name=Session::get('nhanvien_hoten');
                  }
              if( $name){
                $name1=substr($name,0,1);
             
                
                
       

              }
             ?> 
            @switch($name1)

    @case("N")
       <img alt="" src="{{asset('images/home/N.jpg')}}">
        @break

    @case("A")
      <img alt="" src="{{asset('images/home/a.jpg')}}">
        @break

    @default
    <img alt="" src="{{asset('images/home/P.png')}}">
    @endswitch
              

                <span class="username">
                <?php
                if(Session::get('admin_name')){
                  $name =Session::get('admin_name');}
                  else{
               $name=Session::get('nhanvien_hoten');
                  }
              if( $name){
               
    
              echo $name;
       

              }
   
               ?> 



                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Đăng Xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng Quan</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Đơn Hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manager-order')}}">Quản lí đơn hàng</a></li>
						
                        
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Mã Giảm Giá</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/insert-coupon')}}">Thêm mã giảm giá</a></li>
                        <li><a href="{{URL::to('/all-coupon')}}">Liệt kê mã giảm giá</a></li>
						
                        
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-motorcycle"></i>
                        <span>Vận Chuyển</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/delevery')}}">Quản lí vận chuyển</a></li>
                      
						
                        
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh Mục Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li>
						<li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục sản phẩm</a></li>
                        
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
						<li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>
                        <li><a href="{{URL::to('/all-image-product')}}">Liệt kê hình ảnh sản phẩm</a></li>
                        
                    </ul>
                </li>
                
                @if(Session::get('admin_name')=="Truyen")
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Chức vụ nhân viên</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-capnhanvien')}}">Thêm chức vụ nhân viên</a></li>
                        <li><a href="{{URL::to('/all-capnhanvien')}}">Liệt Kê chức vụ nhân viên</a></li>
						
					
                        
                    </ul>
                </li>
                @else
                @endif
                @if(Session::get('admin_name')=="Truyen")
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>Nhân Viên</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-nhanvien')}}">Thêm Nhân Viên</a></li>
                        <li><a href="{{URL::to('/all-nhanvien')}}">Liệt Kê Nhân Viên</a></li>
					
                        
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-calculator"></i>
                        <span>Điểm Danh</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/all-diemdanh')}}">Xem Điểm Danh</a></li>
					
                        
                    </ul>
                </li>
                @else
                @endif
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>Khách hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/all-customer')}}">Liệt kê khách hàng</a></li>
                       
                        
                    </ul>
                </li>
                
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
	@yield('admin_content')	
</section>
<!--main content end-->
</section>
<script src="{{asset('js1/bootstrap.js')}}"></script>
<script src="{{asset('js1/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('js1/scripts.js')}}"></script>
<script src="{{asset('js1/jquery.slimscroll.js')}}"></script>
<script src="{{asset('js1/jquery.nicescroll.js')}}"></script>
<!-- <script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script> -->
<script src="{{asset('js1/jquery.scrollTo.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>

<!-- morris JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        let table = new DataTable('#cate');
    
  });
</script>

<script type="text/javascript">
     $(document).ready(function(){

        fetch_delivery();

        function fetch_delivery(){
            var _token = $('input[name="_token"]').val();
             $.ajax({
                url:'{{url('/select-feeship')}}',
                method:'POST',
                data:{_token:_token},
                success:function(data){
                   $('#load_delivery').html(data);
                }
            });
        }
    $(document).on('blur','.fee_feeship_edit',function(){

       var feeship_id=$(this).data('feeship_id');
       var fee_value=$(this).text();
       var _token = $('input[name="_token"]').val();
   
    //  alert(_token);
       $.ajax({
                url : '{{url('/update-delivery')}}',
                method: 'POST',
                data:{feeship_id:feeship_id,_token:_token,fee_value:fee_value},
                success:function(data){
                    alert('Thay đổi phí vận chuyển thành công')
                   fetch_delivery();
                }
            });

     
     });
        $('.add_delivery').click(function(){

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
                url : '{{url('/insert-delivery')}}',
                method: 'POST',
                data:{city:city, province:province, _token:_token, wards:wards, fee_ship:fee_ship},
                success:function(data){
                   fetch_delivery();
                }
            });


        });
        $('.choose').on('change',function(){
            var action = $(this).attr('id');//lay id
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            //  alert(ma_id);
            //   alert(_token);

            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({//gui ddi
                url:'{{url('/select-delivery')}}',
                method:'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        }); 
    })


</script>
<script>
    var colorDanger = "#00ff00";
    var colorblude =" #000099";
    var coloryeloow =" #FFD700";
Morris.Donut({
  element: 'donut-example1',
  resize: true,
  colors: [
    '#E0F7FA',
    '#B2EBF2',
    '#80DEEA',
    '#4DD0E1',
    '#26C6DA',
    '#00BCD4',
    '#00ACC1',
    '#0097A7',
    '#00838F',
    '#006064'
  ],
 

  data: [
    {label:"Products for diabetes", value:<?php echo   $tieuduong?>, color:coloryeloow},
    {label:"Good product for brain", value:<?php echo   $trinao?>, color:colorDanger},
    {label:"products for anemia", value:<?php echo   $thieumau?>, color:colorblude},
    {label:"Good product for digestion", value:<?php echo  $tieuhoa?>}
   
  ]
});
</script>
<script>
    var colorDanger = "#00ff00";
    var colorblude =" #000099";
Morris.Donut({
  element: 'donut-example',
  resize: true,
  colors: [
    '#E0F7FA',
    '#B2EBF2',
    '#80DEEA',
    '#4DD0E1',
    '#26C6DA',
    '#00BCD4',
    '#00ACC1',
    '#0097A7',
    '#00838F',
    '#006064'
  ],
  //labelColor:"#cccccc", // text color
  //backgroundColor: '#333333', // border color
  data: [
    {label:"Products", value:<?php echo $product?>, color:colorDanger},
    {label:"Orders", value:<?php echo $ordera?>, color:colorblude},
    {label:"Customers", value:<?php echo $customer?>}
   
  ]
});
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
    dateFormat:"yy-mm-dd",

} );
  $( "#datepicker2" ).datepicker({
    dateFormat:"yy-mm-dd",
} );
});
  
  
  </script>
    <script>
  $(document).ready(function() {
       chart30daysorder();

//        .on('change', function()
// .change( function()
    $('.dashboard-filter').change( function() {
          
          var dashboard_value = $(this).val();
          var _token = $('input[name="_token"]').val();
          
         
          alert(dashboard_value);
       

          $.ajax({ 
              url: "{{url('/dashboard-filter')}}",
              method: 'POST',
              dataType:"JSON",
              data: {
                 
                  dashboard_value:dashboard_value,
                  _token: _token
              },
              success: function(data) {
                   chart.setData(data);
              }
          });
      });


    
  var  chart=  new Morris.Line({

  element: 'myfirstchart',
  lineColors:['#81C79','#fc8710','#FF6541','#7FFF00','#766B56'],
  poinFillColors:['#ffffff'],
  poinStokeColers:['black'],
  fillOpacity:0.6,
  hideHover:'auto',
  parseTime:false,//thoi gian bi loi neu k


  xkey: 'period',
 
  ykeys: ['order','sales','profit','quantity'],
 
  labels: ['Số đơn hàng','Doanh số','Lợi nhuận','Số lượng']
});

function chart30daysorder(){
   
            var _token = $('input[name="_token"]').val();
            
         

            $.ajax({ 
                url: '{{url('/day-order')}}',
                method: 'POST',
                dataType:"JSON",
                data: {
                   
                    _token: _token
                },
                success: function(data) {
                     chart.setData(data);
                }
            
        });


}




    $('#btn-dashboard-filter').click(function(){
            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();
           
            var _token = $('input[name="_token"]').val();
           
            $.ajax({
                url: '{{url('/filter-by-date')}}',
                method: 'POST',
                dataType:"JSON",
                data: {
                    from_date: from_date,
                    to_date: to_date,
                    _token: _token,
                  
                },
                success: function(data) {
                     chart.setData(data);
                }
            });
  
  } );
});
  </script>





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
<!-- <script>
    $(document).ready(function() {
        setInterval(function() {
            $.ajax({
                url: "{{URL::to('/load-users')}}"
            }).done(function(data) {
                $('#cards').html(data);
            });
        }, 3000);
    });
    </script> -->


   
  

<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="{{asset('js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
