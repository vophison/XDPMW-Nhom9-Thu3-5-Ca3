<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class Admincontroller extends Controller
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
    public function getIndex()
    {   
        return view('adminlogin');
    }
    public function getDashboard()
    {   $this->Authlogin();
        return view('adminpage.dashboard');
    }
    public function Dashboard(Request $req)
    {
        $admin_taikhoan    =$req->taikhoan;
        $admin_password = $req->password;

        $result=DB::table('admin')->where('taikhoan',$admin_taikhoan)->where('matkhau',$admin_password)->first();
        if($result)
        {  Session::put('admin_taikhoan',$result->taikhoan);
           Session::put('admin_hoten',$result->hoten);
            return view('adminpage.dashboard');
        }
        else
        {  
            Session::put('mess','Mật khẩu hoặc Tài Khoản bị sai'); 
            return redirect('admin');
        }
    }
    public function getDangxuat()
    { $this->Authlogin();

       Session::put('admin_taikhoan',null);
           Session::put('admin_hoten',null);
           return redirect('admin');
    }

}
