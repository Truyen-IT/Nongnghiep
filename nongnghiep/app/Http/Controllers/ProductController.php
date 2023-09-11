<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Lagery;
session_start();

class ProductController extends Controller
{
    public function kiemtralog(){
        $admin_id=Session::get('admin_id');
        $nhanvien_id=Session::get('nhanvien_id');
        if($admin_id){
          return  Redirect::to('admin.dashboard');
        }elseif($nhanvien_id){
            return  Redirect::to('admin.dashboard');


        }
        else{
           return  Redirect::to('admin')->send();
        }

    }
    public function add_product(){
        $this->kiemtralog();
        $cate_product=DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
      
        return view('admin.add_product')->with('cate_product',$cate_product);
    }
   public function add_image_product(){
    $pro=DB::table('tbl_product')->orderBy('product_id','desc')->get();
   
    // $manager=view('admin.add_image_product')->with('product',$pro);
    // return view('admin_layout')->with('admin.add_image_product',$manager);  
   
     return view('admin.add_image_product')->with('pro',$pro);

   }
   public function save_image_product(Request $request){
    $data=$request->all();

    echo '<pre>';
            
            print_r($request->lagery_image);
          
            echo '<pre>';
      foreach($request->lagery_image as $file){
        $filename=time().'_'.$file->getClientOriginalName();
        $file=new Lagery();
        $file->lagery_image=$filename;
        $file->save();

        
    }
    // $data=$request->validate(
    //     [
          
            
    //         'lagery_image'=>'required|max:255',
    //         'product_id'=>'required|max:255',
           
            
    //     ],
    //     [
            
    //          'product_id.required'=>'Tên sản phẩm phải có',
    //          'lagery_image.required'=>'Hình ảnh sản phẩm phải có',
            
             
            
    //     ]

    // );
    // $data['product_id']=$request->product_id;
  
   
    // $get_image=$request->file('lagery_image');
    // if($get_image){
    //     $get_name_image=$get_image->getClientOriginalName();
    //     $name=current(explode('.',$get_name_image));//curen la lay dau exlode la chia ra 2 end la lay cuoi
    //     $new_image=$name.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    //     $get_image->move('upload',$new_image);
    //     $data['lagery_image']=$new_image;
    //     DB::table('tbl_lagery')->insert($data);
    //     Session::put('mes','Thêm hình ảnh sản phẩm thành công');
    //     return Redirect::to('add-image-product');




    // }
    // $data['lagery_image']='';
    // DB::table('tbl_product')->insert($data);
    // Session::put('mes','Thêm hình ảnh sản phẩm thành công');
    // return Redirect::to('add-image-product');

   }

   
   
   public function all_image_product(){
    $all_image_product1=DB::table('tbl_lagery')
    ->join('tbl_product','tbl_lagery.product_id','=','tbl_product.product_id')->orderBy('tbl_lagery.lagery_id','desc')->get();//get la lay het
    $k=0;
    foreach($all_image_product1 as $key =>$va){
        
        $k++;
    }
    $all_image_product=DB::table('tbl_lagery')
    ->join('tbl_product','tbl_lagery.product_id','=','tbl_product.product_id')->orderBy('tbl_lagery.lagery_id','desc')->paginate(9);//get la lay het
    
    $manager=view('admin.all_image_product')->with('all_image_product',$all_image_product)->with('k',$k);
    return view('admin_layout')->with('admin.all_image_product',$manager);

   }
    public function all_product(){
      
      $all_product=DB::table('tbl_product')
      ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderBy('tbl_product.category_id','desc')->paginate(4);//get la lay het
      $tong_product=DB::table('tbl_product')
      ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->orderBy('tbl_product.category_id','desc')
      ->get();//get la lay het
      
      $k=0;
     foreach($tong_product as $key => $va){
        $k++;

     }
    

      $manager=view('admin.all_product')->with('all_product',$all_product)->with('k',$k);
      return view('admin_layout')->with('admin.all_product',$manager);
    }
    public function save_product(Request $request){
        $data=array();//tao ra cai mang
       $data=$request->validate(
        [
          
           
          
            'product_content'=>'required|max:5000',
           
            
            'product_noibat'=>'required',
            
        ],
        [
             
             
             'product_content.required'=>'Nội dung sản phẩm phải có',
            // 'product_gia.required'=>'Gia sản phẩm phải có',
             'product_noibat.required'=>'sản phẩm nổi bật or không nổi bật phải có phải có',
             
            
        ]

    );
     
        $data['product_name']=$request->product_name;
        $data['product_desc']=$request->product_desc;//cong dụng sản phẩm
        $data['product_content']=$request->product_content;//noi dung san pham
        $data['product_price']=$request->product_gia;
        $data['price_cost']=$request->price_cost;
        $data['category_id']=$request->product_cate;//danh mucj san pham
        $data['product_noibat']=$request->product_noibat;
        if(isset($request->vitamina)){
            $data['product_vitamina']=$request->vitamina;

        }else {
            $data['product_vitamina']=0;
        }
        if(isset($request->vitaminb)){
            $data['product_vitaminb']=$request->vitaminb;

        }else {
            $data['product_vitaminb']=0;
        }
        if(isset($request->vitamind)){
            $data['product_vitamind']=$request->vitamind;

        }else {
            $data['product_vitamind']=0;
        }
        if(isset($request->vitamine)){
            $data['product_vitamine']=$request->vitamine;

        }else {
            $data['product_vitamine']=0;
        }
        
        
        if(isset($request->vitaminc)){
            $data['product_vitaminc']=$request->vitaminc;//san pham co le ban yeu thich

        }else {
            $data['product_vitaminc']=0;
        }
        $data['product_thanhphan']=$request->product_thanhphan;//thanh phan san pham
       
        $data['product_hdsd']=$request->product_hdsd;//huong dan su dung
       
        $data['product_baoquan']=$request->product_baoquan;//bao quan
        
        $data['product_hsd']=$request->product_hsd;//hạng su dung
        $data['product_thetichthuc']=$request->product_thetichthuc;//khoio luong
        
        $data['product_luuy']=$request->product_luuy;//luu ý
       
        $data['product_mota']=$request->product_mota; //mô tả sản phẩm
        $data['product_chungnhan']=$request->product_chungnhan;//chứng nhận sản phâ
        $data['product_chatluong']=$request->product_chatluong;//chat luọng sản phẩm
        $data['product_donggoi']=$request->product_donggoi;//dóng nói
        
        $data['product_xuatxu']=$request->product_xuatxu;//xuất su
        $data['product_muasi']=$request->product_muasi;//số điẹn thoại mua si
        
        $data['product_thanhduong']=$request->product_thanhduong;//thanh phân dinh duong
       
       $data['product_status']=$request->product_status;

        $get_image=$request->file('product_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name=current(explode('.',$get_name_image));//curen la lay dau exlode la chia ra 2 end la lay cuoi
            $new_image=$name.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            
            $get_image->move('upload',$new_image);
           
            $data['product_image']=$new_image;
            DB::table('tbl_product')->insert($data);
           
            
            if($request->lagery_image){
                $cate=DB::table('tbl_product')->orderBy('product_id','desc')->first();
                $cate=$cate->product_id;
       
                foreach($request->lagery_image as $file){
                    $get_name_image=$file->getClientOriginalName();
                    $name=current(explode('.',$get_name_image));//curen la lay dau exlode la chia ra 2 end la lay cuoi
                    $new_image=$name.rand(0,99).'.'.$file->getClientOriginalExtension();
                   
                   
                    $set=new Lagery();
                    $file->move('upload',$new_image);
                    $set->lagery_image=$new_image;
                    $set->product_id=$cate;
                    $set->save();
            
                    
                }
            }

            
            Session::put('mes','Thêm sản phẩm thành công');
            return Redirect::to('add-product');




        }
        $data['product_image']='';
        DB::table('tbl_product')->insert($data);

        if($request->lagery_image){
            $cate=DB::table('tbl_product')->orderBy('product_id','desc')->first();
            $cate=$cate->product_id;
       
            foreach($request->lagery_image as $file){
                $get_name_image=$file->getClientOriginalName();
                $name=current(explode('.',$get_name_image));//curen la lay dau exlode la chia ra 2 end la lay cuoi
                $new_image=$name.rand(0,99).'.'.$file->getClientOriginalExtension();
               
               
                $set=new Lagery();
                $file->move('upload',$new_image);
                $set->lagery_image=$new_image;
                $set->product_id=$cate;
                $set->save();
        
                
            }
        }


        Session::put('mes','Thêm sản phẩm thành công');
        return Redirect::to('add-product');


    }
     public function hienthi($product_id)
    {
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        return Redirect::to('all-product');
        
    }
    public function an($product_id)
    {
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        return Redirect::to('all-product');
    }
    public function edit_image_product($lagery_id){
        $cate_product=DB::table('tbl_product')->orderBy('product_id','desc')->get();
        $edit_image_product=DB::table('tbl_lagery')->where('lagery_id',$lagery_id)->get();//fift la lay 1
        $manager_product=view('admin.edit_image_product')->with('edit_image_product',$edit_image_product)->with('cate_product',$cate_product);
        return view('admin_layout')->with('admin.edit_image_product',$manager_product);

    }
    public function edit($product_id)
    
    {
         $cate_product=DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
         
         $edit_product=DB::table('tbl_product')->where('product_id',$product_id)->get();//fift la lay 1
       
        $manager_product=view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product);
        return view('admin_layout')->with('admin.edit_product',$manager_product);
       
       
    }
    
    public function update(Request $request,$product_id){
        $data=array();//tao ra cai mang
       

        if(isset($request->vitamina)){
            $data['product_vitamina']=$request->vitamina;

        }else {
            $data['product_vitamina']=0;
        }
        if(isset($request->vitaminb)){
            $data['product_vitaminb']=$request->vitaminb;

        }else {
            $data['product_vitaminb']=0;
        }
        if(isset($request->vitamind)){
            $data['product_vitamind']=$request->vitamind;

        }else {
            $data['product_vitamind']=0;
        }
        if(isset($request->vitamine)){
            $data['product_vitamine']=$request->vitamine;

        }else {
            $data['product_vitamine']=0;
        }
       
        $data['product_vitaminc']=$request->vitaminc;//san pham co le ban yeu thich

     
        $data['product_name']=$request->product_name;
        $data['product_desc']=$request->product_desc;
        $data['product_content']=$request->product_content;
        $data['product_price']=$request->product_gia;
        $data['price_cost']=$request->price_cost;
        $data['category_id']=$request->product_cate;
        $data['product_noibat']=$request->product_noibat;
       
        $data['product_status']=$request->product_status;
       
       
       

        $data['product_thanhphan']=$request->product_thanhphan;//thanh phan san pham
        $data['product_hdsd']=$request->product_hdsd;//huong dan su dung
        $data['product_baoquan']=$request->product_baoquan;//bao quan
        $data['product_hsd']=$request->product_hsd;//hạng su dung
        $data['product_thetichthuc']=$request->product_thetichthuc;//khoio luong
        
        $data['product_luuy']=$request->product_luuy;//luu ý
       
        $data['product_mota']=$request->product_mota; //mô tả sản phẩm
        $data['product_chungnhan']=$request->product_chungnhan;//chứng nhận sản phâ
        $data['product_chatluong']=$request->product_chatluong;//chat luọng sản phẩm
        $data['product_donggoi']=$request->product_donggoi;//dóng nói
        
        $data['product_xuatxu']=$request->product_xuatxu;//xuất su
        $data['product_muasi']=$request->product_muasi;//số điẹn thoại mua si
        
        $data['product_thanhduong']=$request->product_thanhduong;//thanh phân dinh duong

       
       
       
       
       
        $get_image=$request->file('product_image');
        if($get_image){
            $get_name_image=$get_image->getClientOriginalName();
            $name=current(explode('.',$get_name_image));//curen la lay dau exlode la chia ra 2 end la lay cuoi
            $new_image=$name.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('upload',$new_image);
            $data['product_image']=$new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('mes','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');




        }
        
        
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('mes','cập nhật sản phẩm thành công');
        return Redirect::to('all-product');


    }
  public function  delete_lagery_product($lagery_id){
    DB::table('tbl_lagery')->where('lagery_id',$lagery_id)->delete();
    Session::put('mes','Xóa hình ảnh sản phẩm thành công');
    return Redirect::to('all-image-product');
  }
  public function update_image_product(Request $request,$lagery_id){
    $data=array();//tao ra cai mang
   
    $data['product_id']=$request->product_lagery_name;
    $get_image=$request->file('product_lagery_image');
    if($get_image){
        $get_name_image=$get_image->getClientOriginalName();
        $name=current(explode('.',$get_name_image));//curen la lay dau exlode la chia ra 2 end la lay cuoi
        $new_image=$name.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('upload',$new_image);
        $data['lagery_image']=$new_image;
        DB::table('tbl_lagery')->where('lagery_id',$lagery_id)->update($data);
        Session::put('mes','Cập nhật hình ảnh thành công');
        return Redirect::to('all-image-product');




    }
    
    
    DB::table('tbl_lagery')->where('lagery_id',$lagery_id)->update($data);
    Session::put('mes','Cập nhật hình ảnh thành công');
    return Redirect::to('all-image-product');


}
    public function delete($product_id)
    {
     DB::table('tbl_product')->where('product_id',$product_id)->delete();
     Session::put('mes','Xóa sản phẩm thành công');
     
     return Redirect::to('all-product');
    }
    

}
