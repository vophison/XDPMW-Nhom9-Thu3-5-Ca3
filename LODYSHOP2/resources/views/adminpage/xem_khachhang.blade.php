@extends('adminlayout')
@section('admincontent')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
       Liệt kê các khách hàng
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
            <form role="search" method="get" id="searchform" action="">
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
     
              <th>Họ tên khách hàng</th>
              <th>Email</th>
              <th>Số điện thoại</th>
              <th>Địa chỉ</th>
              <th>Cập nhật trạng thái</th>
           
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            
            @foreach($xem_khachhang as $key =>$khachhang)
    
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                
         
                <td>{{$khachhang->name}}</td>
              <td>{{$khachhang->email}}</td>
       
              <td>{{$khachhang->phone}}</td>
              <td>{{$khachhang->address}}</td>
              @if($khachhang->trangthai==1)
              <td><a href="{{route('capnhatkhachhang',$khachhang->email)}}"  class="active" ui-toggle-class="" 
                onclick="return confirm('Bạn có chắc muốn cập nhật trạng thái này không')"> Đang hoạt động</td>
              @else
              <td><a href="{{route('capnhatkhachhang',$khachhang->email)}}"  class="active" ui-toggle-class="" 
                onclick="return confirm('Bạn có chắc muốn cập nhật trạng thái này không')"> Ngưng hoạt động</td>
              @endif
            </tr>

            @endforeach
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