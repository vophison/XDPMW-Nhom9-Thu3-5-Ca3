@extends('master')
@section('content')
</div>
<div class="container">
<div id="content" class="space-top-none">
<div class="main-content">
<div class="space60">&nbsp;</div>
<div class="row">
    <div class="col-sm-12">
        <div class="beta-products-list">
            <h4>Các sản phẩm được tìm thấy </h4>
            <div class="beta-products-details">
                <p class="pull-left">Tìm Thấy {{count($sanpham)}} Sản Phẩm</p>
                <div class="clearfix"></div>
            </div>

            <div class="row">
                @foreach ($sanpham as $item)
                <div class="col-sm-3">
                    <div class="single-item">
                        <div class="ribbon-wrapper"></div>

                        <div class="single-item-header">
                            <a href="{{route('chitietsanpham',$item->masanpham)}}"><img src="source/image/product/{{$item->hinh}}" alt=""></a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title">{{$item->tensanpham}}</p>
                            <p class="single-item-price">
                                <span class="flash-sale">{{$item->gia}}Đồng</span>
                     
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{route('themgiohang',$item->masanpham)}}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{route('chitietsanpham',$item->masanpham)}}">Chi Tiết  <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
       
        </div> <!-- .beta-products-list -->

        <div class="space50">&nbsp;</div>

       
    </div>
</div> <!-- end section with sidebar and main content -->


</div> <!-- .main-content -->
</div> <!-- #content -->
</div> 
@endsection