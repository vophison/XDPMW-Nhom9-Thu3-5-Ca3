@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm Thuộc Hãng {{$tenhang_sanpham->tenhang}}</h6>  <!-- lấy tên loại ra từ pagecontroller-->
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('trangchu')}}">Home</a> / <span>Hãng Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                        @foreach ($hang as $item)                   
                        <li><a href="{{route('hangsanpham',$item->mahang)}}">{{$item->tenhang}}</a></li>  <!-- vào route hangsanpham gọi biến -->
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>Sản Phẩm Thuộc  </h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm Thấy {{count($sanpham_theohang)}} Sản Phẩm</p> 
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach ($sanpham_theohang as $item)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('chitietsanpham',$item->masanpham)}}"><img src="source/image/product/{{$item->hinh}}" alt="" height="350px" width="300"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$item->tensanpham}}</p>
                                        <p class="single-item-price">
                                            <span class="flash-sale">{{$item->gia}} Đồng</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$item->masanpham)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('chitietsanpham',$item->masanpham)}}">Chi Tiết<i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div> @endforeach  
                        </div>            
                    </div>
                    <div class="space70">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>Sản Phẩm Khác</h4>
                        <div class="beta-products-details">
                 
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">  
                            @foreach ($sanpham_khac as $item)
                            <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="{{route('chitietsanpham',$item->masanpham)}}"><img src="source/image/product/{{$item->hinh}}" alt="" height="350px" width="300"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$item->tensanpham}}</p>
                                        <p class="single-item-price">
                                            <span class="flash-sale">{{$item->gia}} Đồng</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$item->masanpham)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="{{route('chitietsanpham',$item->masanpham)}}">Chi Tiết <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="row"> 
                                {{$sanpham_khac->links()}}
                            </div>
                        </div>
                        
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection