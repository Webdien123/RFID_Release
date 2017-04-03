<!DOCTYPE html>
<html lang="vi">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trang đăng kí</title>

		@include('link_css_js')

	</head>

	<body>
		<div class="container-fluid">
			@include('admin_header')

			<h1 class="text-center text-danger">{{ $mes }}</h1>

			<center><img src="<?php echo asset('img/sad.png')?>" class="img-responsive" alt="Image"></center>

			<h3 class="text-center"><b>{{ $re }}</b></h3>
			
			<h3 class="text-center">Bấm vào 
				<a onclick="window.history.back();">đây</a>
				để thử lại. Hoặc  
				<a href="{{ route('goAdmin') }}">về trang quản trị</a>
				thực hiện chức năng khác.
			</h3>

		</div>
	</body>
</html>