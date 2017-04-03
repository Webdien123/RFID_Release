<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trang đăng nhập</title>
		@include('link_css_js')
		
		<script src="<?php echo asset('public/js/jquery.validate.js')?>"></script>

		<script src="<?php echo asset('public/js/validate_login_form.js')?>"></script>
	</head>
	<body>
		<div class="container-fluid">
		<h1 class="text-center">Trang đăng nhập</h1>
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Đăng nhập</h3>
					</div>
					<div class="panel-body">
						<form action="{{ route('login_process') }}" method="POST" id="f_dgnhap">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="">Tên đang nhập:</label>
								<input type="text" class="form-control" name="uname" id="uname" placeholder="Tên đăng nhập">
							</div>
						
							<div class="form-group">
								<label for="">Mật khẩu:</label>
								<input type="password" class="form-control" name="pass" id="pass" placeholder="Mật khẩu">
							</div>

							<?php 
								if (Session::get('err') == "1") {
									echo "
										<h4><i class='text-danger'>Tên đăng nhập hoặc mật khẩu không đúng</i></h4>
									";
									Session::forget('err');
								}
							?>
							
							<button type="submit" class="btn btn-success">
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
								Đăng nhập
							</button>

							<a href="{{ route('GetViewHome') }}" class="btn btn-primary">
								<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
								Về trang chủ</a>
						</form>
					</div>
				</div>
			</div>
		</div>

		</div>
	</body>
</html>