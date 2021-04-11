@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Thông tin</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Trang chủ</a> / <span>Thông tin</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        
     
            <div class="row">
                
                <div class="col-sm-12">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Thông tin cơ bản</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="space20">&nbsp;</div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Họ Tên:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{$name}}</h5></div>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Email:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{$email}}</h5></div>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Số điện thoại:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{$phone}}</h5></div>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Địa chỉ:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{$address}}</h5></div>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng số hóa đơn:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{$soluong}}</h5></div>
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    

      
                    </div> <!-- .your-order -->
                </div>
            </div>
            <a class="beta-btn primary" href="{{route('doimatkhau')}}">Đổi mật khẩu  <i class="fa fa-chevron-right"></i></a>
            <a class="beta-btn primary" href="{{route('suathongtin')}}">Sửa thông tin  <i class="fa fa-chevron-right"></i></a>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection