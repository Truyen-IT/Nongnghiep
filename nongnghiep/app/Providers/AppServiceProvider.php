<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            $product=Product::all()->count();
            $ordera=Order::all()->count();
            $customer=Customer::all()->count();
            $max_pri=Product::max('product_price');
            $min_pri=Product::min('product_price');
            $max_pric=$max_pri+100000;
            
        $tieuduong=Product::Where('product_vitamina','1')->count();
        $trinao=Product::Where('product_vitaminb','1')->count();
        $thieumau=Product::Where('product_vitamind','1')->count();
        $tieuhoa=Product::Where('product_vitamine','1')->count();
    
            $product_view=Product::orderBy('product_views','desc')->take(10)->get();
            $view->with('product',$product)->with('ordera',$ordera)
            ->with('customer',$customer)->with('max_pri',  $max_pri)->with('min_pri',$min_pri)
            ->with('max_pric',  $max_pric)->with('tieuduong',  $tieuduong) ->with('trinao',  $trinao)
             ->with('thieumau',  $thieumau) ->with('tieuhoa',  $tieuhoa);



        });
    }
}
