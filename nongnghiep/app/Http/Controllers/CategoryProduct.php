<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Rating;
use App\Models\Lagery;
use App\Models\Product;

use App\Models\CategoryProductModel;
session_start();
class CategoryProduct extends Controller

{
    public function kiemtralog(){//1 vi vu de lam cho no liem tra session
        $admin_id=Session::get('admin_id');
        if($admin_id){
          return  Redirect::to('admin.dashboard');
        }
        else{
           return  Redirect::to('admin')->send();
        }

    }
    public function add_category_product(){
        $this->kiemtralog();
        return view('admin.add_category_product');
    }
    public function all_category_product(){
      $all_category_product1=DB::table('tbl_category_product')->get();//get la lay het
    $i=0;
      foreach($all_category_product1 as $key =>$va){
        $i++;

    }
      $all_category_product=DB::table('tbl_category_product')->paginate(4);//get la lay het
      $manager=view('admin.all_category_product')->with('all_category_product',$all_category_product)->with('i',$i);
      return view('admin_layout')->with('admin.all_category_product',$manager);
    }
    public function save_category_product(Request $request){
        $data=array();
        $data=$request->validate(
            [
               
                'category_name'=>'required|unique:tbl_category_product|max:255',
               
                'category_desc'=>'required|max:255',
                'category_product_image'=>'required|mimes:jpg,jpeg,png,gif|max:2048',
                
                'category_status'=>'required',
                
            ],
            [
                 'category_name.unique'=>'Tên danh mục sản phẩm đã có,xin hãy điền khác',
                 'category_name.required'=>'Tên danh mục sản phẩm phải có',
                 'category_desc.required'=>'Mô tả danh mục phải có',
                //  'coupon_number.alpha_num'=>'Số lượng phải la số',
                'category_product_image.mimes'=>'Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif',
                'category_product_image.max'=>'Dung lượng tối đa không quá 2M',
                'category_product_image.required'=>'Hình ảnh danh mục là phải có',
               
                'category_status.required'=>'Ẩn và hiển thị danh mục phải có',
                 
                 
                
            ]
    
        );
        //tao ra cai mang
       // $data['category_name']=$request->UIDresult;
        $data['category_name']=$request->category_name;
        $data['category_desc']=$request->category_desc;
        $data['category_status']=$request->category_status;
        $get_image=$request->file('category_product_image');


      


     if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name=current(explode('.',$get_name_image));//curen la lay dau exlode la chia ra 2 end la lay cuoi
            $new_image=$name.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload',$new_image);
           
            $data['category_product_image']=$new_image;
            DB::table('tbl_category_product')->insert($data);
            Session::put('mes','Thêm danh mục thành công');
            return Redirect::to('add-category-product');




        }
        $data['category_product_image']='';
        DB::table('tbl_category_product')->insert($data);
        Session::put('mes','Thêm danh mục thành công');
        return Redirect::to('add-category-product');



    }
     public function hienthi($category_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_id)->update(['category_status'=>1]);
        return Redirect::to('all-category-product');
        
    }
    public function an($category_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_id)->update(['category_status'=>0]);
        return Redirect::to('all-category-product');
    }
    public function edit($category_id)
    {
        $edit_category_product=DB::table('tbl_category_product')->where('category_id',$category_id)->get();//fift la lay 1
        $manager=view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product',$manager);
       
       
    }
    
    public function update(Request $request,$category_id){
        $data=array();//tao ra cai mang
        // $data['category_name']=$request->UIDresult;
         $data['category_name']=$request->category_product_name;
         $data['category_desc']=$request->category_product_desc;
        
        $get_image=$request->file('category_product_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name=current(explode('.',$get_name_image));//curen la lay dau exlode la chia ra 2 end la lay cuoi
            $new_image=$name.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload',$new_image);
            $data['category_product_image']=$new_image;
            DB::table('tbl_category_product')->where('category_id',$category_id)->update($data);
            Session::put('mes','Cập nhật danh mục thành công');
        return Redirect::to('all-category-product');




        }
        
        DB::table('tbl_category_product')->where('category_id',$category_id)->update($data);
        Session::put('mes','Cập nhật danh mục thành công');
        return Redirect::to('all-category-product');

    }




    public function delete($category_id)
    {
     DB::table('tbl_category_product')->where('category_id',$category_id)->delete();
     Session::put('mes','Xóa danh mục sản phẩm thành công');
     return Redirect::to('all-category-product');
   
    }
   
   
    public function loc(){
        $the_first=DB::table('tbl_category_product')->get();
        $cate_product=DB::table('tbl_category_product')->where('category_status','1')->orderBy('category_id','desc')->get();
        $all_product=DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderBy('tbl_product.category_id','desc')->paginate(8);//get la lay het
       
       $all_product1=DB::table('tbl_product')
       ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderBy('tbl_product.category_id','desc')->get();
       $category_name=DB::table('tbl_category_product')->limit(1)->get();
       
       $rating=DB::table('tbl_rating')->get();
       
        $theloai=$_GET['theloai'];
        $sapxep=$_GET['sapxep'];
        if($theloai=='' || $sapxep==''){
            return redirect()->back();

        }else{
            $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderBy('product_price','DESC')
            ->paginate(6)->appends(request()->query());
            return view('pages.category.show_category')->with('rating', $rating)->with('category', $cate_product)->with('product', $all_product)->with('all_product1', $all_product1)->with('category_id', $all_product)
         ->with('category_name',  $category_name)->with('the_first',$the_first);
        }

    }
   
    public function show_category_home_all(){
        $cate_product_tuoi=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','21')->first();
        $cate_product_si=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
   
   
    $cate_product=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','!=','21')
        ->where('category_id','!=','22')->orderBy('category_id','desc')->get();
   

        $yeu_product1=DB::table('tbl_product')->join('tbl_rating','tbl_product.product_id','=','tbl_rating.product_id')
    ->select('tbl_rating.product_id',DB::raw("sum(tbl_rating.product_id) as row"))->groupBy('tbl_rating.product_id')
    ->where('category_id','!=','22')->orderBy('row','DESC')->limit(4)->get();//get la lay het
   
     
      $yeu_product=DB::table('tbl_product')
          ->where('category_id','!=','22')->orderBy('product_id','desc')->get();//get la lay het
       
        $xem_nhieu_product=DB::table('tbl_product')
        ->where('category_id','!=','22')->orderBy('product_views','desc')->limit(4)->get();//get la lay het
       

    $all_product=DB::table('tbl_product')
    ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderBy('tbl_product.category_id','desc')->paginate(8);//get la lay het
   
   $all_product1=DB::table('tbl_product')
   ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderBy('tbl_product.category_id','desc')->get();
   $category_name=DB::table('tbl_category_product')->limit(1)->get();
   
   $rating=DB::table('tbl_rating')->get();
   
   
   
   if(isset($_GET['benh']) && isset($_GET['sapxep'])){
    $benh=$_GET['benh'];
    $sap=$_GET['sapxep'];

    
    if($benh=='tieuduong' && $sap=='caothap'){
        $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitamina','=','1')->orderBy('product_price','DESC')
        ->paginate(6);
    }
      
     elseif($benh=='tieuduong' && $sap=='thapcao'){
        $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitamina','=','1')->orderBy('product_price','ASC')
        ->paginate(6);
    } elseif($benh=='tieuduong' && $sap=='az'){
        $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitamina','=','1')->orderBy('product_name','ASC')
        ->paginate(6);
    
    
   

   }elseif($benh=='tieuduong' && $sap=='za'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitamina','=','1')->orderBy('product_name','DESC')
    ->paginate(6);
   }
   elseif($benh=='trinao' && $sap=='caothap'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitaminb','=','1')->orderBy('product_price','DESC')
    ->paginate(6);
} elseif($benh=='trinao' && $sap=='thapcao'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitaminb','=','1')->orderBy('product_price','ASC')
    ->paginate(6);
}
elseif($benh=='trinao' && $sap=='thapcao'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitaminb','=','1')->orderBy('product_price','ASC')
    ->paginate(6);
} elseif($benh=='trinao' && $sap=='az'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitaminb','=','1')->orderBy('product_name','ASC')
    ->paginate(6);

}
elseif($benh=='thieumau' && $sap=='caothap'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitamind','=','1')->orderBy('product_price','DESC')
    ->paginate(6);
} elseif($benh=='thieumau' && $sap=='thapcao'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitamind','=','1')->orderBy('product_price','ASC')
    ->paginate(6);
}
elseif($benh=='thieumau' && $sap=='thapcao'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitamind','=','1')->orderBy('product_price','ASC')
    ->paginate(6);
} elseif($benh=='thieumau' && $sap=='az'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitamind','=','1')->orderBy('product_name','ASC')
    ->paginate(6);




}
elseif($benh=='tieuhoa' && $sap=='caothap'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitamine','=','1')->orderBy('product_price','DESC')
    ->paginate(6);
} elseif($benh=='tieuhoa' && $sap=='thapcao'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitamine','=','1')->orderBy('product_price','ASC')
    ->paginate(6);
}
elseif($benh=='tieuhoa' && $sap=='thapcao'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitamine','=','1')->orderBy('product_price','ASC')
    ->paginate(6);
} elseif($benh=='tieuhoa' && $sap=='az'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitamine','=','1')->orderBy('product_name','ASC')
    ->paginate(6);

}
elseif($benh=='tieuduong' && $sap==''){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitamina','=','1')->orderBy('product_id','DESC')
    ->paginate(6);
} elseif($benh=='trinao' && $sap==''){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitaminb','=','1')->orderBy('product_id','DESC')
    ->paginate(6);
}
elseif($benh=='thieumau' && $sap==''){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitamind','=','1')->orderBy('product_id','DESC')
    ->paginate(6);
} elseif($benh=='tieuhoa' && $sap==''){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->where('product_vitamine','=','1')->orderBy('product_id','DESC')
    ->paginate(6);

}elseif($benh=='' && $sap=='caothap'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->orderBy('product_price','DESC')
    ->paginate(6);
} elseif($benh=='' && $sap=='thapcao'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->orderBy('product_price','ASC')
    ->paginate(6);
}
elseif($benh=='' && $sap=='thapcao'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->orderBy('product_price','ASC')
    ->paginate(6);
} elseif($benh=='' && $sap=='az'){
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->orderBy('product_name','ASC')
    ->paginate(6);

} elseif($benh=='' && $sap==' '){
   
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->orderBy('product_id','DESC')
    ->paginate(6);
}

}
   






elseif(isset($_GET['start_price']) && $_GET['end_price']){
    $min_price=$_GET['start_price'];
    $max_price=$_GET['end_price'];

    $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->whereBetween('tbl_product.product_price',[$min_price,$max_price])->orderBy('product_price','ASC')
    ->paginate(6)->appends(request()->query());
}
   else{ 
   
    $all_product=DB::table('tbl_product')->where('category_id','!=','22')->orderBy('product_id','DESC')
        ->paginate(6);
}
  



    
    return view('pages.category.show_all')->with('rating', $rating)->with('category', $cate_product)->with('product', $all_product)->with('all_product1', $all_product1)->with('category_id', $all_product)
    ->with('category_name',  $category_name)->with('cate_product_tuoi', $cate_product_tuoi)->with('cate_product_si', $cate_product_si)->with('yeu_product',$yeu_product)->with('yeu_product1',$yeu_product1)->with('xem_nhieu_product', $xem_nhieu_product);


    }
    
    
    public function show_category_home($category_id){
        $cate_product_tuoi=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','21')->first();
        $cate_product_si=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
   
    $the_first=DB::table('tbl_category_product')->where('category_id',$category_id)->get();
    $cate_product=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','!=','21')
        ->where('category_id','!=','22')->orderBy('category_id','desc')->get();
   
         
     $yeu_product1=DB::table('tbl_product')->join('tbl_rating','tbl_product.product_id','=','tbl_rating.product_id')
    ->select('tbl_rating.product_id',DB::raw("sum(tbl_rating.product_id) as row"))->groupBy('tbl_rating.product_id')
    ->where('category_id','!=','22')->orderBy('row','DESC')->limit(4)->get();//get la lay het
   
     
      $yeu_product=DB::table('tbl_product')
          ->where('category_id','!=','22')->orderBy('product_id','desc')->get();//get la lay het
    //   echo '<pre>';
             
    //            print_r( $yeu_product1);
    //            print_r( $yeu_product);
    // //          
    // //           print_r( $ngaycuoi);
            
  
    //          echo '</pre>'; 

    $all_product=DB::table('tbl_product')
    ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_product.category_id',$category_id)->orderBy('tbl_product.category_id','desc')->paginate(8);//get la lay het
   
   $all_product1=DB::table('tbl_product')
   ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_product.category_id',$category_id)->orderBy('tbl_product.category_id','desc')->get();
   $category_name=DB::table('tbl_category_product')->where('category_id',$category_id)->limit(1)->get();
   
   $rating=DB::table('tbl_rating')->get();
   
   
   
   if(isset($_GET['sort_by'])){
    $sort_by=$_GET['sort_by'];
   
    if($sort_by=='giam_dan'){
        $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_product.category_id',$category_id)->orderBy('product_price','DESC')
    ->paginate(6)->appends(request()->query());



   }elseif($sort_by=='tang_dan'){
    
    
        $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_product.category_id',$category_id)->orderBy('product_price','ASC')
        ->paginate(6)->appends(request()->query());
   
}
elseif($sort_by=='az'){
    
    
    $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_product.category_id',$category_id)->orderBy('product_name','ASC')
    ->paginate(6)->appends(request()->query());

}
elseif($sort_by=='za'){
    
    
    $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_product.category_id',$category_id)->orderBy('product_name','DESC')
    ->paginate(6)->appends(request()->query());

}



  



}
   elseif(isset($_GET['start_price']) && $_GET['end_price']){
    $min_price=$_GET['start_price'];
    $max_price=$_GET['end_price'];

    $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->whereBetween('tbl_product.product_price',[$min_price,$max_price])->orderBy('product_price','ASC')
    ->paginate(6)->appends(request()->query());

   }
   else{ 
   
    $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_product.category_id',$category_id)->orderBy('product_id','DESC')
        ->paginate(6);
}
  



    
     return view('pages.category.show_category')->with('rating', $rating)->with('category', $cate_product)->with('product', $all_product)->with('all_product1', $all_product1)->with('category_id', $all_product)
     ->with('category_name',  $category_name)->with('the_first',$the_first)->with('cate_product_tuoi', $cate_product_tuoi)->with('cate_product_si', $cate_product_si)->with('yeu_product',$yeu_product)->with('yeu_product1',$yeu_product1);

}   


public function show_category_home_si($category_id){
    $cate_product_tuoi=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','21')->first();
    $cate_product_si=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();

   $the_first=DB::table('tbl_category_product')->where('category_id',$category_id)->get();
   $cate_product=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','!=','21')
    ->where('category_id','!=','22')->orderBy('category_id','desc')->get();


    $yeu_product1=DB::table('tbl_product')->join('tbl_rating','tbl_product.product_id','=','tbl_rating.product_id')
    ->select('tbl_rating.product_id',DB::raw("sum(tbl_rating.product_id) as row"))->groupBy('tbl_rating.product_id')
    ->where('category_id','!=','22')->orderBy('row','DESC')->limit(4)->get();//get la lay het
   
     
      $yeu_product=DB::table('tbl_product')
          ->where('category_id','!=','22')->orderBy('product_id','desc')->get();//get la lay het

$all_product=DB::table('tbl_product')
->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_product.category_id',$category_id)->orderBy('tbl_product.category_id','desc')->paginate(8);//get la lay het

$all_product1=DB::table('tbl_product')
->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_product.category_id',$category_id)->orderBy('tbl_product.category_id','desc')->get();
$category_name=DB::table('tbl_category_product')->where('category_id',$category_id)->limit(1)->get();

$rating=DB::table('tbl_rating')->get();



if(isset($_GET['sort_by'])){
$sort_by=$_GET['sort_by'];

if($sort_by=='az'){
    $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_product.category_id',$category_id)->orderBy('product_name','ASC')
->paginate(6)->appends(request()->query());



}elseif($sort_by=='za'){


    $all_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_product.category_id',$category_id)->orderBy('product_name','DESC')
    ->paginate(6)->appends(request()->query());

}








}






return view('pages.category.show_category_si')->with('rating', $rating)->with('category', $cate_product)->with('product', $all_product)->with('all_product1', $all_product1)->with('category_id', $all_product)
->with('category_name',  $category_name)->with('the_first',$the_first)->with('cate_product_tuoi', $cate_product_tuoi)->with('cate_product_si', $cate_product_si)->with('yeu_product',$yeu_product)->with('yeu_product1',$yeu_product1);

}   

   
  






public function show_chi_tiet($category_id){
    
    $yeu_product1=DB::table('tbl_product')->join('tbl_rating','tbl_product.product_id','=','tbl_rating.product_id')
    ->select('tbl_rating.product_id',DB::raw("sum(tbl_rating.product_id) as row"))->groupBy('tbl_rating.product_id')
    ->where('category_id','!=','22')->orderBy('row','DESC')->limit(4)->get();//get la lay het
   
     
      $yeu_product=DB::table('tbl_product')
          ->where('category_id','!=','22')->orderBy('product_id','desc')->get();//get la lay het
    $cate_product_tuoi=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
    $cate_product_si=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
       
    $lagery=Lagery::where('product_id',$category_id)->get();
    $ten_cuahang=DB::table('tbl_category_product')->where('category_id',$category_id)->first();
    $cate_product=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','!=','21')
    ->where('category_id','!=','22')->orderBy('category_id','desc')->get();
    $detail_product=DB::table('tbl_product')
    ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_product.product_id',$category_id)->get();//get la lay het
  
    $product=DB::table('tbl_product')->where('product_id',$category_id)->first();
    $data['product_views']=$product->product_views + 1;
    DB::table('tbl_product')->where('product_id',$product->product_id)->update($data);

    
    $magiam =DB::table('tbl_coupon')->orderBy('coupon_id','DESC')->first();
   
   
    $comment=DB::table('tbl_product') ->join('tbl_comment','tbl_product.product_id','=','tbl_comment.product_id')
   ->join('tbl_customer','tbl_customer.customer_id','=','tbl_comment.customer_id')->where('tbl_comment.product_id',$category_id)->orderBy('tbl_comment.comment_id','desc')->get();
   $rating=Rating::where('product_id',$category_id)->avg('rating');
     $rating=round( $rating);
     echo $rating;

   foreach ( $detail_product as $key => $valu) {//danh muc san pham
   foreach ( $detail_product as $key => $valu) {//danh muc san pham
    $product = $valu->category_id;
    }

   $relate_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_category_product.category_id', $product)->whereNotIn('tbl_product.product_id',[$category_id])->take(8)->get();//get la 
   return view('pages.sanpham.product_detail')->with('category', $cate_product)->with('detail_product',$detail_product)->with('relate_product',  $relate_product)->with('comment',$comment)
   ->with('rating',$rating)->with('ten_cuahang',$ten_cuahang)->with('lagery',$lagery)->with( 'magiam', $magiam)->with('cate_product_tuoi', $cate_product_tuoi)->with('cate_product_si', $cate_product_si)->with('yeu_product',$yeu_product)->with('yeu_product1',$yeu_product1);
   
}
   }
   public function show_chi_tiet_si($category_id){
    
    $yeu_product1=DB::table('tbl_product')->join('tbl_rating','tbl_product.product_id','=','tbl_rating.product_id')
    ->select('tbl_rating.product_id',DB::raw("sum(tbl_rating.product_id) as row"))->groupBy('tbl_rating.product_id')
    ->where('category_id','!=','22')->orderBy('row','DESC')->limit(4)->get();//get la lay het
   
     
      $yeu_product=DB::table('tbl_product')
          ->where('category_id','!=','22')->orderBy('product_id','desc')->get();//get la lay het
    $cate_product_tuoi=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
    $cate_product_si=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','=','22')->first();
       
    $lagery=Lagery::where('product_id',$category_id)->get();
    $ten_cuahang=DB::table('tbl_category_product')->where('category_id',$category_id)->first();
    $cate_product=DB::table('tbl_category_product')->where('category_status','1')->where('category_id','!=','21')
    ->where('category_id','!=','22')->orderBy('category_id','desc')->get();
    $detail_product=DB::table('tbl_product')
    ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_product.product_id',$category_id)->get();//get la lay het
  
    $product=Product::where('product_id',$category_id)->first();
    $product->product_views=  $product->product_views + 1;
    //$product->save();
    $magiam =DB::table('tbl_coupon')->orderBy('coupon_id','DESC')->first();
   
   
    $comment=DB::table('tbl_product') ->join('tbl_comment','tbl_product.product_id','=','tbl_comment.product_id')
   ->join('tbl_customer','tbl_customer.customer_id','=','tbl_comment.customer_id')->where('tbl_comment.product_id',$category_id)->orderBy('tbl_comment.comment_id','desc')->get();
   $rating=Rating::where('product_id',$category_id)->avg('rating');
     $rating=round( $rating);
     echo $rating;

   foreach ( $detail_product as $key => $valu) {//danh muc san pham
   foreach ( $detail_product as $key => $valu) {//danh muc san pham
    $product = $valu->category_id;
    }

   $relate_product=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->where('tbl_category_product.category_id', $product)->whereNotIn('tbl_product.product_id',[$category_id])->take(8)->get();//get la 
   return view('pages.sanpham.product_detail_si')->with('category', $cate_product)->with('detail_product',$detail_product)->with('relate_product',  $relate_product)->with('comment',$comment)
   ->with('rating',$rating)->with('ten_cuahang',$ten_cuahang)->with('lagery',$lagery)->with( 'magiam', $magiam)->with('cate_product_tuoi', $cate_product_tuoi)->with('cate_product_si', $cate_product_si)->with('yeu_product',$yeu_product)->with('yeu_product1',$yeu_product1);
   
}
   }
   
   public function insert_rating(Request $request){
    $data =$request->all();
    $rating=new Rating();
    $rating->product_id=$data['product_id'];
    $rating->rating=$data['index'];
    $rating->save();
    echo 'done';




   }
}
