@extends('master')   
@section('content')
<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer" >
        <div class="banner" >
                <ul>
                    @foreach ($banner as $item)
                        
                    
                    <!-- THE FIRST SLIDE -->
                    <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                    <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="source/image/banner/{{$item->hinh}}" data-src="source/image/banner/{{$item->hinh}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/banner/{{$item->hinh}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>

                </li>
                @endforeach
                </ul>
            </div>
        </div>

        <div class="tp-bannertimer"></div>
    </div>
</div>
<!--slider-->
</div>
<div class="container">
<div id="content" class="space-top-none">
<div class="main-content">
<div class="space60">&nbsp;</div>
<div class="row">
    <div class="col-sm-12">
        <div class="beta-products-list">
            <h4>Hot </h4>
            <div class="beta-products-details">
                <p class="pull-left">T??m Th???y {{count($sanphamhot1)}} S???n Ph???m</p>
                <div class="clearfix"></div>
            </div>

            <div class="row">
                @foreach ($sanphamhot as $item)
                <div class="col-sm-3">
                    <div class="single-item">
                        <div class="ribbon-wrapper"></div>

                        <div class="single-item-header">
                            <a href="{{route('chitietsanpham',$item->masanpham)}}"><img src="source/image/product/{{$item->hinh}}" alt=""></a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title">{{$item->tensanpham}}</p>
                            <p class="single-item-price">
                                <span class="flash-sale">{{$item->gia}}?????ng</span>
                     
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{route('themgiohang',$item->masanpham)}}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{route('chitietsanpham',$item->masanpham)}}">Chi Ti???t  <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                {{$sanphamhot->links()}}
            </div>
        </div> <!-- .beta-products-list -->

        <div class="space50">&nbsp;</div>

        <div class="beta-products-list">
            <h4>B???n C?? Th??? Th??ch</h4>
            <div class="beta-products-details">
                <p class="pull-left">T??m Th???y {{count($sanphamnormal1)}} S???n Ph???m</p>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                @foreach ($sanphamnormal as $item)
                <div class="col-sm-3">
                    <div class="single-item">
                        <div class="single-item-header">
                            <a href="{{route('chitietsanpham',$item->masanpham)}}"><img src="source/image/product/{{$item->hinh}}" alt="" width="300" height="250"></a>
                        </div>
                        <div class="single-item-body">
                            <p class="single-item-title">{{$item->tensanpham}}</p>
                            <p class="single-item-price">
                                <span class="flash-sale">{{$item->gia}} ?????ng</span>
                            </p>
                        </div>
                        <div class="single-item-caption">
                            <a class="add-to-cart pull-left" href="{{route('themgiohang',$item->masanpham)}}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="beta-btn primary" href="{{route('chitietsanpham',$item->masanpham)}}">Details <i class="fa fa-chevron-right"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                {{$sanphamhot->links()}}
            </div>
            <div class="space40">&nbsp;</div>
         
        </div> <!-- .beta-products-list -->
    </div>
</div> <!-- end section with sidebar and main content -->


</div> <!-- .main-content -->
</div> <!-- #content -->
</div> 
@endsection