<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Trang quản lý Admin</title>
<base href="{{asset('')}}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{('source/adminassets/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{('source/adminassets/css/style.css')}}" rel="stylesheet" type="text/css" />
<link href="{{('source/adminassets/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{('/source/adminassets/css/font.css')}}" type="text/css"/>
<link href="{{('source/adminassets/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Đăng nhập</h2>
	@if(Session::has('mess'))
	<div class="alert alert-danger">{{Session::get('mess')}}</div>
	{{Session::put('mess',null)}} <!-- gán mess bằng null -->
	@endif
		<form action="{{(route('trangchuadmin'))}}" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}"> <!-- form dùng phương thức post => cần token -->
			<input type="text" class="ggg" name="taikhoan" placeholder="Tài khoản" required="">
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
			<span><input type="checkbox" />Ghi nhớ</span>
			<h6><a href="#">Quên mật khẩu?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="login">
		</form>

</div>
</div>
<script src="{{('source/adminassets/js/bootstrap.js')}}"></script>
<script src="{{('source/adminassets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{('source/adminassets/js/scripts.js')}}"></script>
<script src="{{('source/adminassets/js/jquery.slimscroll.js')}}"></script>
<script src="{{('source/adminassets/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript')}}" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{('source/adminassets/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
