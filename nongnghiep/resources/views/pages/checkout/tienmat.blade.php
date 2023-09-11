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

       
       
        <div class="review-payment">
            <h2>xem lai gio hang</h2>
        </div>

       
       
    </div>
</section>
<!--/#cart_items-->





@endsection