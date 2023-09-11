@extends('layout')
<!--lay theo ten day la phan morong cua welcom-->

@section('content')
<!--lay noi dung-->
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">trang chu</a></li>
                <li class="active">thanh toan gio hang</li>
            </ol>
        </div>

       <div>
        <h2>xem lai gio hang</h2>
       </div>
       <div class="table-responsive cart_info">
            <?php


                 $content=Cart::content();
                //  echo '<pre>';
                //  print_r( $content);
                //  echo '</pre>';
                
                ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">san pham</td>
                        <td class="description"></td>
                        <td class="price">gia</td>
                        <td class="quantity">so luong</td>
                        <td class="total">tong</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $v_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::to('upload/'.$v_content->options->image)}}" alt="" height="100"
                                    width="100" /></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$v_content->name}}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($v_content->price).''.'vnd'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                               <form action="{{URL::to('/update-cart-qty')}}" method="post">
							   @csrf
                                <input class="cart_quantity_input" type="text" name="quantity"value="{{$v_content->qty}}" autocomplete="off" size="2">
								<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" id="" class="btn btn-default btn-sm" >
                                <input type="submit" value="cap nhat" name="update_qty" id="" class="btn btn-default btn-sm" >
                           </form>
						 </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php 
                            $subtotal =$v_content->price *$v_content->qty;
                            echo number_format($subtotal).''.'VND';
?>

                                </p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>

						@endforeach
					</tbody>
				</table>
			</div>
		</div>
       

        <form role="form" action="{{URL::to('/order-pay')}}" method="post" enctype="multipart/form-data">
             @csrf
        <div class="payment-options">
            <span>
                <label><input name="payment_option" value="1" type="checkbox">the atm</label>
            </span>
            <span>
                <label><input name="payment_option" value="2"   type="checkbox"> thanh toan khi nhan hang</label>
            </span>
            <input type="submit" name="gui" value="dat hang" class="btn btn-primary">
           
        </div>
        </form>
    </div>
</section>
<!--/#cart_items-->





@endsection