@extends('layout')
<!--lay theo ten day la phan morong cua welcom-->

@section('content')

<div class="dev">
<div class="container">
    <h2>Bạn đặt hàng thành công</h2>
    <h2> <a href="{{URL::to('/danh-muc-san-pham-all')}}"> << Tiếp tục mua hàng.</a>
       </h2>
</div>
</div>

@endsection