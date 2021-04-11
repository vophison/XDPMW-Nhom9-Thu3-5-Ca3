<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\chitietdonhang;
use App\Models\donhang;
use App\Models\sanpham;
use Session;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class QLKhachhangcontroller extends Controller
{
    public function Authlogin()
    {
        $admintaikhoan=Session::get('admin_taikhoan');
        if($admintaikhoan)
        {
            return redirect('dashboard');
        }else
        {
            return redirect('admin')->send();
        }
    }
    public function Listkhachhang()
    {$this->Authlogin();  //$tatcadonhang= DB::table('donhang')->orderby('trangthai','asc')->get(); //hang::all();
       // $quanlydonhang=  view('adminpage.xem_donhang')->with('xem_donhang',$tatcadonhang); //xem tất cả các loại trong db + link view    
        //return view('adminlayout')->with('adminpage.xem_donhang',$quanlydonhang); // chứa cac loại trong db và trả về
        $xem_khachhang= DB::table('users')->orderby('trangthai','asc')->get(); //hang::all();
        //xem tất cả các loại trong db + link view    
        return view('adminpage.xem_khachhang',compact('xem_khachhang')); // chứa cac loại trong db và trả về
    }

    public function Xoadonhang($madonhang)
    {
        $this->Authlogin();

        DB::table('donhang')->where('madonhang',$madonhang)->delete();
        Session::put('mess','Xóa thành công');
        return redirect('list-donhang'); 
    }
    public function Capnhatkhachhang($email)
    {
        $this->Authlogin(); 

        $laytrangthai = User::where('email',$email)->first();
        //print($laytrangthai);exit; in ra từng biến chỉ viết -> để lấy thuộc tính
        if($laytrangthai->trangthai==1)
        {  
           $khachhang = User::where('email',$email)->update(['trangthai'=>0]); // update là update của 1 mảng do chỉ update 1 thuộc tính nên cần []
         
           Session::put('mess','Đã cập nhật trạng thái');
           return redirect('list-khachhang');
        }
        if($laytrangthai->trangthai==0)
        {  
           $khachhang = User::where('email',$email)->update(['trangthai'=>1]); // update là update của 1 mảng do chỉ update 1 thuộc tính nên cần []
        Session::put('mess','Đã cập nhật trạng thái');
           return redirect('list-khachhang');
        }
    
       //DB::table('donhang')->where('madonhang',$madonhang)->update('trangthai',)
    }
    public function Xemchitietdonhang($madonhang)
    {
        $this->Authlogin(); 
        $donhang=donhang::where('madonhang',$madonhang)->first();
        $sanphamctdh=sanpham::all();
        $chitietdonhang=chitietdonhang::where('madonhang',$madonhang)->get();
        
        foreach($chitietdonhang as $value) //vòng lặp này lấy các mã sản phẩm thuộc chi tiết đơn hàng này
        {
            $masp[]=$value->masanpham;
            
        }
       // print_r($masp);exit;
        foreach($sanphamctdh as $value)
        {
            $sanphamctdh = sanpham::whereIn('masanpham',$masp)->get();
        }
       
        return view('adminpage.xem_ctdonhang',compact('donhang','sanphamctdh','chitietdonhang'));
    
    }
    public function getTimkiemdonhang(Request $req)
     {  $this->Authlogin();  if($req->tukhoa!='')
        {
        $donhang = donhang::where('madonhang','like','%'.$req->tukhoa.'%')->first(); //orwhere = hoặc
        if($donhang != null)
       { return view('adminpage.timkiemdonhang',compact('donhang')); }
       else
       return redirect()->back();// trả các sản phẩm tìm được qua trang timkiem
     }
     return redirect()->back();
    }   
}
