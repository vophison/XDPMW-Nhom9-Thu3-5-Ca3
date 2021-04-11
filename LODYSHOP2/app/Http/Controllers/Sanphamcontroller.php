<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\sanpham;
session_start();

class Sanphamcontroller extends Controller
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
    public function Themsanpham() //thêm hãng và loại vào form thêm sản phẩm
    {$this->Authlogin();
        $hang=DB::table('hang')->orderby('mahang','desc')->get();
        $loai=DB::table('loai')->orderby('maloai','desc')->get();
   
        return view('adminpage.them_sanpham')->with('hang',$hang)->with('loai',$loai); // chứa cac loại trong db và trả về
    }
    
    public function Xemsanpham()
    {  $this->Authlogin();$tatcasanpham= DB::table('sanpham')->join('loai','loai.maloai','=','sanpham.maloai')
        ->join('hang','hang.mahang','=','sanpham.mahang')->orderby('sanpham.masanpham')->get(); //sanpham::all();
       
        $quanlysanpham=  view('adminpage.xem_sanpham')->with('xem_sanpham',$tatcasanpham); //xem tất cả các loại trong db + link view

        return view('adminlayout')->with('adminpage.xem_sanpham',$quanlysanpham); // chứa cac loại trong db và trả về
    }
    public function Luusanpham(Request $req)
    {$this->Authlogin();
            $data = array();
            $data['masanpham']=$req->masanpham;
            $data['tensanpham']=$req->tensanpham;
            $data['mota']=$req->motasanpham;
            $data['gia']=$req->giasanpham;
            $data['maloai']=$req->loaisanpham;
            $data['mahang']=$req->hangsanpham;
            $data['luotmua']=0;
            $data['soluong']=$req->soluongsanpham;
            $getimg=$req->file('hinhsanpham');
        if($getimg)
        {
            $getname_img=$getimg->getClientOriginalName(); // lấy cái tên hình
            $name_img=current(explode('.',$getname_img)); //lấy cái đuôi
            $new_img=$name_img.rand(0,99).'.'.$getimg->getClientOriginalExtension(); // cái hình bằng cái tên hình + số random(để khỏi trùng) + đuôi hình
            $getimg->move('source/image/product/',$new_img);
            $data['hinh']=$new_img;
            $masanpham=sanpham::where('masanpham',$data['masanpham'])->first();
            $tensanpham=sanpham::where('tensanpham',$data['tensanpham'])->first();
            
            if($masanpham==null && $tensanpham==null )
            {Session::put('mess','Thêm thành công');
                DB::table('sanpham')->insert($data);
                return redirect('xem-sanpham');
            }
            else
            {
                Session::put('mess','Thêm không thành công');
                return view('adminpage.them_sanpham');
            }           
        }
    }
    public function getSuasanpham($masanpham)
    {$this->Authlogin();
       $hang=DB::table('hang')->orderby('mahang','desc')->get();
       $loai=DB::table('loai')->orderby('maloai','desc')->get();
        
        $sua_sanpham= DB::table('sanpham')->where('masanpham',$masanpham)->get(); //tat ca này là sản phẩm được chọn để sửa
//dd($sua_sanpham);
        $quanlysanpham=  view('adminpage.sua_sanpham')->with('sua_sanpham',$sua_sanpham)->with('hang',$hang)
        ->with('loai',$loai); //xem tất cả các loại trong db + link view

        return view('adminlayout')->with('adminpage.sua_sanpham',$quanlysanpham); // chứa cac loại trong db và trả về 
        //lấy thằng $tatcasanpham để xuất dữ liệu
    }
    public function postSuasanpham(Request $req,$masanpham)
    {
        $this->Authlogin();
        $data = array();
        $data['tensanpham']=$req->tensanpham;
        $data['mota']=$req->motasanpham;
        $data['gia']=$req->giasanpham;
        $data['maloai']=$req->loaisanpham;
        $data['mahang']=$req->hangsanpham;
        $data['soluong']=$req->soluongsanpham;
        $getimg=$req->file('hinhsanpham');
        $test = DB::table('sanpham')->where('masanpham',$masanpham)->first();
    if($getimg)
    {   
        $linkanhcu='source/image/product/'.$test->hinh;
        if(file_exists($linkanhcu))
        {
            unlink($linkanhcu);
        }
        $getname_img=$getimg->getClientOriginalName(); // lấy cái tên hình
        $name_img=current(explode('.',$getname_img)); //lấy cái đuôi
        $new_img=$name_img.rand(0,99).'.'.$getimg->getClientOriginalExtension(); // cái hình bằng cái tên hình + số random(để khỏi trùng) + đuôi hình
        $getimg->move('source/image/product/',$new_img);
        $data['hinh']=$new_img;
        DB::table('sanpham')->where('masanpham',$req->masanpham)->update($data);
            Session::put('mess','Cập nhật thành công');
            return redirect('xem-sanpham');
    }
    DB::table('sanpham')->where('masanpham',$req->masanpham)->update($data);
    Session::put('mess','Cập nhật thành công');
    return redirect('xem-sanpham');
    }
    public function Xoasanpham($masanpham)
    {  $this->Authlogin();$test = DB::table('sanpham')->where('masanpham',$masanpham)->first();
        $linkanhcu='source/image/product/'.$test->hinh;
        if(file_exists($linkanhcu))
        {
            unlink($linkanhcu);
        }
        DB::table('sanpham')->where('masanpham',$masanpham)->delete();
        Session::put('mess','Xóa thành công');
        return redirect('xem-sanpham'); 
    }
    public function getTimkiemsanpham(Request $req)
    {   if($req->tukhoa!='')
       {
       
       $sanpham = sanpham::join('loai','loai.maloai','=','sanpham.maloai')->join('hang','hang.mahang','=','sanpham.mahang')
       ->where('tensanpham','like','%'.$req->tukhoa.'%')->first(); //orwhere = hoặc
       if($sanpham != null)
      { return view('adminpage.timkiemsanpham',compact('sanpham')); }
      else
      return redirect()->back();// trả các sản phẩm tìm được qua trang timkiem
    }
    return redirect()->back();
   }   
}
