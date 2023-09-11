@extends('layout')
<!--lay theo ten day la phan morong cua welcom-->

@section('content')
<style>
.sa {
    background-color:darkcyan;
    box-shadow: 5px 5px 5px 5px white;


}
.csd{
    color: black;
}
.text_g {
    text-decoration: underline;
}

.text_g1 {
    margin-top: 20px;
}
.text_g1 span{
    color: #000;
    font-size: 20px;

}


table {
    border-right: 1px solid black;
}

.col {
    padding: 1rem;

}

tr .cart_description {
    padding-top: 60px;
}

tr .cart_price {
    padding-top: 60px;


}

tr .cart_quantity {
    padding-top: 60px;


}

tr .soluong {
    padding-top: 60px;


}

tr .xoa {
    padding-top: 53px;
    color: #000;

}

.a {
    padding-top: 12px;
}


.buttons_added {
    opacity:1;
    display:inline-block;
    display:-ms-inline-flexbox;
    display:inline-flex;
    white-space:nowrap;
    vertical-align:top;
}
.is-form {
    overflow:hidden;
    position:relative;
    background-color:#f9f9f9;
    height:2.2rem;
    width:1.9rem;
    padding:0;
    text-shadow:1px 1px 1px #fff;
    border:1px solid #ddd;
}
.is-form:focus,.input-text:focus {
    outline:none;
}
.is-form.minus {
    border-radius:4px 0 0 4px;
}
.is-form.plus {
    border-radius:0 4px 4px 0;
}
.input-qty {
    background-color:#fff;
    height:2.2rem;
    text-align:center;
    font-size:1rem;
    display:inline-block;
    vertical-align:top;
    margin:0;
    border-top:1px solid #ddd;
    border-bottom:1px solid #ddd;
    border-left:0;
    border-right:0;
    padding:0;
}
.input-qty::-webkit-outer-spin-button,.input-qty::-webkit-inner-spin-button {
    -webkit-appearance:none;
    margin:0;
}
.text-alert{
    padding-top: 12px;
}
.ban{
cursor:pointer;
  position:relative;
 
  background:black;
  font-size:22px;
  border-top-right-radius:10px;
  border-bottom-left-radius:10px;
  transition:all 1s;
  &:after,&:before{
    content:" ";
    width:10px;
    height:10px;
    position:absolute;
    border :0px solid #fff;
    transition:all 1s;
    }
  &:after{
    top:-1px;
    left:-1px;
    border-top:5px solid black;
    border-left:5px solid black;
  }
  &:before{
    bottom:-1px;
    right:-1px;
    border-bottom:5px solid black;
    border-right:5px solid black;
  }
  &:hover{
    border-top-right-radius:0px;
  border-bottom-left-radius:0px;
     background:rgba(0,0,0,.5);
    color:chartreuse;
    &:before,&:after{
      
      width:100%;
      height:100%;
     border-color:blue;
    }
  }
}

.data-container{
 
  display:flex;
  justify-content:center;
  align-items:center;
  width: 100 %;
}

</style>
<style type="text/css">

	.codepro-custom-btn{
        width:130px;
        height:40px;
        color:#fff;
        border-radius:5px;
        padding:10px 25px;
        font-family:'Lato',sans-serif;
        font-weight:500;
        background:transparent;
        cursor:pointer;transition:all 0.3s ease;
        position:relative;display:inline-block;
        box-shadow:inset 2px 2px 2px 0 rgba(255,255,255,.5),7px 7px 20px 0 rgba(0,0,0,.1),4px 4px 5px 0 rgba(0,0,0,.1);
        outline:none}
      
       
       
        .codepro-btn-3{background:rgb(0,172,238);
            background:linear-gradient(0deg,rgba(0,172,238,1) 0%,rgba(2,126,251,1) 100%);
            width:400px;
            height:40px;
            line-height:42px;padding:0;border:none}
        .codepro-btn-3 span{position:relative;display:block;width:100%;height:100%}
        .codepro-btn-3:before,.codepro-btn-3:after{position:absolute;content:"";right:0;top:0;background:rgba(2,126,251,1);transition:all 0.3s ease}
        .codepro-btn-3:before{height:0%;width:2px}
        .codepro-btn-3:after{width:0%;height:2px}
        .codepro-btn-3:hover{background:transparent;box-shadow:none}
        .codepro-btn-3:hover:before{height:100%}
        .codepro-btn-3:hover:after{width:100%}
        .codepro-btn-3 span:hover{color:rgba(2,126,251,1)}
        .codepro-btn-3 span:before,.codepro-btn-3 span:after{ position:absolute;content:"";left:0;bottom:0;background:rgba(2,126,251,1);transition:all 0.3s ease}
        .codepro-btn-3 span:before{width:2px;height:0%}
        .codepro-btn-3 span:after{width:0%;height:2px}
        .codepro-btn-3 span:hover:before{height:100%}
        .codepro-btn-3 span:hover:after{width:100%}
       </style>
<section class="dev">

    <div class="container sa col-sm-12 ">
        <div class="table-responsive cart_info">
            <?php
        $name =Session::get('mes');
      if( $name){
        echo '<h3 class="text-alert">'.$name.'</h3>';
        Session::put('mes',null);

    }
   
        ?>
        </div>
        <h2 class="a">Giỏ hàng của bạn.</h2>
        <div class="row  ">
            <div class="col-sm-9">

                <form action="{{URL::to('/update-cart')}}" method="post">
                    @csrf

                    <table class="table table-condensed">
                        <tbody>
                            @if(Session::get('cart')==true)


                            @php
                            $total= 0;
                            @endphp

                            @foreach(Session::get('cart') as $key =>$cart)


                            @php
                            $subtotal= $cart['product_qty']*$cart['product_price'];
                            $total+=$subtotal;
                            @endphp
                            <tr>



                                <td class="cart_product col-sm-3">
                                    <a href=""><img src="{{asset('/upload/'.$cart['product_image'])}}"
                                            alt="{{$cart['product_name']}}" height="100%" width="100%" /></a>
                                </td>
                                <td class="cart_description col-sm-4">
                                    <h1>
                                        <p>{{$cart['product_name']}}</p>
                                    </h1>
                                </td>
                                <td class="cart_price col-sm-2">
                                    <h1>
                                        <p>{{number_format($cart['product_price'],0,',',',')}}VND</p>
                                    </h1>
                                </td>
                                <td class="cart_quantity col-sm-3">
                                    <div class="cart_quantity_button">

                                        <input class=" form-control cart_quantity_input" type="number"
                                            name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}"
                                            autocomplete="off" min="1" size="5">

                                    </div>
                                </td>

                               

                                <td class="cart_total col-sm-2">

                                </td>
                                <td class="soluong"> <input type="submit" value="Cập nhật số lượng" name="update_qty"
                                        id="" class=" text-chubtn btn-primary btn-lg"></td>
                                <td class="cart_delete ">


                                </td>
                                <td class="xoa"> <a class="btn btn-sm-primary" href="{{URL::to('/delete-sp/'.$cart['session_id'])}}">Xóa</a></td>

                            </tr>

                            @endforeach




                            <tr>
                                <td>
                                    <div class="col-sm-5">
                                        <div class="row">

                                            <a class="btn btn-primary text-chu btn-sm "
                                                href="{{URL::to('/xoa-tatca')}}">Xóa tất cả sản phẩm</a>
                                        </div>
                                    </div>
                                </td>

                            </tr>


                            @else
                            <tr>
                                @php
                                echo '<h3>Làm ơn thêm sản phẩm vào giỏ hàng.</h3>';
                                @endphp

                            </tr>
                            @endif
                        </tbody>

                </form>
                @if(Session::get('cart'))


                </table>
            </div>
            <div class="col-sm-3 col">
                <h3 class="text_g">CHI TIẾT ĐƠN HÀNG</h3>

                <div class="form-group text_g1">
                    <label for="exampleInputFile">
                        <h4>Thông tin chi tiết</h4>
                    </label>
                    

                </div>
                <div class="row  text_g1">
                    <div class="col-sm-6">
                        <h2>Tổng tiền:</h2>

                    </div>
                    <div class="col-sm-4 ">

                        <h2>{{number_format($total,0,',',',')}}VND</h2>





                    </div>
                </div>


                @endif


                @if(Session::get('cart')==true )

                <div class="text_g1 data-container"> <button class="codepro-custom-btn codepro-btn-3" target="blank" title="Code Pro" onclick="window.open('{{URL::to('/checkout')}}')"><span>Tiến hành thanh toán</span></button>
               </div>
                @endif
                <div class="text_g1">
                    <h3><a class="csd" href="{{URL::to('/danh-muc-san-pham-all')}}">
                            << Tiếp tục mua hàng.</a>
                    </h3>
                </div>

            </div>
        </div>
    </div>





    </div>
</section>



@endsection