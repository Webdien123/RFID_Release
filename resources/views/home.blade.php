<!DOCTYPE html>
<html lang="vi">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trang chủ</title>
		@include('link_css_js')

		<script src="<?php echo asset('public/js/focus_card.js')?>"></script>
	</head>

	<body>
		<div class="container-fluid"> 

			<div class="row">
				<div class="col-sm-12 bg-success">

					<a href="{{ route('GetViewHome') }}" class="btn btn-primary">
						<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
						Trang chủ
					</a>
					<a href="{{ route('goAdmin') }}" class="btn btn-info">
						<span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span>
						Trang quản trị
					</a>
				</div>				
			</div>

			</br>

			<h1 class="text-center">Vui lòng quét thẻ của bạn</h1>

			<form action="{{ route('Input_card') }}" method="post" class="text-center" id="f_quet_the">
				{{ csrf_field() }}
				Mã thẻ: <input type="text" name="id" id="MaThe" required placeholder="Hãy quét thẻ của bạn">
				<input type="submit"
	   				style="position: absolute; left: -9999px; width: 1px; height: 1px;"tabindex="-1" />
			</form>

			</br>

			@yield('Input_card')
			
		</div>
		
	</body>
</html>