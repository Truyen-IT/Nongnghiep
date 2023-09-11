@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                sữa sản phẩm
            </header>
            <?php
        $name =Session::get('mes');
    if( $name){
        echo '<span class="text-alert">'.$name.'</span>';
        Session::put('mes',null);

    }
   
   ?>

    
       
       
        
       
       
     
       
       
       
        
       
       
       
        
       

            <div class="panel-body">
                @foreach($edit_product as $key =>$pro)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="product_name" value="{{$pro->product_name}}" class="form-control"
                                id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung sản phẩm</label>
                            <input type="text" name="product_content" value="{{$pro->product_content}}"
                                class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                            <img src="{{URL::to('upload/'.$pro->product_image)}}" alt="" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" name="product_gia" value="{{$pro->product_price}}" class="form-control"
                                id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá ban đầu</label>
                            <input type="text" name="price_cost"  value="{{$pro->price_cost}}" class="form-control" id="exampleInputEmail1"
                                placeholder="">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Danh mục sản phẩm</label>
                            <select name="product_cate" id="" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key =>$cate)
                                @if($cate->category_id==$pro->category_id)
                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @else
                                <option  value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endif


                                @endforeach

                           
                           
                           
                           
                           
                           
                           
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Sản phẩm tốt cho sức khỏe </label><br />
                            
                            <div class="form-check">
                                @if($pro->product_vitamina==1)
                                    <input class="form-check-input" checked type="checkbox" value="1" name="vitamina" id="defaultCheck1">

                                @else
                                    <input class="form-check-input" type="checkbox" value="1" name="vitamina" id="defaultCheck1">
                                @endif
                               
                                <label class="form-check-label" for="defaultCheck1">
                                   Tốt cho bệnh tiểu đường
                                </label>
                            </div>
                           
                            <div class="form-check">
                            @if($pro->product_vitaminb==1)
                            <input class="form-check-input"  checked type="checkbox" value="1" name="vitaminb" id="defaultCheck1">

                                @else
                                <input class="form-check-input" type="checkbox" value="1" name="vitaminb" id="defaultCheck1">
                                @endif
                                
                                <label class="form-check-label" for="defaultCheck1">
                                Tốt cho não
                                </label>
                            </div>
                            
                            <div class="form-check">
                            @if($pro->product_vitamind==1)
                            <input class="form-check-input"  checked type="checkbox" value="1" name="vitamind" id="defaultCheck1">

                                @else
                                <input class="form-check-input"  type="checkbox" value="1" name="vitamind" id="defaultCheck1">
                                @endif
                                <label class="form-check-label" for="defaultCheck1">
                                Hổ trợ cho người bị thiếu máu
                                </label>
                            </div>
                            <div class="form-check">
                            @if($pro->product_vitamine==1)
                            <input class="form-check-input"  checked type="checkbox" value="1" name="vitamine" id="defaultCheck1">

                                @else
                                <input class="form-check-input"  type="checkbox" value="1" name="vitaminb" id="defaultCheck1">
                                @endif
                                <label class="form-check-label" for="defaultCheck1">
                                 Hổ trợ tiêu hóa
                                </label>
                            </div>
                        

                        <div class="form-group">
                            <label for="exampleInputPassword1">Công dụng sản phẩm</label>
                            <input type="text" name="product_desc" value="{{$pro->product_desc}}" class="form-control" id="exampleInputPassword1"
                                placeholder="Password"> 
                            <p class="alert-danger">{{$errors->first('product_desc')}}</p>
                        </div>

                            
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <input type="text" name="product_mota" value="{{$pro->product_mota}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thành phần dinh dưỡng</label>
                            <input type="text" name="product_thanhduong" value="{{$pro->product_thanhduong}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chứng nhận</label>
                            <input type="text" name="product_chungnhan" value="{{$pro->product_chungnhan}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chất lượng</label>
                            <input type="text" name="product_chatluong" value="{{$pro->product_chatluong}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Đóng gói</label>
                            <input type="text" name="product_donggoi" value="{{$pro->product_donggoi}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Xuất xứ</label>
                            <input type="text" name="product_xuatxu" value="{{$pro->product_xuatxu}}"  class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Liên hệ mua sĩ</label>
                            <input type="text" name="product_muasi" value="{{$pro->product_muasi}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thành phần sản phẩm</label>
                            <input type="text" name="product_thanhphan" value="{{$pro->product_thanhphan}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hướng dẫn sử dụng</label>
                            <input type="text" name="product_hdsd" value="{{$pro->product_hdsd}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bảo quản</label>
                            <input type="text" name="product_baoquan"  value="{{$pro->product_baoquan}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                          
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hạn sử dụng</label>
                            <input type="text" name="product_hsd" value="{{$pro->product_hsd}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                          
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thể tích thực</label>
                            <input type="text" name="product_thetichthuc" value="{{$pro->product_thetichthuc}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                          
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lưu ý</label>
                            <input type="text" name="product_luuy" value="{{$pro->product_luuy}}" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                          
                        </div>

                        
                       

                       

                        <div class="form-group">
                            <label for="gioitinh_nhanvien">Có lẻ bạn sẽ yêu thích</label>
                            @if($pro->product_vitaminc==1)

                            <input type="radio" id="gender" name="vitaminc" checked value="1" />Yêu thích
                            <input type="radio" id="gender" name="vitaminc" value="0" />Không yêu thích <br />
                            @else

                            <input type="radio" id="gender" name="vitaminc" value="1" />Yêu thích

                            <input type="radio" id="gender" name="vitaminc" checked value="0" />Không yêu thích<br />
                            @endif
                            

                        </div>

                        <div class="form-group">
                            <label for="gioitinh_nhanvien">Nổi bật: </label>
                            @if($pro->product_noibat==1)

                            <input type="radio" id="gender" name="product_noibat" checked value="1" />Nổi bật
                            <input type="radio" id="gender" name="product_noibat" value="0" />Không nổi bật <br />
                            @else

                            <input type="radio" id="gender" name="product_noibat" value="1" />Nổi bật

                            <input type="radio" id="gender" name="product_noibat" checked value="0" />Không nổi bật<br />
                            @endif
                            

                        </div>

                        <div class="form-group">
                           
                            
                            <label for="gioitinh_nhanvien">Hiển thị: </label>
                            @if($pro->product_status==1)

                            <input type="radio" id="gender" name="product_status" checked value="1" />Hiển thị
                            <input type="radio" id="gender" name="product_status" value="0" />Ẩn<br />
                            @else

                            <input type="radio" id="gender" name="product_status" value="1" />Hiển thị

                            <input type="radio" id="gender" name="product_status" checked value="0" />Ẩn<br />
                            @endif
                       
                       
                        </div>

                        <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật sản phẩm</button>
                        </div>
                    </form>
                </div>
                @endforeach

            </div>
        </section>

    </div>

</div>

@endsection