<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\loai;
session_start();
class Loaicontroller extends Controller
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
    public function Themloai()
    {$this->Authlogin();
        return view('adminpage.themloai_sanpham');
    }
    
    public function Xemloai()
    {  $this->Authlogin();$tatcaloai= DB::table('loai')->get(); //loai::all();
       
        $quanlyloai=  view('adminpage.xemloai_sanpham')->with('xemloai_sanpham',$tatcaloai); //xem tất cả các loại trong db + link view

        return view('adminlayout')->with('adminpage.xemloai_sanpham',$quanlyloai); // chứa cac loại trong db và trả về
    }
    public function Luuloai(Request $req)
    {
        $this->Authlogin();$data = array();
        $data['maloai']=$req->maloai;
        $data['tenloai']=$req->tenloai;
        
        $maloai=loai::where('maloai',$data['maloai'])->first();
        $tenloai=loai::where('tenloai',$data['tenloai'])->first();
        
        if($maloai==null && $tenloai==null )
        {Session::put('mess','Thêm thành công');
            DB::table('loai')->insert($data);
            return redirect('xem-loai');
        }
        else
        {
            Session::put('mess','Thêm không thành công');
            return view('adminpage.themloai_sanpham');
        }
        
    }
    public function getSualoai($maloai)
    {
        $this->Authlogin();  $tatcaloai= DB::table('loai')->where('maloai',$maloai)->get(); //hang::all(); 
        $quanlyloai=  view('adminpage.sualoai_sanpham')->with('sualoai_sanpham',$tatcaloai); //xem tất cả các loại trong db + link view
        return view('adminlayout')->with('adminpage.sualoai_sanpham',$quanlyloai); // chứa cac loại trong db và trả về
    }
    public function postSualoai(Request $req,$maloai)
    {$this->Authlogin();
        $data = array();
        $data['tenloai']=$req->tenloai;
        DB::table('loai')->where('maloai',$maloai)->update($data);
        Session::put('mess','Cập nhật thành công');
        return redirect('xem-loai'); 
    }
    public function Xoaloai($maloai)
    {$this->Authlogin();
        DB::table('loai')->where('maloai',$maloai)->delete();
        Session::put('mess','Xóa thành công');
        return redirect('xem-loai'); 
    }
}
