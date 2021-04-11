@extends('adminlayout')
@section('admincontent')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                 Cập Nhật Loại Sản Phẩm
                </header>
                
                    @if(Session::has('mess'))
                    <div class="alert alert-danger">{{Session::get('mess')}}</div>
                    {{Session::put('mess',null)}} <!-- gán mess bằng null -->
                    @endif

                    <div class="panel-body">
                        @foreach($sualoai_sanpham as $key=>$value)
                    <div class="position-center">
                        <form role="form" action="{{route('sualoai',$value->maloai)}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã Loại</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="maloai" value="{{$value->maloai}} " disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên Loại</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="tenloai" value="{{$value->tenloai}}" >
                        </div>
                        
                        <button type="submit" class="btn btn-info" name="sualoai">Sửa Loại</button>
                    </form>
                    </div>
@endforeach
                </div>
            </section>

    </div>
@endsection