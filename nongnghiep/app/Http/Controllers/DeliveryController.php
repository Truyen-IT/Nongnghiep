<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;


use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
session_start();
class DeliveryController extends Controller
{
   public function delevery(Request $request){
    $city=City::orderby('matp','ASC')->get();
    return view('admin.delivery.add_delivery')->with(compact('city'));

   }
//    public function update_delivery(Request $request){
//     $data = $request->all();
//     $fee_ship = Feeship::find($data['feeship_id']);
//     $fee_value = rtrim($data['fee_value'],'.');
//     $fee_ship->fee_feeship = $fee_value;
//     $fee_ship->save();
// }
public function update_delivery(Request $request){



    $datas=array();//tao ra cai mang
    $data=$request->all();
    
    $fee_valu=rtrim($data['fee_value'],'.');
    $datas['fee_feeship']=$fee_valu;
    
    DB::table('tbl_feeship')->where('fee_id',$data['feeship_id'])->update($datas);
  
   




    
    


}

public function select_feeship(){
    $feeship=DB::table('tbl_feeship')->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','=','tbl_feeship.fee_matp')
     ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','=','tbl_feeship.fee_maqh')
     ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.xaid','=','tbl_feeship.fee_xaid')->orderby('fee_id','DESC')->get();
    $output = '';
    $output .= '
    
    <div></div>
    <div class="table-responsive">  
        <table class="table table-bordered">
            <thread> 
                <tr>
                    <th>Tên thành phố</th>
                    <th>Tên quận huyện</th> 
                    <th>Tên xã phường</th>
                    <th>Phí ship</th>
                </tr>  
            </thread>
            <tbody>
            ';

            foreach($feeship as $key => $fee){

            $output.='
                <tr>
                <td>'.$fee->name_city.'</td>
                <td>'.$fee->name_quanhuyen.'</td>
                <td>'.$fee->name_xaphuong.'</td>
               
                
              
                    <td contenteditable data-feeship_id="'.$fee->fee_id.'" class="fee_feeship_edit">'.number_format($fee->fee_feeship,0,',','.').'</td>
                </tr>
                ';
            }

            $output.='		
            </tbody>
            </table></div>
            ';

            echo $output;

    
}
public function insert_delivery(Request $request){
    $data = $request->all();
    $fee_ship = new Feeship();
    $fee_ship->fee_matp = $data['city'];
    $fee_ship->fee_maqh = $data['province'];
    $fee_ship->fee_xaid = $data['wards'];
    $fee_ship->fee_feeship = $data['fee_ship'];
    $fee_ship->save();
}

public function select_delivery(Request $request){
    $data = $request->all();
    if($data['action']){
        $output = '';
        if($data['action']=="city"){
            $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                $output.='<option>---Chọn quận huyện---</option>';
            foreach($select_province as $key => $province){
                $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
            }

        }else{

            $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
            $output.='<option>---Chọn xã phường---</option>';
            foreach($select_wards as $key => $ward){
                $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
            }
        }
       
        echo $output;
    }
    
}
public function save_diachi(Request $request){
    $data=$request->all();
   
    $data=array();
    $data['customer_id']=Session::get('customer_id');
    $data['shipping_name']=$request->shipping_name;
    
    $data['city']=$request->city;
    
    $data['province']=$request->province;
    $data['wards']=$request->wards;
    $data['shipping_address']=$request->shipping_address;
    
    $data['shipping_email']=$request->shipping_email;
    $data['shipping_phone']=$request->shipping_phone;
   
    
    

    if($data['city']){
        $feeship = Feeship::where('fee_matp',$data['city'])->where('fee_maqh',$data['province'])->where('fee_xaid',$data['wards'])->get();
        if($feeship){
            $count_feeship = $feeship->count();
            if($count_feeship>0){
                 foreach($feeship as $key => $fee){
                    $data['feeship']=$fee->fee_feeship;
                    DB::table('tbl_diachi')->insert($data);
                    
    
                    echo '<pre>';
        
            print_r($data);
            
            echo '<pre>';
            $diachi=DB::table('tbl_diachi')
            ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','=','tbl_diachi.city')
            ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','=','tbl_diachi.province')
            ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.xaid','=','tbl_diachi.wards')->where('customer_id',$data['customer_id'])->first();

  
        $persion[]=array(
            'shipping_name'=>$data['shipping_name'],
            'shipping_phone'=>$data['shipping_phone'],
            'shipping_address'=>$data['shipping_address'],
            'shipping_email'=>$data['shipping_email'],
            'city'=>$data['city'],
            'province'=>$data['province'],
            'wards'=>$data['wards'],
            'name_city'=>$diachi->name_city,
            'name_quanhuyen'=> $diachi->name_quanhuyen,
            'name_xaphuong'=> $diachi->name_xaphuong,

          

        );
       
        Session::put('persion',$persion);
        Session::put('fee', $data['feeship']);
        Session::save();
        return redirect()->back();
                }
            }else{ 
                $feeship = Feeship::where('fee_matp',$data['city'])->where('fee_maqh',$data['province'])->where('fee_xaid',$data['wards'])->get();
                echo '<pre>';
        
            print_r( $feeship);
            
             echo '<pre>';
             $diachi=DB::table('tbl_diachi')
             ->join('tbl_tinhthanhpho','tbl_tinhthanhpho.matp','=','tbl_diachi.city')
             ->join('tbl_quanhuyen','tbl_quanhuyen.maqh','=','tbl_diachi.province')
             ->join('tbl_xaphuongthitran','tbl_xaphuongthitran.xaid','=','tbl_diachi.wards')->first();
                $data['feeship']=25000;
                $persion[]=array(
                    'shipping_name'=>$data['shipping_name'],
                    'shipping_phone'=>$data['shipping_phone'],
                    'shipping_address'=>$data['shipping_address'],
                    'shipping_email'=>$data['shipping_email'],
                    'city'=>$data['city'],
                    'province'=>$data['province'],
                    'wards'=>$data['wards'],
                    'name_city'=> $diachi->name_city,
                    'name_quanhuyen'=> $diachi->name_quanhuyen,
                    'name_xaphuong'=> $diachi->name_xaphuong,
        
                  
        
                );
                DB::table('tbl_diachi')->insert($data);
                Session::put('fee', $data['feeship']);
                return redirect()->back();

                
            }
        }
       
    }


}

}
