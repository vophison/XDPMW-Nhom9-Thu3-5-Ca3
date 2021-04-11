<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\loai;
use App\Cart;
use App\Models\hang;
use Session;
class AppServiceProvider extends ServiceProvider

{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {//chia se cho trang nao
        view()->composer('header',function($view){
            $sanpham_loai= loai::all();//menu loai san pham
            $sanpham_hang= hang::all();//láy xong nhớ trả về view
           
            $view->with('sanpham_loai',$sanpham_loai);//ten tham số truyền qua, giá trị cần truyền đi
            $view->with('sanpham_hang',$sanpham_hang);
    });

   view()->composer('header',function($view) {
    if(Session::has('cart'))
    {
        $oldCart=Session::get('cart');  // gio hang cu
        $cart = new Cart($oldCart); //gio hang co hay chua co roi thi gan vao them vao cai cu
        $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
    }
   });
}
}