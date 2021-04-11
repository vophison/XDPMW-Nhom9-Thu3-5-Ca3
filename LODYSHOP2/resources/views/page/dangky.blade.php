@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng kí</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        
        <form action="{{route('dangky')}}" method="post" class="beta-form-checkout">
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
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>

                    
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" id="email" required name="email" name="email">
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Fullname*</label>
                        <input type="text" id="your_last_name" required name="fullname">
                    </div>

                    <div class="form-block">
                        <label for="adress">Address*</label>
                        <input type="text" id="adress" value="Street Address" required name="address">
                    </div>


                    <div class="form-block">
                        <label for="phone">Phone*</label>
                        <input type="text" id="phone" required name="phone">
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="password" id="phone" required name="password">
                    </div>
                    <div class="form-block">
                        <label for="phone">Re_password*</label>
                        <input type="password" id="phone" required name="re_password">
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection