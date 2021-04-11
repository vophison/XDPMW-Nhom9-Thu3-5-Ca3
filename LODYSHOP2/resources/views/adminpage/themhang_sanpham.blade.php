@extends('adminlayout')
@section('admincontent')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Thêm Hãng Sản Phẩm
                </header>
                <div class="panel-body">
                    @if(Session::has('mess'))
                    <div class="alert alert-danger">{{Session::get('mess')}}</div>
                    {{Session::put('mess',null)}} <!-- gán mess bằng null -->
                    @endif
                    <div class="position-center">
                        <form role="form" action="{{route('luuhang')}}" method="post">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã Hãng</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="mahang">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tên Hãng</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="tenhang">
                        </div>
                        
                        <button type="submit" class="btn btn-info">Thêm Hãng</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
@endsection