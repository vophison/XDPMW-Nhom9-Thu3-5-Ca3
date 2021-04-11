<div id="header">
    @if (Session::has('zerodonhang'))
                <div class="alert alert-info">{{ Session::get('zerodonhang') }}</div>
             @endif
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
                </ul>
            </div>
          
            <div class="pull-right auto-width-right">

                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                    <li><a href="#"><i class="fa fa-user"></i>Chào {{Auth::user()->name}}</a></li>
                    <li><a href="{{route('dangxuatuser')}}"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                    <li><a href="{{route('xemdonhang')}}"><i class="fa fa-list"></i>Đơn hàng </a></li>
                    <li><a href="{{route('xemthongtin')}}"><i class="fa fa-info"></i>Thông tin</a></li>
                    @else
                    <li><a href="{{route('dangky')}}">Đăng kí</a></li>
                    <li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
                    @endif
                </ul>
                
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{route('trangchu')}}" id="logo"><img src="source/image/product/logo.jpg" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
                        <input type="text" value="" name="tukhoa" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                    @if(Session::has('cart'))
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng(@if(Session::has('cart')) {{Session('cart')->totalQty}}
                            @else Trống @endif) <i class="fa fa-chevron-down"></i></div>
                        <div class="beta-dropdown cart-body">
                           <!-- kiểm tra có giỏ hàng hay ko -->
                            @foreach($product_cart as $product) 
                            <div class="cart-item">
                                <a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['masanpham'])}}"><i class="fa fa-times"></i></a> 
                                <a class="cart-item-amount" href="{{route('xoagiohangit',$product['item']['masanpham'])}}"><i class="fa fa-angle-down">GiảmSL</i></a> 
                                <div class="media">
                                    <a class="pull-left" href="#"><img src="source/image/product/{{$product['item']['hinh']}}" alt=""></a> <!-- do than28ng product đi qua thêm biến item -->
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$product['item']['tensanpham']}}</span>
                                        <span class="cart-item-amount">{{$product['qty']}}*<span>{{$product['item']['gia']}}</span></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                         

                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Session('cart')->totalPrice}}</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .cart -->
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('trangchu')}}">Trang chủ</a></li> <!-- .Láy trang chủ ở appserviceporvider -->
                    <li><a href="{{route('trangchu')}}">Loại Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach ($sanpham_loai as $item)
                            <li><a href="{{route('loaisanpham',$item->maloai)}}">{{$item->tenloai}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('trangchu')}}">Hãng Sản phẩm</a>
                        <ul class="sub-menu">
                            @foreach ($sanpham_hang as $item)
                            <li><a href="{{route('hangsanpham',$item->mahang)}}">{{$item->tenhang}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('gioithieu')}}">Giới Thiệu</a></li>
                    <li><a href="{{route('lienhe')}}">Liên Hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->