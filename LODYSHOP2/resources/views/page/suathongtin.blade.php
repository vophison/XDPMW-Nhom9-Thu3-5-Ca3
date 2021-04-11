@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Thông tin</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Trang chủ</a> / <span>Sửa thông tin</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        
     
        <div class="container">
            <div id="content">
                
                <form action="{{route('suathongtin')}}" method="post" class="beta-form-checkout">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"> <!-- form dùng phương thức post => cần token -->
                    
                    <div class="row">
                        <div class="col-sm-3"></div>
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{$err}};
                                @endforeach
                            </div>
                        @endif
                        @if(Session::has('thanhcong'))
                        <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                        @endif
                        <div class="col-sm-6">
                            <h4>Sửa thông tin</h4>
                            <div class="space20">&nbsp;</div>
                       <div class="form-block">
                                <label for="email">Email</label>
                                <input type="email" id="email" required name="email" name="email" value="{{$email}} " disabled>
                            </div>
                            
                       
                            <div class="form-block">
                                <label for="your_last_name">Họ tên</label>
                                <input type="text" id="your_last_name" required name="fullname" value="{{$name}}">
                            </div>
                            
                            <div class="form-block">
                                <label for="adress">Địa chỉ</label>
                                <input type="text" id="adress" value="Street Address" required name="address" value="{{$address}}">
                            </div>
        
        
                            <div class="form-block">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" id="phone" required name="phone" value="{{$phone}}">
                            </div>
                         
                            <div class="form-block">
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </div>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                </form>
            </div> <!-- #content -->
        </div> <!-- .container -->

    </div>
</div>        @endsection