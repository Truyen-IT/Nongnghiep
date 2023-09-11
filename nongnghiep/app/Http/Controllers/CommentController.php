<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

class CommentController extends Controller
{
    public function save_comment(Request $request){
        $data =$request->all();
        if(isset($data['customer_id'])){
        $comment=new Comment;
        $now=Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $comment->comment_date=$now;
        $comment->customer_id=$data['customer_id'];
        $comment->product_id=$data['product_id'];
        $comment->comment=$data['comment'];
        $comment->save();

        return redirect()->back();
 
        }
        else{
            FacadesSession::put('mes','Bạn nên đăng nhập');
            return Redirect::to('/trangchu');


        }

    }
}
