<?php

namespace App\Http\Controllers;

use App\Exports\DiemdanhExport;
use App\Exports\DiemdanhExport2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
session_start();
use Maatwebsite\Excel\Facades\Excel;//

use Illuminate\Support\Facades\Redirect;
use App\Models\Nhanvien;
use App\Models\Chucvu;
use \PDF;
class DiemdanhController extends Controller
{

  public function in(Request $request){
    $data=$request->all();
    $ten=$data['ten'];
    $songay=$data['songay'];
    $tongtien=$data['tongtien'];
    $socap=$data['socap'];
    $tien=$data['tien'];
    

		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->print_order_convert($ten,$songay,$tongtien,$socap,$tien));
		
		return $pdf->stream();
	}

  public function print_order_convert($ten,$songay,$tongtien,$socap,$tien){
    $output = '';
    $output.='<style>body{
      font-family: DejaVu Sans;
  }
  .table-styling{
      border:1px solid #000;
      width: 100%;
      
      
  }
  .table-styling tbody tr td{
      border:1px solid #000;
     
  }
  tr .tex {
    text-align: center;
  }
  </style>
  
  <h2><center>Tiền Lương</center></h2>
 
  
  
  <table class="table-styling">
          <thead>
              <tr>
                  <th>Tên Nhân Viên</th>
                  <th>Cấp Bật</th>
                 
              </tr>
          </thead>
          <tbody>';
          
  $output.='		
              <tr>
                  <td class="tex">'.$ten.'</td>
                  <td class="tex">'.$socap.'</td>
                  
              </tr>';
          
  
  $output.='				
          </tbody>
      
  </table>
  <table class="table-styling">
				<thead>
					<tr>
						<th class="tex">Tính công</th>
		      </tr>
				</thead>
				<tbody>';
  
  
  $output.='<tr>
      <td colspan="2">
          <p>Số Ngày Làm: '.$songay.'</p>
          <p>Giá 1 Ngày: '.$tien.'đ'.'</p>
          <p>Tổng Tiền : '.$tongtien.'đ'.'</p>
      </td>
  </tr>';
  $output.='
  



  </tbody>
			
  </table>

  <p>Ký tên</p>
    <table>
      <thead>
        <tr>
          <th width="200px">Người lập phiếu</th>
          <th width="800px">Người nhận</th>
          
        </tr>
      </thead>
      <tbody>';
          
  $output.='				
      </tbody>
    
  </table>

  ';
  
  
		return $output;

	}
     
  public function all_one(Request $request){
       $id=$request->id;
      $ngaydau=$request->ngaydau;
      $ngaycuoi=$request->ngaycuoi;
      //  echo '<pre>';
      //       print_r( $id);
      //       print_r(  $ngaydau);
      //       print_r( $ngaycuoi);
          

      //       echo '</pre>';
    if(!empty($ngaydau) && !empty($ngaycuoi)){
   
    $all_nhanvien=DB::table('tbl_nhanvien')->orderBy('tbl_nhanvien.nhanvien_id','desc')->get();
    $all_product=DB::table('tbl_diemdanh')
   ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
   ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->where('tbl_nhanvien.nhanvien_id',$id)->whereBetween('tbl_diemdanh.admin_time',[$ngaydau,$ngaycuoi])->orderBy('tbl_diemdanh.diemdanh_id','desc')->get();//get la lay het
  //  echo '<pre>';
  //           print_r( $id);
  //           print_r(  $all_product);
  //           print_r( $ngaycuoi);
          

  //           echo '</pre>'; 
     $manager=view('admin.all_one')->with('all_diemdanh', $all_product)->with('all_nhanvien',$all_nhanvien);
     return view('admin_layout')->with('admin.all_one',$manager);
     return Redirect::to('\ngaylam-nv');
    }

  }
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
    
        public function all_diemdanh(){
          $this->kiemtralog();
          
          if(isset($_GET['date'])){
            $i=$_GET['date'];
            $ngay=$_GET['date'];
           $all_diemdanh=DB::table('tbl_diemdanh')->get();
           $all_nhanvien=DB::table('tbl_nhanvien')->orderBy('tbl_nhanvien.nhanvien_id','desc')->get();
          $all_diemdanh1=DB::table('tbl_diemdanh')
          ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
          ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->orderBy('tbl_diemdanh.diemdanh_id','desc')->get();//get la lay het
          $k=0;
          foreach($all_diemdanh1 as $key=>$va){
            $k++;
          }
          $all_diemdanh=DB::table('tbl_diemdanh')
          ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
          ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->where('tbl_diemdanh.admin_time','=',$ngay)->orderBy('tbl_diemdanh.diemdanh_id','desc')->paginate(9);
           
          $manager=view('admin.all_diemdanh')->with('all_diemdanh', $all_diemdanh)->with('all_nhanvien',$all_nhanvien)->with('k',$k)->with('ngay',$ngay)->with('i',$i);
            return view('admin_layout')->with('admin.all_diemdanh',$manager);
         
          }else{
            $i =' ';
            $ngay =' ';
            $all_diemdanh=DB::table('tbl_diemdanh')->get();
            $all_nhanvien=DB::table('tbl_nhanvien')->orderBy('tbl_nhanvien.nhanvien_id','desc')->get();
           $all_diemdanh1=DB::table('tbl_diemdanh')
           ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
           ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->orderBy('tbl_diemdanh.diemdanh_id','desc')->get();//get la lay het
           $k=0;
           foreach($all_diemdanh1 as $key=>$va){
             $k++;
           }
           $all_diemdanh=DB::table('tbl_diemdanh')
           ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
           ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->orderBy('tbl_diemdanh.diemdanh_id','desc')->paginate(9);
            
           $manager=view('admin.all_diemdanh')->with('all_diemdanh', $all_diemdanh)->with('all_nhanvien',$all_nhanvien)->with('k',$k)->with('ngay',$ngay)->with('i',$i);
             return view('admin_layout')->with('admin.all_diemdanh',$manager);
        
        
          }
        }
        public function export_1(){
        
          return Excel::download(new DiemdanhExport,'users.xlsx');

          
        }
        public function export_2($ngay){
          return Excel::download(new DiemdanhExport2($ngay),'users1.xlsx');
        
          
        }
         
         
         
         
         
         
          public function xem_nhanvien($id_nhanvien){
            $nhanvien=DB::table('tbl_nhanvien')->join('tbl_cap','tbl_cap.cap_id','=','tbl_nhanvien.cap_id')->where('tbl_nhanvien.nhanvien_id',$id_nhanvien)->get();
            $manager=view('admin.xem_nhanvien')->with('nhanvien', $nhanvien);
            return view('admin_layout')->with('admin.xem_nhanvien',$manager);

          }
          
          
          
          public function tatca_diemdanh(Request $request){
            $id=$request->nhanvien_id;
            $ngaydau=$request->ngaydau;
            $ngaycuoi=$request->ngaycuoi;
            if($id &&$ngaydau &&$ngaycuoi){
           
            $all_nhanvien=DB::table('tbl_nhanvien')->orderBy('tbl_nhanvien.nhanvien_id','desc')->get();
            $all_product=DB::table('tbl_diemdanh')
           ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
           ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->where('tbl_nhanvien.nhanvien_id',$id)->whereBetween('tbl_diemdanh.admin_time',[ $ngaydau,$ngaycuoi])->orderBy('tbl_diemdanh.diemdanh_id','desc')->get();//get la lay het
             $manager=view('admin.all_diemdanh')->with('all_diemdanh', $all_product)->with('all_nhanvien',$all_nhanvien);
             return view('admin_layout')->with('admin.all_diemdanh',$manager);
            }elseif(empty($id) && empty($ngaydau)&& !empty($ngaycuoi)){
              $all_nhanvien=DB::table('tbl_nhanvien')->orderBy('tbl_nhanvien.nhanvien_id','desc')->get();
              $all_product=DB::table('tbl_diemdanh')
              ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
              ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->where('tbl_diemdanh.admin_time','<=',$ngaycuoi)->orderBy('tbl_diemdanh.diemdanh_id','desc')->get();//get la lay het
                $manager=view('admin.all_diemdanh')->with('all_diemdanh', $all_product)->with('all_nhanvien',$all_nhanvien);
                return view('admin_layout')->with('admin.all_diemdanh',$manager);

            }elseif(empty($id) && !empty($ngaydau) && empty($ngaycuoi)){
              $all_nhanvien=DB::table('tbl_nhanvien')->orderBy('tbl_nhanvien.nhanvien_id','desc')->get();
              $all_product=DB::table('tbl_diemdanh')
              ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
              ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->where('tbl_diemdanh.admin_time','>=',$ngaydau)->orderBy('tbl_diemdanh.diemdanh_id','desc')->get();//get la lay het
                $manager=view('admin.all_diemdanh')->with('all_diemdanh', $all_product)->with('all_nhanvien',$all_nhanvien);
                return view('admin_layout')->with('admin.all_diemdanh',$manager);

            }
            elseif(!empty($id) && empty($ngaydau) && empty($ngaycuoi)){
              $all_nhanvien=DB::table('tbl_nhanvien')->orderBy('tbl_nhanvien.nhanvien_id','desc')->get();
              $all_product=DB::table('tbl_diemdanh')
              ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
              ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->where('tbl_nhanvien.nhanvien_id',$id)->orderBy('tbl_diemdanh.diemdanh_id','desc')->get();//get la lay het
                $manager=view('admin.all_diemdanh')->with('all_diemdanh', $all_product)->with('all_nhanvien',$all_nhanvien);
                return view('admin_layout')->with('admin.all_diemdanh',$manager);

           }
           elseif(!empty($id) && !empty($ngaydau) && empty($ngaycuoi)){
            $all_nhanvien=DB::table('tbl_nhanvien')->orderBy('tbl_nhanvien.nhanvien_id','desc')->get();
            $all_product=DB::table('tbl_diemdanh')
            ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
            ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->where('tbl_nhanvien.nhanvien_id',$id)->where('tbl_diemdanh.admin_time','>=',$ngaydau)->orderBy('tbl_diemdanh.diemdanh_id','desc')->get();//get la lay het
              $manager=view('admin.all_diemdanh')->with('all_diemdanh', $all_product)->with('all_nhanvien',$all_nhanvien);
              return view('admin_layout')->with('admin.all_diemdanh',$manager);

         }
         elseif(!empty($id) && empty($ngaydau) && !empty($ngaycuoi)){
          $all_nhanvien=DB::table('tbl_nhanvien')->orderBy('tbl_nhanvien.nhanvien_id','desc')->get();
          $all_product=DB::table('tbl_diemdanh')
          ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
          ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->where('tbl_nhanvien.nhanvien_id',$id)->where('tbl_diemdanh.admin_time','<=',$ngaycuoi)->orderBy('tbl_diemdanh.diemdanh_id','desc')->get();//get la lay het
            $manager=view('admin.all_diemdanh')->with('all_diemdanh', $all_product)->with('all_nhanvien',$all_nhanvien);
            return view('admin_layout')->with('admin.all_diemdanh',$manager);

       }
       elseif(empty($id) && !empty($ngaydau) && !empty($ngaycuoi)){
        $all_nhanvien=DB::table('tbl_nhanvien')->orderBy('tbl_nhanvien.nhanvien_id','desc')->get();
        $all_product=DB::table('tbl_diemdanh')
        ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
        ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->whereBetween('tbl_diemdanh.admin_time',[ $ngaydau,$ngaycuoi])->orderBy('tbl_diemdanh.diemdanh_id','desc')->get();//get la lay het
          $manager=view('admin.all_diemdanh')->with('all_diemdanh', $all_product)->with('all_nhanvien',$all_nhanvien);
          return view('admin_layout')->with('admin.all_diemdanh',$manager);

     }



          
           elseif(empty($id) && empty($ngaydau) && empty($ngaycuoi)){
            $all_nhanvien=DB::table('tbl_nhanvien')->orderBy('tbl_nhanvien.nhanvien_id','desc')->get();
            $all_product=DB::table('tbl_diemdanh')
            ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
            ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->where('tbl_nhanvien.nhanvien_id',$id)->whereBetween('tbl_diemdanh.admin_time',[ $ngaydau,$ngaycuoi])->orderBy('tbl_diemdanh.diemdanh_id','desc')->get();//get la lay het
              $manager=view('admin.all_one')->with('all_diemdanh', $all_product)->with('all_nhanvien',$all_nhanvien);
              return view('admin_layout')->with('admin.all_diemdanh',$manager);

           }
          }
           
          
          
          
         public function ngaylam_nv($nhanvien_id){
          $all_diemdanh1=DB::table('tbl_diemdanh')
          ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
          ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->where('tbl_nhanvien.nhanvien_id',$nhanvien_id)->orderBy('tbl_diemdanh.diemdanh_id','desc')->get();//get la lay het->paginat
          $k=0;
          foreach($all_diemdanh1 as $key =>$va){
            $k++;
          }
          

              if(isset($_GET['ngaydau']) && isset($_GET['ngaycuoi'])){
                $ngaydau=$_GET['ngaydau'];
                $ngaycuoi=$_GET['ngaycuoi'];
               
               
                $all_diemdanh=DB::table('tbl_diemdanh')
                ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
                ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->where('tbl_nhanvien.nhanvien_id',$nhanvien_id)->whereBetween('tbl_diemdanh.admin_time',[$ngaydau,$ngaycuoi])->orderBy('tbl_diemdanh.diemdanh_id','desc')->paginate(9);//get la lay het->paginate(3)
                  $manager=view('admin.all_one')->with('all_diemdanh', $all_diemdanh)->with('k',$k);
                  return view('admin_layout')->with('admin.all_one',$manager);
                
                
                }elseif(isset($_GET['ngaydau']) && !isset($_GET['ngaycuoi'])){
                  $ngaydau=$_GET['ngaydau'];
                  $all_diemdanh=DB::table('tbl_diemdanh')
                  ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
                  ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->where('tbl_nhanvien.nhanvien_id',$nhanvien_id) ->where('tbl_diemdanh.admin_time','>=',$ngaydau)->orderBy('tbl_diemdanh.diemdanh_id','desc')->paginate(9);//get la lay het->paginate(3)
                    $manager=view('admin.all_one')->with('all_diemdanh', $all_diemdanh)->with('k',$k);
                    return view('admin_layout')->with('admin.all_one',$manager);
                 

                }
                elseif(!isset($_GET['ngaydau']) && isset($_GET['ngaycuoi'])){
                  $ngaycuoi=$_GET['ngaycuoi'];
                  $all_diemdanh=DB::table('tbl_diemdanh')
                  ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
                  ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->where('tbl_nhanvien.nhanvien_id',$nhanvien_id) ->where('tbl_diemdanh.admin_time','<=',$ngaycuoi)->orderBy('tbl_diemdanh.diemdanh_id','desc')->paginate(9);//get la lay het->paginate(3)
                    $manager=view('admin.all_one')->with('all_diemdanh', $all_diemdanh)->with('k',$k);
                    return view('admin_layout')->with('admin.all_one',$manager);
                 

                }
                else{
                  $all_diemdanh=DB::table('tbl_diemdanh')
                  ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
                  ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->where('tbl_nhanvien.nhanvien_id',$nhanvien_id)->orderBy('tbl_diemdanh.diemdanh_id','desc')->paginate(9);//get la lay het->paginate(3)
                    $manager=view('admin.all_one')->with('all_diemdanh', $all_diemdanh)->with('k',$k);
                    return view('admin_layout')->with('admin.all_one',$manager);

                }
              
              }

         
          public function add_nhanvien(){

            $all_cap=DB::table('tbl_cap')->get();
            $manager=view('admin.add_nhanvien')->with('all_cap',$all_cap);
            return view('admin_layout')->with('admin.add_nhanvien',$manager);

       
          }
        public function all_nhanvien(){
          $all_nhanvien1=DB::table('tbl_nhanvien')->join('tbl_cap','tbl_cap.cap_id','=','tbl_nhanvien.cap_id')->get();
          $k=0;
         
          foreach($all_nhanvien1 as $key=>$va){
            $k++;
          }
          $all_nhanvien=DB::table('tbl_nhanvien')->join('tbl_cap','tbl_cap.cap_id','=','tbl_nhanvien.cap_id')->paginate(9);
          $manager=view('admin.all_nhanvien')->with('all_nhanvien',$all_nhanvien)->with('k',$k);
       
          
          return view('admin_layout')->with('admin.all_nhanvien',$manager);
        }
        public function save_nhanvien(Request $request){
          $data=array();//tao ra cai mang

          $data=$request->validate(
            [
               
                'nhanvien_maso'=>'required|unique:tbl_nhanvien',
                'nhanvien_hoten'=>'required',
                'name_nhanvien'=>'required',
                'nhanvien_email'=>'required|unique:tbl_nhanvien',
                
                'nhanvien_ngay'=>'required',
                'nhanvien_sdt'=>'required',
                'nhanvien_diachi'=>'required',
                'nhanvien_gioitinh'=>'required',
                
            ],
            [
                 'nhanvien_maso.unique'=>'Mã số nhân viên đã có,xin hãy điền khác',
                 'nhanvien_maso.required'=>'Mã số bắt buộc phải có phải có',
                 'nhanvien_hoten.required'=>'Tên nhân viên phải có',
                'name_nhanvien.required'=>'Tên đăng nhập phải có',
                'nhanvien_email.unique'=>'Email nhân viên đã có,xin hãy điền email khác',
                'nhanvien_email.required'=>'Email nhân viên phải có phải có',
                'nhanvien_ngay.required'=>'Ngày bắt đầu làm phải có',
                'nhanvien_sdt.required'=>'Số điện thoại nhân viên phải có',
                'nhanvien_diachi.required'=>'Địa chỉ nhân viên phải có',
                'nhanvien_gioitinh.required'=>'Giới tính nhân viên phải có',
               
                 
                 
                
            ]
    
        );

           
          
            $data['nhanvien_maso']=$request->nhanvien_maso;
            $data['nhanvien_hoten']=$request->nhanvien_hoten;
            $data['cap_id']=$request->cap_id;
            $data['nhanvien_gioitinh']=$request->nhanvien_gioitinh;
            $data['nhanvien_email']=$request->nhanvien_email;
            $data['trangthai']=0;
            $data['name_nhanvien']=$request->name_nhanvien;
            $data['nhanvien_matkhau']=md5($request->nhanvien_matkhau);
            $data['nhanvien_sdt']=$request->nhanvien_sdt;
            $data['nhanvien_ngay']=$request->nhanvien_ngay;
            $data['nhanvien_diachi']=$request->nhanvien_diachi;
          
            // echo '<pre>';
            // print_r($data);
            // echo"phan tri truyen";

            // echo '</pre>';
            $get_image=$request->file('hinhanh_nhanvien');
            if($get_image){
                $get_name_image=$get_image->getClientOriginalName();
                $name=current(explode('.',$get_name_image));//curen la lay dau exlode la chia ra 2 end la lay cuoi
                $new_image=$name.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('xem-nhanvien/upload',$new_image);
               
                $data['nhanvien_hinhanh']=$new_image;
                DB::table('tbl_nhanvien')->insert($data);
                Session::put('mes','Thêm nhân viên thành công');
                return Redirect::to('all-nhanvien');
    
    
    
    
            }
            $data['nhanvien_hinhanh']='';
            DB::table('tbl_nhanvien')->insert($data);
            Session::put('mes','Thêm nhân viên thành công');
            return Redirect::to('all-nhanvien');

           
    
    
        }
        public function edit_nv1($nhanvien_id){
          $data=array();//tao ra cai mang
          $data['trangthai']=1;
          DB::table('tbl_nhanvien')->where('nhanvien_id',$nhanvien_id)->update($data);
          Session::put('mes','Đình chỉ làm việc thành công');
          return Redirect::to('all-nhanvien');
        }
        public function edit_nv2($nhanvien_id){
          $data=array();//tao ra cai mang
          $data['trangthai']=0;
          DB::table('tbl_nhanvien')->where('nhanvien_id',$nhanvien_id)->update($data);
          Session::put('mes','Nhân viên trở lại làm việc');
          return Redirect::to('all-nhanvien');
        }
        public function edit_kh1($customer_id){
          $data=array();//tao ra cai mang
          $data['trangthai']=1;
          DB::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
          Session::put('mes','Khóa tài khoản khách hàng thành công');
          return Redirect::to('all-customer');
        }
        public function edit_kh2($customer_id){
          $data=array();//tao ra cai mang
          $data['trangthai']=0;
          DB::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
          Session::put('mes','Mở tài khoản khách hàng thành công');
          return Redirect::to('all-customer');
        }
        public function update_nhanvien(Request $request,$nhanvien_id){
          $data=array();//tao ra cai mang
         
       
          $data['nhanvien_maso']=$request->maso_nhanvien;
            $data['nhanvien_hoten']=$request->name_nhanvien;
            $data['cap_id']=$request->cap_id;
            $data['nhanvien_gioitinh']=$request->gender;
            $data['nhanvien_email']=$request->email_nhanvien;
            $data['nhanvien_matkhau']=md5($request->matkhau_nhanvien);
            $data['nhanvien_sdt']=$request->sdt_nhanvien;
            $data['nhanvien_ngay']=$request->ngay_nhanvien;
            $data['nhanvien_diachi']=$request->diachi_nhanvien;

           $get_image=$request->file('hinhanh_nhanvien');
          if($get_image){
             

              $get_name_image=$get_image->getClientOriginalName();
              $name=current(explode('.',$get_name_image));//curen la lay dau exlode la chia ra 2 end la lay cuoi
              $new_image=$name.rand(0,99).'.'.$get_image->getClientOriginalExtension();
              $get_image->move('xem-nhanvien/upload',$new_image);
             
              $data['nhanvien_hinhanh']=$new_image;

              DB::table('tbl_nhanvien')->where('nhanvien_id',$nhanvien_id)->update($data);
              Session::put('mes','Cập nhật nhân viên thành công');
              return Redirect::to('all-nhanvien');
  
  
  
  
          }
          
          DB::table('tbl_nhanvien')->where('nhanvien_id',$nhanvien_id)->update($data);
              Session::put('mes','Cập nhật nhân viên thành công');
              return Redirect::to('all-nhanvien');
  
  
      }
      public function capnhat_nhanvien($id_nhanvien){
       
          
            $all_cap=DB::table('tbl_cap')->get();
            $nhanvien=DB::table('tbl_nhanvien')->where('nhanvien_id',$id_nhanvien)->get();//fift la lay 1
          
           $manager_product=view('admin.edit_nhanvien')->with('nhanvien',$nhanvien)->with('all_cap',$all_cap);
           return view('admin_layout')->with('admin.edit_nhanvien',$manager_product);
       
       return view('admin.edit_nhanvien')->with(compact('nhanvien'));
       }
        
       public function add_capnhanvien(){
          return view('admin.add_capnhanvien');
      }
      public function save_capnhanvien(Request $request){
        $data=array();//tao ra cai mang
       $data['category_name']=$request->UIDresult;
      
       
             
       $data=$request->validate(
        [
            
            'cap_name'=>'required|unique:tbl_cap|max:255',
          
            'captien'=>'required|numeric|max:255555555',
            
            
            
        ],
        [
            'cap_name.unique'=>'Tên chức vụ đã có xin điền tên khác',
             'cap_name.required'=>'Tên cấp nhân viên phải có',
             'captien.required'=>'Số tiền theo cấp phải có',
             'captien.numeric'=>'Số tiền theo cấp phải là số',
             
            
        ]

    );
        $data['cap_name']=$request->name_cap;
        $data['captien']=$request->captien;
       
        // echo '<pre>';
        // print_r($data);
        // echo"phan tri truyen";
        // echo '</pre>';
        DB::table('tbl_cap')->insert($data);
        Session::put('mes','Thêm chức vụ nhân viên thành công');
        return Redirect::to('add-capnhanvien');


    }
    public function all_capnhanvien(){
      $all_capnhanvien1=DB::table('tbl_cap')->get();
      $k=0;
      foreach( $all_capnhanvien1 as $key=>$va){
        $k++;

      }
      $all_capnhanvien=DB::table('tbl_cap')->paginate(9);
      $manager=view('admin.all_capnhanvien')->with('all_capnhanvien',$all_capnhanvien)->with('k',$k);
   
      
      return view('admin_layout')->with('admin.all_capnhanvien',$manager);
    }
    public function edit_cap($cap_id)
    {
        $edit_cap=DB::table('tbl_cap')->where('cap_id',$cap_id)->get();//fift la lay 1
        $manager=view('admin.edit_cap')->with('edit_cap',$edit_cap);
        return view('admin_layout')->with('admin.edit_cap',$manager);
       
       
    }
   
    public function  delete_chuc($cap_id)
    {
      DB::table('tbl_cap')->where('cap_id',$cap_id)->delete();
      Session::put('mes','Xóa chức vụ nhân viên thành công');
      
      return Redirect::to('all-capnhanvien');
     }
    public function update_cap(Request $request,$cap_id){
      $data=array();//tao ra cai mang
      // $data['category_name']=$request->UIDresult;
       $data['cap_name']=$request->cap_name;
       $data['captien']=$request->cap_tien;
      
      DB::table('tbl_cap')->where('cap_id',$cap_id)->update($data);
      Session::put('mes','Cập nhật chức vụ nhân viên thành công');
      return Redirect::to('all-capnhanvien');//tro ve

  }
  public function delete_nhanvien($nhanvien_id)
  {
   DB::table('tbl_nhanvien')->where('nhanvien_id',$nhanvien_id)->delete();
   Session::put('mes','Xóa nhân viên thành công');
   return Redirect::to('all-nhanvien');
  }
 public function load_users(){
  
 
 
   

 
  if(isset($_GET['date'])){
    $ngay=$_GET['date'];
    $all_nhanvien=DB::table('tbl_nhanvien')->orderBy('tbl_nhanvien.nhanvien_id','desc')->get();
  $all_diemdanh1=DB::table('tbl_diemdanh')
  ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
  ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->orderBy('tbl_diemdanh.diemdanh_id','desc')->get();//get la lay het
  $k=0;
  foreach($all_diemdanh1 as $key=>$va){
    $k++;
  }
  $all_diemdanh=DB::table('tbl_diemdanh')
  ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
  ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->where('tbl_diemdanh.admin_time','=',$ngay)->orderBy('tbl_diemdanh.diemdanh_id','desc')->paginate(9);
   
  return view('admin.load-users')->with('all_diemdanh', $all_diemdanh)->with('all_nhanvien',$all_nhanvien)->with('k',$k)->with('ngay',$ngay);

  }else{
  $all_nhanvien=DB::table('tbl_nhanvien')->orderBy('tbl_nhanvien.nhanvien_id','desc')->get();
  $all_diemdanh1=DB::table('tbl_diemdanh')
  ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
  ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->orderBy('tbl_diemdanh.diemdanh_id','desc')->get();//get la lay het
  $k=0;
  foreach($all_diemdanh1 as $key=>$va){
    $k++;
  }
  $all_diemdanh=DB::table('tbl_diemdanh')
  ->join('tbl_nhanvien','tbl_diemdanh.admin_maso','=','tbl_nhanvien.nhanvien_maso')
  ->join('tbl_cap','tbl_nhanvien.cap_id','=','tbl_cap.cap_id')->orderBy('tbl_diemdanh.diemdanh_id','desc')->paginate(9);
   
  return view('admin.load-users')->with('all_diemdanh', $all_diemdanh)->with('all_nhanvien',$all_nhanvien)->with('k',$k);
   
 }
}
public function diemdanh(){

}


      
    
}