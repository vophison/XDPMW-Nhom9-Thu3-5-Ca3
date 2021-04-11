@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Thông tin</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Trang chủ</a> / <span>Đổi mật khẩu</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        
     
        <div class="container">
            <div id="content">
                
                <form action="{{route('doimatkhau')}}" method="post" class="beta-form-checkout">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"> <!-- form dùng phương thức post => cần token -->
                    
                    <div class="row">
                        <div class="col-sm-3"></div>
            
                        @if(Session::has('thanhcong'))
                        <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                        @endif
                        <div class="col-sm-6">
                            <h4>Đổi mật khẩu</h4>
                            <div class="space20">&nbsp;</div>
                       <div class="form-block">
                                <label for="email">Mật khẩu cũ</label>
                                <input type="password" id="email" name="matkhaucu" value="" >
                            </div>
                            <div class="form-block">
                                <label for="email">Mật khẩu mới</label>
                                <input type="password" id="email"  name="matkhaumoi" value="" >
                            </div>
                            <div class="form-block">
                                <label for="email">Nhập lại mật khẩu mới</label>
                                <input type="password" id="email"  name="re_matkhaumoi" value="" >
                            </div>                   
                            <div class="form-block">
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </div>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                </form>
            </div> <!-- #content -->
        </div> <!-- .container -->

    </div>
</div>        @endsection