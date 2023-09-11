@extends('layout')
<!--lay theo ten day la phan morong cua welcom-->
@section('contentt')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('images/home/R.jpeg')}}" class="d-block w-100" alt="..." width="100%"
                        height="450px">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/home/R.jpeg')}}" class="d-block w-100" alt="..." width="100%"
                        height="450px">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/home/R.jpeg')}}" class="d-block w-100" alt="..." width="100%"
                        height="450px">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

@endsection

@section('content')


<div class="header-2">
    <div class="col-sm-12">
        <h2 class="title text-center">Tất Cả Sản Phẩm</h2>
        <div class="row">
            @foreach($product as $key => $pro)
            echo $rating;

            <div class="card hinh-anh" style="width: 15rem; ">
                <form>
                    @csrf
                    <input type="hidden" value="{{$pro->product_id}}" class="cart_product_id_{{$pro->product_id}}">
                    <input type="hidden" value="{{$pro->product_name}}" class="cart_product_name_{{$pro->product_id}}">
                    <input type="hidden" value="{{$pro->product_image}}"
                        class="cart_product_image_{{$pro->product_id}}">
                    <input type="hidden" value="{{$pro->product_price}}"
                        class="cart_product_price_{{$pro->product_id}}">
                        <input type="hidden" value="{{$pro->price_cost}}" class="cart_price_cost_{{$pro->product_id}}">
                    <input type="hidden" value="1" class="cart_product_qty_{{$pro->product_id}}">
                    <img src="{{URL::to('upload/'.$pro->product_image)}}" class="card-img-top" alt="..." width="120px"
                        height="150px">
                    <div class="col-sm-12">
                        <div class="row btn-1">
                        <a href="#" class="btn btn-primary text-chu col-sm-5">Chi tiet</a>
                            <button type="button" class="text-chu col-sm-7 btn btn-primary add-to-cart"
                            data-id_product="{{$pro->product_id}}" name="add-to-cart">them gio hang</button>

                           
                        </div>

                        <div class="card-body text">
                            <h5 class="card-title">{{$pro->product_name}}</h5>
                            <p class="card-text">{{number_format($pro->product_price).''.'VND'}}</p>
                        </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection