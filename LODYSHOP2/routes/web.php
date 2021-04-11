<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'as' => 'trangchu',
    'uses' => 'Pagecontroller@getIndex']
);

Route::get('index', [
    'as' => 'trangchu',
    'uses' => 'Pagecontroller@getIndex']
);
Route::get('home', [
    'as' => 'trangchu',
    'uses' => 'Pagecontroller@getIndex']
);

Route::get('sanpham_loai/{maloai?}', [
    'as' => 'loaisanpham',
    'uses' => 'Pagecontroller@getSanpham_loai']
);
Route::get('sanpham_hang/{mahang?}', [
    'as' => 'hangsanpham',
    'uses' => 'Pagecontroller@getSanpham_hang']
);
Route::get('sanpham_chitiet/{masanpham?}', [
    'as' => 'chitietsanpham',
    'uses' => 'Pagecontroller@getSanpham_chitiet']
);
//cai bien masanham nay = req->masanpham 
Route::get('lienhe', [
    'as' => 'lienhe',
    'uses' => 'Pagecontroller@getLienhe']
);

Route::get('gioithieu', [
    'as' => 'gioithieu',
    'uses' => 'Pagecontroller@getGioithieu']
);

Route::get('them-giohang/{masanpham?}',[
    'as' =>'themgiohang',
    'uses'=>'Pagecontroller@getThemgiohang']
);

Route::get('xoa-giohang/{masanpham?}',
    [
        'as' =>'xoagiohang',
        'uses'=>'Pagecontroller@getXoagiohang'
    ]
    );
    Route::get('xoa-giohangit/{masanpham?}',
    [
        'as' =>'xoagiohangit',
        'uses'=>'Pagecontroller@getXoagiohangit'
    ]
    );
    
    Route::get('dat-hang',[
        'as'=>'dathang',
        'uses'=>'Pagecontroller@getDathang'
    ]);
    Route::post('dat-hang',[
        'as'=>'dathang',
        'uses'=>'Pagecontroller@postDathang'
    ]);

    // lý do 2 cái giống nhau vì get để lấy trang view show ra còn post để lấy các giá trị của trang view đó 
    Route::get('dang-nhap',[
        'as'=>'dangnhap',
        'uses'=>'Pagecontroller@getDangnhap'
    ]);
    Route::post('dang-nhap',[
        'as'=>'dangnhap',
        'uses'=>'Pagecontroller@postDangnhap'
    ]);
    Route::get('dang-ky',[
        'as'=>'dangky',
        'uses'=>'Pagecontroller@getDangky'
    ]);
    Route::post('dang-ky',[
        'as'=>'dangky',
        'uses'=>'Pagecontroller@postDangky'
    ]);
    Route::get('dang-xuat-user',[
        'as'=>'dangxuatuser',
        'uses'=>'Pagecontroller@getDangxuatuser'
    ]);

    Route::get('tim-kiem',[
        'as'=>'timkiem',
        'uses'=>'Pagecontroller@getTimkiem'
    ]);

    Route::get('xem-donhang',[
        'as'=>'xemdonhang',
        'uses'=>'Pagecontroller@getXemdonhang'
    ]);

    Route::get('xem-thongtin',[
        'as'=>'xemthongtin',
        'uses'=>'Pagecontroller@getXemthongtin'
    ]);
    
    Route::get('sua-thongtin',[
        'as'=>'suathongtin',
        'uses'=>'Pagecontroller@getSuathongtin'
    ]);

    Route::post('sua-thongtin',[
      'as'=>'suathongtin',
    'uses'=>'Pagecontroller@postSuathongtin'
   ]);
   Route::get('doi-matkhau',[
    'as'=>'doimatkhau',
  'uses'=>'Pagecontroller@getDoimatkhau'
 ]);
   Route::post('doi-matkhau',[
    'as'=>'doimatkhau',
  'uses'=>'Pagecontroller@postDoimatkhau'
 ]);
    //Admin
    Route::get('admin',[
        'as'=>'trangchuadmin',
        'uses'=>'Admincontroller@getIndex'
    ]);

    Route::get('dashboard',[
        'as'=>'trangdashboardadmin',
        'uses'=>'Admincontroller@getDashboard'
    ]);
    Route::post('admin',[
        'as'=>'trangchuadmin',
        'uses'=>'Admincontroller@Dashboard'
    ]);
    Route::get('dang-xuat',[
        'as'=>'dangxuat',
        'uses'=>'Admincontroller@getDangxuat'
    ]);
        //Loại
    Route::get('them-loai',[
        'as'=>'themloai',
        'uses'=>'Loaicontroller@Themloai'
    ]);
    
    Route::get('xem-loai',[
        'as'=>'xemloai',
        'uses'=>'Loaicontroller@Xemloai'
    ]);
    Route::post('luu-loai',[
        'as'=>'luuloai',
        'uses'=>'Loaicontroller@Luuloai'
    ]);   
    Route::get('sua-loai/{maloai?}',[
        'as'=>'sualoai',
        'uses'=>'Loaicontroller@getSualoai'
    ]);   
    Route::post('sua-loai/{maloai?}',[
        'as'=>'sualoai',
        'uses'=>'Loaicontroller@postSualoai'
    ]);   

    Route::get('xoa-loai/{maloai?}',[
        'as'=>'xoaloai',
        'uses'=>'Loaicontroller@Xoaloai'
    ]);   
    
      //Hãng
    Route::get('them-hang',[
        'as'=>'themhang',
        'uses'=>'Hangcontroller@Themhang'
    ]);
    
    Route::get('xem-hang',[
        'as'=>'xemhang',
        'uses'=>'Hangcontroller@Xemhang'
    ]);
    Route::post('luu-hang',[
        'as'=>'luuhang',
        'uses'=>'Hangcontroller@Luuhang'
    ]);
    Route::get('sua-hang/{mahang?}',[
        'as'=>'suahang',
        'uses'=>'Hangcontroller@getSuahang'
    ]);   
    Route::post('sua-hang/{mahang}',[
        'as'=>'suahang',
        'uses'=>'Hangcontroller@postSuahang'
    ]);   

    Route::get('xoa-hang/{mahang?}',[
        'as'=>'xoahang',
        'uses'=>'Hangcontroller@Xoahang'
    ]);   

    //Sản phẩm
    Route::get('them-sanpham',[
        'as'=>'themsanpham',
        'uses'=>'Sanphamcontroller@Themsanpham'
    ]);
    
    Route::get('xem-sanpham',[
        'as'=>'xemsanpham',
        'uses'=>'Sanphamcontroller@Xemsanpham'
    ]);
    Route::post('luu-sanpham',[
        'as'=>'luusanpham',
        'uses'=>'Sanphamcontroller@Luusanpham'
    ]);
    Route::get('sua-sanpham/{masanpham?}',[
        'as'=>'suasanpham',
        'uses'=>'Sanphamcontroller@getSuasanpham'
    ]);   
    Route::post('sua-sanpham/{masanpham?}',[
        'as'=>'suasanpham',
        'uses'=>'Sanphamcontroller@postSuasanpham'
    ]);   

    Route::get('xoa-sanpham/{masanpham?}',[
        'as'=>'xoasanpham',
        'uses'=>'Sanphamcontroller@Xoasanpham'

    ]);   
    Route::get('tim-kiem-sanpham',[
        'as'=>'timkiemsanpham',
        'uses'=>'Sanphamcontroller@getTimkiemsanpham'
    ]);

        //Đơn hàng
  
        Route::get('list-donhang',[
            'as'=>'listdonhang',
            'uses'=>'Donhangcontroller@Listdonhang'
        ]);
        Route::get('capnhat-donhang/{madonhang?}',[
            'as'=>'capnhatdonhang',
            'uses'=>'Donhangcontroller@Capnhatdonhang'
        ]);   
        Route::get('xoa-donhang/{madonhang?}',[
            'as'=>'xoadonhang',
            'uses'=>'Donhangcontroller@Xoadonhang'
        ]);  
        Route::get('xemchitiet-donhang/{madonhang}',[
            'as'=>'xemchitietdonhang',
            'uses'=>'Donhangcontroller@Xemchitietdonhang'
        ]);
        Route::get('tim-kiem-donhang',[
            'as'=>'timkiemdonhang',
            'uses'=>'Donhangcontroller@getTimkiemdonhang'
        ]);
            //khách hàng
            Route::get('list-khachhang',[
                'as'=>'listkhachhang',
                'uses'=>'QLKhachhangcontroller@Listkhachhang'
            ]);
            Route::get('capnhat-khachhang/{email?}',[
                'as'=>'capnhatkhachhang',
                'uses'=>'QLKhachhangcontroller@Capnhatkhachhang'
            ]);   