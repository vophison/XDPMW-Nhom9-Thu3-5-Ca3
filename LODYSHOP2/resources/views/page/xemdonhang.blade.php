@extends('master')
@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Các đơn hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Trang chủ</a> / <span>Các đơn hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
            <div class="beta-breadcrumb">
                @if(Auth::check())
                <a href="index.html">{{(Auth::user()->name)}}</a> / <span>Đơn hàng</span>
            
                <div class="col-md-12">
                    @foreach ($donhang as $item) <!--  các đơn hàng thuộc user-->
                    <div class="col-sm-6">
                    <div class="your-order">           
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                <div>                            
                                <!--  one item	 -->
                                    <div class="media">                            
                                        <div class="media-body">
                                            <p class="font-large" style="color:red;">Đơn hàng của {{$item->taikhoanusers}}</p>
                                            <div class="space5">&nbsp;</div>
                                            <span class="color-black your-order-info">Mã đơn hàng {{$item->madonhang}}</span>
                                            <div class="space5">&nbsp;</div>
                                            <span class="color-black your-order-info">Trạng thái đơn hàng: @if($item->trangthai == 1) Đang chờ xác nhận 
                                                @else @if($item->trangthai ==2) Đã xác nhận  @else @if($item->trangthai ==3) Đang giao hàng @endif @endif @endif</span>                    
                                        </div>
                                    </div>
                                    <div class="space10">&nbsp;</div>
                                    <div class="row">
                                        @foreach ($chitietdonhang as $item1)   <!--  các chi tiết đơn hàng thuộc đơn hàng cùng mã-->
                                        @if($item1->madonhang==$item->madonhang)  <!--  kiểm tra ctdh nào cùng mã đơn hàng-->
                                            @foreach($sanphamctdh as $item2)<!--  các hình ảnh sản phẩm thuộc chi tiết đơn hàng cùng mã-->
                                          
                                          @if($item2->masanpham == $item1->masanpham) <!--  kiểm tra sản phẩm nào cũng mã sản phẩm với chi tiết đơn hàng-->
                                  
                                              <div class="col-sm-4">
                                                          
                                            <span class="color-black your-order-info">Tên sản phẩm: {{$item2->tensanpham}}</span>
                                            <div class="space3">&nbsp;</div>
                                            <span class="color-black your-order-info">số lượng: {{$item1->soluong}}</span>
                                            <div class="space3">&nbsp;</div>
                                            <span class="color-black your-order-info">giá: {{$item1->dongia}}</span>
                                            <div class="space10">&nbsp;</div>
                                            <span class="color-black your-order-info"><img src="source/image/product/{{$item2->hinh}}" alt="" height="120px" width="100"></span>
                                             
                                              
                               
                                    </div>
                                        @endif
                                        @endforeach
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                
                                <!-- end one item -->
                      
                         
                                </div>
                                    
                                <div class="clearfix"></div>
                            </div>
                            <div class="space10">&nbsp;</div>
                  

                     
                    </div> <!-- .your-order -->
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        

    </div> <!-- #content -->
</div> <!-- .container -->
@endsection