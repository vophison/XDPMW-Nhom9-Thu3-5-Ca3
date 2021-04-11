<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\banner;
use App\Models\sanpham;
use App\Models\loai;
use App\Models\hang;
use App\Cart;
use DB;
use App\Models\khachhang;
use App\Models\donhang;
use App\Models\chitietdonhang;
use App\User;
use Auth;
use Hash;
use Session;

class Pagecontroller extends Controller
{
    public function getIndex()
    {
        $banner = banner::all();
        $sanphamnormal1=sanpham::where('luotmua',0)->get();
        $sanphamnormal=sanpham::where('luotmua',0)->paginate(4);;
        $sanphamhot1 = sanpham::where('luotmua','>',0)->get();
        $sanphamhot = sanpham::where('luotmua','>',0)->paginate(4);
        return view('page.index',compact('banner','sanphamhot','sanphamhot1','sanphamnormal','sanphamnormal1')); //hoac page/index
    }

    public function getSanpham_loai($type)//để hiểu được bên route phải truyền 1 id
    {
        $sanpham_khac=sanpham::where('maloai','<>',$type)->paginate(3);//lấy sản phẩm khác mã loại được chọn
        $sanpham_theoloai = sanpham::where('maloai',$type)->get(); // lấy xong nhớ truyền biến qua view
        $loai = loai::all();
        $tenloai_sanpham = loai::where('maloai',$type)->first();//lấy cái mã loại được chọn
        return view('page.sanpham_loai', compact('sanpham_theoloai','sanpham_khac','loai','tenloai_sanpham')); // truyền biến qua view
    }
    public function getSanpham_hang($type)//để hiểu được bên route phải truyền 1 id
    {
        $sanpham_khac=sanpham::where('mahang','<>',$type)->paginate(3);
        $sanpham_theohang = sanpham::where('mahang',$type)->get();
        $hang = hang::all();
        $tenhang_sanpham = hang::where('mahang',$type)->first();
       return view('page.sanpham_hang',compact('sanpham_theohang','sanpham_khac','hang','tenhang_sanpham')); // truyền biến qua view
    }
    public function getXemthongtin()
    {     
        $email = Auth::user()->email;
        $name= Auth::user()->name;
        $address =Auth::user()->address;
        $phone=Auth::user()->phone;
        $donhang = donhang::where('taikhoanusers',$email)->get();
        $soluong = count($donhang);
       

        return view('page.xemthongtin',compact('email','name','address','phone','soluong'));
    }
    public function getSuathongtin()
    {   
        
        $email = Auth::user()->email;
        $password=Auth::user()->password;
        $name= Auth::user()->name;
        $address =Auth::user()->address;
        $phone=Auth::user()->phone;
        return view('page.suathongtin',compact('email','name','address','phone','password'));
    }
    public function postSuathongtin(Request $req)
    {

       $user=User::find(Auth::user()->email); //kiếm trong các user , user nào có email = thằng email đang đăng nhập
       $user->name=$req->fullname;
       $user->password=Hash::make($req->password);      //lấy các thuộc tính user = các input được nhập bên form
       $user->phone=$req->phone;
       $user->address=$req->address;
       $user->update();
       return redirect()->back()->with('thanhcong','Sửa thông tin thành công');
    }
    public function getDoimatkhau()
    {   
      
       $email = Auth::user()->email;
        $password=Auth::user()->password;
       
        return view('page.doimatkhau',compact('email','password'));
    }
    public function postDoimatkhau(Request $req)
    {
        $user=User::find(Auth::user()->email);
     
         $matkhaucu =    $user->password;

        $result=Hash::check($req->matkhaucu, $matkhaucu);//kiểm tra cái mật khẩu cũ nhập từ form sau khi hash có giống mật khẩu đã được has trong dbko
        if($result)
        { 
            
            
            $user->password=Hash::make($req->matkhaumoi);
            $user->update();
       return redirect()->back()->with('thanhcong','Đổi mật khẩu thành công');
        }
        return redirect()->back()->with('thanhcong','Sai mật khẩu');
    }
    public function getXemdonhang()
    {
        
        if(Auth::check()) // check login chưa
        {
            
            //dd(Auth::user()->email);
            $email = Auth::user()->email;
            $donhang = donhang::where('taikhoanusers',$email)->get(); // lấy các đơn hang thuộc user
            $count = count($donhang);
            if($count >0) // có đơn hàng thì mới cho coi
           {$chitietdonhang=chitietdonhang::all();
            $sanphamctdh=sanpham::all();
            foreach($donhang as $key) // vòng lặp này lấy các mã đơn hàng thuộc user
            {
                $ma[]=$key->madonhang; //lưu 1 cái mảng chứa các ma4donhang 
            }
            foreach($chitietdonhang as $value) //lấy các chi tiết đơn hàng có mã đơn hàng bằng với mảng $ma[]
            {
                $chitietdonhang = chitietdonhang::whereIn('madonhang',$ma)->get(); // whereIn('ma',mảng) so sánh mã với chuỗi
            }
            foreach($chitietdonhang as $key) //vòng lặp này lấy các mã sản phẩm thuộc chi tiết đơn hàng này
            {
                $masp[]=$key->masanpham;
            }
 
            foreach($sanphamctdh as $value)
            {
                $sanphamctdh = sanpham::whereIn('masanpham',$masp)->get();
            }
        }
        else
        {
            return redirect()->back()->with('zerodonhang','Bạn không có đơn hàng nào để xem');
        }
           // dd($sanphamctdh);
          // dd($donhang);
        //  dd($chitietdonhang);           
        }
        return view('page.xemdonhang',compact('email','donhang','chitietdonhang','sanphamctdh'));
    }
    public function getSanpham_chitiet(Request $req)//cach 2
    {
        $sanpham = sanpham::where('masanpham',$req->masanpham)->first(); // thay vì truyền thẳng masanpham vào thì lấy biến req để trỏ tới masanpham
        $sanpham_cungloai=sanpham::where('maloai',$sanpham->maloai)->paginate(3);
        return view('page.sanpham_chitiet',compact('sanpham','sanpham_cungloai'));  // truyền biến sanpham qua chi tiet san pham
    }

    public function getLienhe()
    {
        return view('page.lienhe'); 
    }

    public function getGioithieu()
    {
        return view('page.gioithieu'); 
    }

    public function getThemgiohang(Request $req,$masanpham)
    {
        $sanpham = sanpham::where('masanpham', $masanpham)->first(); // kiểm tra có sản phẩm này ko lấy cái mã sản phẩm ra
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);  // tạo giỏ hàng mới thêm vào giỏ hàng cũ
        $cart->add($sanpham,$masanpham);
        $req->session()->put('cart',$cart); // put vào session
        return redirect()->back();
    }
    
    public function getXoagiohang($masanpham)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart );
        $cart->removeItem($masanpham);
        if(count($cart->items)>0)
        { 
          Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getXoagiohangit($masanpham)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart );
        $cart->reduceByOne($masanpham);
        if(count($cart->items)>0)
        { 
          Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getDathang()
    {
        if(Session::has('cart'))
        {
            $oldCart=Session::get('cart');  // gio hang cu
            $cart = new Cart($oldCart); //gio hang co hay chua co roi thi gan vao them vao cai cu
           //dd($cart);
           //3 thuộc tính dấu "" dùng [] để truy xuất thuộc tính dùng [] or -> đều được
            return view('page.dathang',['product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);// truyền qua trang đặt hàng 
           // product_cart -> items => đang đứng ở items muốn vào thuộc tính => qua item => thuoc tinh
            //cart -> items = láy cái mảng tương tự với 2 cái total
        } 
        else return view('page.dathang'); // do nếu hết cart thì nó ko có biến => trả về trang trống 

    }
    public function postDathang(Request $req)
    {
        $cart = Session::get('cart');
        if(Auth::check())
        {
          //để protected $keyType = 'string'; vì mặc định User = keytype='intype' nên đọc dữ liệu key chính là chuỗi nó trả về 0 => sửa lại bên user chỉnh lại keytape
            
            $donhang = new donhang;
            $donhang->taikhoanusers	=Auth::user()->email;
            $donhang->ngaydathang=date('Y-m-d');
            $donhang->trangthai=1;
            $donhang->thanhtien= $cart->totalPrice;
            $donhang->save();
          
            
    
            foreach($cart->items as $key => $value){
            $chitietdonhang = new chitietdonhang;
            $chitietdonhang->madonhang=$donhang->id; // lý do trỏ vào thuộc tính id 1{DO test dd($donhang) thì thấy mã đơn hàng = id chứ ko phải madonhang}
            $chitietdonhang->masanpham=$key;//2{do id tự tăng => số nếu để$chitietdonhang->madonhang=$donhang->madonhang no hiểu madonhang la chuoi ko tu tang => sai    }
    
            $chitietdonhang->soluong=$value['qty'];
            $chitietdonhang->dongia=($value['price']/$value['qty']); //values của key rồi đi vao phần tử
            $chitietdonhang->save();
            }
        }
        else
        {
        
        $khachhang = new khachhang;
        $khachhang->taikhoan=$req->email;
        $users=DB::table('users')->get();
        foreach($users as $value)
        {if($khachhang->taikhoan==$value->email)
            {
                return redirect()->back()->with('thongbao','Email đã có người sử dụng');
            }
        }
        $khachhang->hoten=$req->hoten;  
        $khachhang->sodienthoai=$req->phone;
        $khachhang->diachi=$req->address;
        $khachhang->save();

        $donhang = new donhang;
        $donhang->taikhoankhachhang	=$khachhang->taikhoan;
        $donhang->ngaydathang=date('Y-m-d');
        $donhang->trangthai=1;
        $donhang->thanhtien= $cart->totalPrice;
        $donhang->save();
        

        foreach($cart->items as $key => $value){
        $chitietdonhang = new chitietdonhang;
        $chitietdonhang->madonhang=$donhang->id; // lý do trỏ vào thuộc tính id 1{DO test dd($donhang) thì thấy mã đơn hàng = id chứ ko phải madonhang}
        $chitietdonhang->masanpham=$key;//2{do id tự tăng => số nếu để$chitietdonhang->madonhang=$donhang->madonhang no hiểu madonhang la chuoi ko tu tang => sai    }

        $chitietdonhang->soluong=$value['qty'];
        $chitietdonhang->dongia=($value['price']/$value['qty']); //values của key rồi đi vao phần tử
        $chitietdonhang->save();
        }
        }

       Session::forget('cart');//lưu xong r quên giỏ hàng đi ( xóa)
        return redirect()->back()->with('thongbao','Bạn đã đăt hàng hành công'); // cái thongbao này cũng là 1 section
    }
    public function getDangnhap()
    {
        return view('page.dangnhap');
    }
    public function getDangky()
    {
        return view('page.dangky');
    }
    public function postDangky(Request $req ) // REQUEST NÀY GIÚP LÂY TẤT CẢ INPUT NGƯỜI ÙNG NHẬP VÀO
    {
        $this->validate($req,
            [
                    'email'=>'required|email|unique:users,email',
                    'password'=>'required|min:6|max:20',
                    'name'=>'requierd',
                    're_password'=>'required|same:password'
            ],  
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng của email vd: abc@gmail.com',
                'email.unique'=>'Email này đã được sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu yêu cầu 6 ký tự trở lên',
                'password.max'=>'Mật khẩu không quá 20 ký tự'
             ] );
             $user = new User;
             $user->name=$req->fullname;
             $user->email=$req->email;
      
             $user->password=Hash::make($req->password);
             $user->phone=$req->phone;
             $user->address=$req->address;
             $user->trangthai=1;
             $user->save();
             return redirect()->back()->with('thanhcong','Đăng ký tài khoản thành công');
    }
    public function postDangnhap(Request $req)
    {
        $this->validate($req,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không hợp lệ',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu cần ít nhất 6 ký tự',
            'password.max'=>'Mật khẩu không quá 20 ký tự'
        ]);
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials)) //đăng nhập passing
        {
            if(Auth::user()->trangthai==1)
            return redirect()->back()->with(['flag'=>'success','mess'=>'Đăng nhập thành công']);
            else
            return redirect()->back()->with(['flag'=>'danger','mess'=>'Tài khoản đã bị khóa']);
        
        }
        else
        return redirect()->back()->with(['flag'=>'danger','mess'=>'Đăng nhập không thành công']);
    }
    public function getDangxuatuser()
    {
        if(Session::has('cart'))
        {
            Session::forget('cart');
        }
        Auth::logout();
        return redirect()->route('trangchu');
    }
    public function getTimkiem(Request $req)
    {
        $sanpham = sanpham::where('tensanpham','like','%'.$req->tukhoa.'%')->orWhere('gia',$req->tukhoa)->get(); //orwhere = hoặc
        
        return view('page.timkiem',compact('sanpham')); // trả các sản phẩm tìm được qua trang timkiem
    }

  
   
}
