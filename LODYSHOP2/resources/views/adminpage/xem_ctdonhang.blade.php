@extends('adminlayout')
@section('admincontent')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
       Liệt kê các đơn hàng
      </div>
      @if(Session::has('mess'))
      <div class="alert alert-danger">{{Session::get('mess')}}</div>
      {{Session::put('mess',null)}} <!-- gán mess bằng null -->
      @endif
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <form role="search" method="get" id="searchform" action="{{route('timkiemdonhang')}}">
            <input type="text" class="input-sm form-control" placeholder="Search" name="tukhoa">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="submit">Go!</button>
            </span>
            </form>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Mã Đơn hàng</th>
              <th>Tài Khoản Đặt Hàng</th>
              <th>Ngày Đặt hàng</th>
              <th>Trạng Thái</th>
              <th>Thành Tiền</th>
              <th>Cập nhật Trạng Thái</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td><a href="{{route('xemchitietdonhang',$donhang->madonhang)}}">{{$donhang->madonhang}}
                <div class="row">
                    @foreach ($chitietdonhang as $item1)   <!--  các chi tiết đơn hàng thuộc đơn hàng cùng mã-->
                    @if($item1->madonhang==$donhang->madonhang)  <!--  kiểm tra ctdh nào cùng mã đơn hàng-->
                        @foreach($sanphamctdh as $item2)<!--  các hình ảnh sản phẩm thuộc chi tiết đơn hàng cùng mã-->         
                      @if($item2->masanpham == $item1->masanpham) <!--  kiểm tra sản phẩm nào cũng mã sản phẩm với chi tiết đơn hàng-->       
                          <div class="col-sm-6">
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
              </td></a>
              @if($donhang->taikhoankhachhang==null)
              <td>{{$donhang->taikhoanusers}}(User)</td>
              @else
              <td>{{$donhang->taikhoankhachhang}}(Cus)</td>
                @endif
              <td>{{$donhang->ngaydathang}}</td>
              @if($donhang->trangthai==1)
              <td>Đang chờ xử lý</td>
              @elseif($donhang->trangthai==2)
              <td>Đã xác nhận đơn hàng</td>
              @elseif($donhang->trangthai==3)
              <td>Đang giao hàng</td>
              @elseif($donhang->trangthai==4)
              <td>Đơn hàng đã hoàn thành</td>
              @endif
              <td>{{$donhang->thanhtien}}</td>
              <td><a href="{{route('capnhatdonhang',$donhang->madonhang)}}"  class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc muốn cập nhật đơn hàng này không')">  
                @if($donhang->trangthai==1)Xác nhận đơn hàng @elseif($donhang->trangthai==2) Giao hàng @elseif($donhang->trangthai==3)Hoàn thành đơn hàng @endif</a></td>
              <td>
                   <a href="{{route('xoadonhang',$donhang->madonhang )}} " class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc muốn xóa loại đơn hàng này không')">
                    <i class="fa fa-times text-danger text"></i></a>
               
              </td>
            </tr>

          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  </section>
   <!-- footer -->
            <div class="footer">
              <div class="wthree-copyright">
                <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
              </div>
            </div>
@endsection