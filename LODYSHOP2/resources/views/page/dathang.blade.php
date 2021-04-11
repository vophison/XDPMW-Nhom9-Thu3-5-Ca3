@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">

        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('trangchu')}}">Trang chủ</a> / <span>Đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        
        <form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
            
            <input type="hidden" name="_token" value="{{csrf_token()}}"> <!-- form dùng phương thức post => cần token -->
           @if(Session::has('thongbao'))<div class="alert alert-success">{{Session::get('thongbao')}}</div>@endif
            <div class="row">
                <div class="col-sm-6">
                   
                    @if(Auth::check())
                        
                    @else
                    <h4>Đặt hàng</h4>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text" id="name" name="hoten" placeholder="Họ tên" required >
                    </div>

                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" required placeholder="expample@gmail.com">
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input type="text" id="adress" name="address" placeholder="Street Address" required>
                    </div>
                    

                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" id="phone" name="phone"required>
                    </div>
                    @endif
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Giỏ hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                <div>
                                    @if(Session::has('cart'))
                                    @foreach($product_cart as $item) <!-- product_cart lấy từ getdathang() -->
                                
                                <!--  one item	 -->
                                    <div class="media">
                                        <img width="25%" src="source/image/product/{{$item['item']->hinh}}" alt="" class="pull-left">
                                        <div class="media-body">
                                            <p class="font-large">{{$item['item']->tensanpham}}</p>
                                            <span class="color-gray your-order-info">{{$item['item']->gia}}</span>
                                            <span class="color-gray your-order-info">{{$item['qty']}}</span>
                       
                                        </div>
                                    </div>
                                <!-- end one item -->
                                @endforeach
                                @endif
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black">@if(Session::has('cart')){{number_format($totalPrice)}}@else 0 @endif</h5></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                  

                        <div class="text-center"><button type="submit" class="beta-btn primary" href="#">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
                    </div> <!-- .your-order -->
                </div>
            </div>
           
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection