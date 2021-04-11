<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\hang;
session_start();

class Hangcontroller extends Controller
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
     public function Themhang()
    { $this->Authlogin();
        return view('adminpage.themhang_sanpham');
    }
    
    public function Xemhang()
    {$this->Authlogin();  $tatcahang= DB::table('hang')->get(); //hang::all();

        
        $quanlyhang=  view('adminpage.xemhang_sanpham')->with('xemhang_sanpham',$tatcahang); //xem tất cả các loại trong db + link view
        
        
        return view('adminlayout')->with('adminpage.xemhang_sanpham',$quanlyhang); // chứa cac loại trong db và trả về
    }
    public function Luuhang(Request $req)
    {$this->Authlogin();
        $data = array();
        $data['mahang']=$req->mahang;
        $data['tenhang']=$req->tenhang;
        
        $mahang=hang::where('mahang',$data['mahang'])->first();
        $tenhang=hang::where('tenhang',$data['tenhang'])->first();
        
        if($mahang==null && $tenhang==null )
        {Session::put('mess','Thêm thành công');
            DB::table('hang')->insert($data);
            return redirect('xem-hang'); 
        }
        else
        {
            Session::put('mess','Thêm không thành công');
            return view('adminpage.themhang_sanpham');
        }
    }
    public function getSuahang($mahang)
    {$this->Authlogin();
        $tatcahang= DB::table('hang')->where('mahang',$mahang)->get(); //hang::all(); 
        $quanlyhang=  view('adminpage.suahang_sanpham')->with('suahang_sanpham',$tatcahang); //xem tất cả các loại trong db + link view
        return view('adminlayout')->with('adminpage.suahang_sanpham',$quanlyhang); // chứa cac loại trong db và trả về
    }
    public function postSuahang(Request $req,$mahang)
    {$this->Authlogin();
        $data = array();
        $data['tenhang']=$req->tenhang;
        DB::table('hang')->where('mahang',$mahang)->update($data);
        Session::put('mess','Cập nhật thành công');
        return redirect('xem-hang'); 
    }
    public function Xoahang($mahang)
    {
        $this->Authlogin();
        DB::table('hang')->where('mahang',$mahang)->delete();
        Session::put('mess','Xóa thành công');
        return redirect('xem-hang'); 
    }
}
