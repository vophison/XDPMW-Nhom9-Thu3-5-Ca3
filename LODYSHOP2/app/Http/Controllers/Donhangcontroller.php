<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\chitietdonhang;
use App\Models\donhang;
use App\Models\sanpham;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class Donhangcontroller extends Controller
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
    public function Listdonhang()
    {$this->Authlogin();  //$tatcadonhang= DB::table('donhang')->orderby('trangthai','asc')->get(); //hang::all();
       // $quanlydonhang=  view('adminpage.xem_donhang')->with('xem_donhang',$tatcadonhang); //xem tất cả các loại trong db + link view    
        //return view('adminlayout')->with('adminpage.xem_donhang',$quanlydonhang); // chứa cac loại trong db và trả về
        $xem_donhang= DB::table('donhang')->join('admin','admin.taikhoan','=','donhang.taikhoanadmin')->orderby('trangthai','asc')->get(); //hang::all();
        //xem tất cả các loại trong db + link view    
        return view('adminpage.xem_donhang',compact('xem_donhang')); // chứa cac loại trong db và trả về
    }

    public function Xoadonhang($madonhang)
    {
        $this->Authlogin();

        DB::table('donhang')->where('madonhang',$madonhang)->delete();
        Session::put('mess','Xóa thành công');
        return redirect('list-donhang'); 
    }
    public function Capnhatdonhang($madonhang)
    {
        $this->Authlogin(); 
        $admintaikhoan=Session::get('admin_taikhoan');
        
        $laytrangthai = donhang::where('madonhang',$madonhang)->first();
        //print($laytrangthai);exit; in ra từng biến chỉ viết -> để lấy thuộc tính
        if($laytrangthai->trangthai==1)
        {  
           $donhang = donhang::where('madonhang',$madonhang)->update(['trangthai'=>2]); // update là update của 1 mảng do chỉ update 1 thuộc tính nên cần []
           $donhang = donhang::where('madonhang',$madonhang)->update(['taikhoanadmin'=>$admintaikhoan]);
           Session::put('mess','Đã cập nhật trạng thái');
           return redirect('list-donhang');
        }
        if($laytrangthai->trangthai==2)
        {  
           $donhang = donhang::where('madonhang',$madonhang)->update(['trangthai'=>3]); // update là update của 1 mảng do chỉ update 1 thuộc tính nên cần []
        Session::put('mess','Đã cập nhật trạng thái');
           return redirect('list-donhang');
        }
        if($laytrangthai->trangthai==3)
        {  
           $donhang = donhang::where('madonhang',$madonhang)->update(['trangthai'=>4]); // update là update của 1 mảng do chỉ update 1 thuộc tính nên cần []
        Session::put('mess','Đã cập nhật trạng thái');
           return redirect('list-donhang');
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


