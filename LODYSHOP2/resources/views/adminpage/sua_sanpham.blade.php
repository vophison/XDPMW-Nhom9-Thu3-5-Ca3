@extends('adminlayout')
@section('admincontent')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                  Cập Nhật Sản Phẩm
                </header>
                <div class="panel-body">
                    @if(Session::has('mess'))
                    <div class="alert alert-danger">{{Session::get('mess')}}</div>
                    {{Session::put('mess',null)}} <!-- gán mess bằng null -->
                    @endif
                    <div class="position-center">
                        @foreach($sua_sanpham as $key=>$sanpham)
                           
                        <form role="form" action="{{route('suasanpham',$sanpham->masanpham)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã Sản Phẩm</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="masanpham" value={{$sanpham->masanpham}} disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"  name="tensanpham" value="{{$sanpham->tensanpham}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
                         <textarea name="motasanpham" id="" cols="30" rows="10" style="resize:none" rows="g" class="form-control" >{{$sanpham->mota}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giá Sản Phẩm</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="giasanpham" value={{$sanpham->gia}}>
                        </div>
                     
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình Sản Phẩm</label>
                            <input type="file" class="form-control" id="exampleInputPassword1"  name="hinhsanpham">
                            <img src="source/image/product/{{$sanpham->hinh}}" alt=""width="100px"height="120px" >
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Loại Sản Phẩm</label>
                            <select name="loaisanpham" id="" class="form-control">
                                @foreach($loai as $key=>$value)
                                @if($sanpham->maloai==$value->maloai)
                                <option selected value="{{$value->maloai}}">{{$value->tenloai}}</option>
                                @else 
                                <option value="{{$value->maloai}}">{{$value->tenloai}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hãng Sản Phẩm</label>
                            <select name="hangsanpham" id="" class="form-control">
                                @foreach($hang as $key=>$value)
                                  @if($sanpham->mahang==$value->mahang)
                                <option selected value="{{$value->mahang}}">{{$value->tenhang}}</option>
                                @else 
                                <option value="{{$value->mahang}}">{{$value->tenhang}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số Lượng Sản Phẩm</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"  name="soluongsanpham" value="{{$sanpham->soluong}}">
                        </div>
                        
                        <button type="submit" class="btn btn-info">Cập Nhật Sản Phẩm</button>
                    </form>
                    @endforeach
                    </div>

                </div>
            </section>

    </div>
@endsection