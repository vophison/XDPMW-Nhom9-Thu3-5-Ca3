@extends('adminlayout')
@section('admincontent')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Thêm Sản Phẩm
                </header>
                <div class="panel-body">
                    @if(Session::has('mess'))
                    <div class="alert alert-danger">{{Session::get('mess')}}</div>
                    {{Session::put('mess',null)}} <!-- gán mess bằng null -->
                    @endif
                    <div class="position-center">
                        <form role="form" action="{{route('luusanpham')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã Sản Phẩm</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="masanpham">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"  name="tensanpham">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
                         <textarea name="motasanpham" id="" cols="30" rows="10" style="resize:none" rows="g" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giá Sản Phẩm</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="giasanpham">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình Sản Phẩm</label>
                            <input type="file" class="form-control" id="exampleInputPassword1"  name="hinhsanpham">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Loại Sản Phẩm</label>
                            <select name="loaisanpham" id="" class="form-control">
                                @foreach($loai as $key=>$value)
                                <option value="{{$value->maloai}}">{{$value->tenloai}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hãng Sản Phẩm</label>
                            <select name="hangsanpham" id="" class="form-control">
                                @foreach($hang as $key=>$value)
                                <option value="{{$value->mahang}}">{{$value->tenhang}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số Lượng Sản Phẩm</label>
                            <input type="text" class="form-control" id="exampleInputPassword1"  name="soluongsanpham">
                        </div>
                        <button type="submit" class="btn btn-info">Thêm Sản Phẩm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
@endsection