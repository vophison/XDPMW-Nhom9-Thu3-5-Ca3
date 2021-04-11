@extends('adminlayout')
@section('admincontent')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
       Liệt kê sản phẩm
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
            
            <form role="search" method="get" id="searchform" action="{{route('timkiemsanpham')}}">
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
              <th>Mã sản phẩm</th>
              <th>Tên sản phẩm</th>
              <th>Số Lượng Sản Phẩm</th>
              <th>Mô tả sản phẩm</th>
              <th>Giá Sản Phẩm</th>
              <th>Loại sản phẩm</th>
              <th>Hãng Sản Phẩm</th>
              <th>Hình Sản Phẩm</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            
            @foreach($xem_sanpham as $key =>$sanpham)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{$sanpham->masanpham}}</td>
              <td>{{$sanpham->tensanpham}}</td>
              <td>{{$sanpham->soluong}}</td>
              <td>{{$sanpham->mota}}</td>
              <td>{{$sanpham->gia}}</td>
              <td>{{$sanpham->tenloai}}</td>
              <td>{{$sanpham->tenhang}}</td>
              <td><img src="source/image/product/{{$sanpham->hinh}}" alt="" height="120px" width="100"></td>
             
              <td>
               
                <a href="{{route('suasanpham',$sanpham->masanpham )}}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i></a>
         
                  <a href="{{route('xoasanpham',$sanpham->masanpham )}} " class="active" ui-toggle-class="" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm sản phẩm này không')">
                    <i class="fa fa-times text-danger text"></i></a>

         
              </td>
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