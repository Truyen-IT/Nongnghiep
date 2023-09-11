@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Sản Phẩm
            </header>
            <?php
        $name =Session::get('mes');
         if( $name){
        echo '<span class="text-alert">'.$name.'</span>';
        Session::put('mes',null);

    }
   
   ?>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm (*)</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                            <p class="alert-danger">{{$errors->first('product_name')}}</p>
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nội dung sản phẩm (*)</label>
                            <input type="text" name="product_content" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                            <p class="alert-danger">{{$errors->first('product_content')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm (*)</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                            <p class="alert-danger">{{$errors->first('product_image')}}</p>
                        </div>
                        <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm phụ (*)</label>
                                    <input type="file" multiple name="lagery_image[]" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                   
                                </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" name="product_gia" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                            <p class="alert-danger">{{$errors->first('product_gia')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá ban đầu</label>
                            <input type="text" name="price_cost" class="form-control" id="exampleInputEmail1"
                                placeholder="">
                            <p class="alert-danger">{{$errors->first('product_gia')}}</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Danh mục sản phẩm (*)</label>
                            <select name="product_cate" id="" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key =>$cate)
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endforeach

                            </select>
                            <p class="alert-danger">{{$errors->first('product_cate')}}</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Sản phẩm tốt cho sức khỏe </label><br />
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="vitamina" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                   Tốt cho bệnh tiểu đường
                                </label>
                            </div>
                           
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="vitaminb" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                Tốt cho não
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="vitamind" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                Hổ trợ cho người bị thiếu máu
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="vitamine" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                 Hổ trợ tiêu hóa
                                </label>
                            </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Công dụng sản phẩm (*)</label>
                            <textarea type="text" name="product_desc" class="form-control" id="exampleInputPassword1"
                                placeholder="Password">  </textarea>
                            <p class="alert-danger">{{$errors->first('product_desc')}}</p>
                        </div>

                            
                        </div>


                       



      
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                            <input type="text" name="product_mota" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thành phần dinh dưỡng</label>
                            <input type="text" name="product_thanhduong" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chứng nhận</label>
                            <input type="text" name="product_chungnhan" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chất lượng</label>
                            <input type="text" name="product_chatluong" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Đóng gói</label>
                            <input type="text" name="product_donggoi" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Xuất xứ</label>
                            <input type="text" name="product_xuatxu" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Liên hệ mua sĩ</label>
                            <input type="text" name="product_muasi" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thành phần sản phẩm</label>
                            <input type="text" name="product_thanhphan" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hướng dẫn sử dụng</label>
                            <input type="text" name="product_hdsd" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                           
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bảo quản</label>
                            <input type="text" name="product_baoquan" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                          
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hạn sử dụng</label>
                            <input type="text" name="product_hsd" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                          
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thể tích thực</label>
                            <input type="text" name="product_thetichthuc" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                          
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lưu ý</label>
                            <input type="text" name="product_luuy" class="form-control" id="exampleInputEmail1"
                                placeholder="Enter email">
                          
                        </div>

                        
                        <div class="form-group">
                            <label for="exampleInputFile">Sản phẩm nổi bật (*) </label><br />
                            <input type="radio" id="gender" name="product_noibat" value="0" />Không nổi bật
                            <input type="radio" id="gender" name="product_noibat" value="1" />Nổi bật <br />


                            <p class="alert-danger">{{$errors->first('product_noibat')}}</p>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Có lẻ bạn sẽ yêu thích (*) </label><br />
                            <input type="radio" id="gender" name="vitaminc" value="0" />Không yêu thích
                            <input type="radio" id="gender" name="vitaminc" value="1" />Yêu thích<br />

                        </div>

                        

                        <div class="form-group">
                            <label for="exampleInputFile">Ẩn or hiển thị (*) </label> <br />
                            <input type="radio" id="gender" name="product_status" value="0" />Ẩn
                            <input type="radio" id="gender" name="product_status" value="1" />Hiển thị <br />


                            <p class="alert-danger">{{$errors->first('product_status')}}</p>
                        </div>

                        <button type="submit" name="add_category_product" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                </div>

            </div>
        </section>

    </div>

</div>

@endsection