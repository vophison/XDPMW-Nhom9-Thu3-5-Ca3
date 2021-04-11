@extends('adminlayout')
@section('admincontent')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                  Cập Nhật Hãng Sản Phẩm
                </header>
                
                    @if(Session::has('mess'))
                    <div class="alert alert-danger">{{Session::get('mess')}}</div>
                    {{Session::put('mess',null)}} <!-- gán mess bằng null -->
                    @endif

                    <div class="panel-body">
                        @foreach($suahang_sanpham as $key=>$value)
                    <div class="position-center">
                        <form role="form" action="{{route('suahang',$value->mahang)}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã hãng</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="mahang" value="{{$value->mahang}} " disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên hãng</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="tenhang" value="{{$value->tenhang}}" >
                        </div>
                        
                        <button type="submit" class="btn btn-info" name="suahang">Sửa hãng</button>
                    </form>
                    </div>
@endforeach
                </div>
            </section>

    </div>
@endsection