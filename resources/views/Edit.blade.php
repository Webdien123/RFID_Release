<!DOCTYPE html>
<html lang="vi">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sửa thông tin</title>

		@include('link_css_js')
		<script src="<?php echo asset('public/js/jquery.validate.js')?>"></script>

		<script src="<?php echo asset('public/js/validate_editsv_form.js')?>"></script>

		<script src="<?php echo asset('public/js/focus_card.js')?>"></script>

	</head>

	<body>
		<div class="container-fluid">
			@include('admin_header')
			<br>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Sửa thông tin</h3>
						</div>

						@if( Session::get('kq_dki') == 'failed_update')
							<tr>
								<th colspan="2">
									<div class="alert alert-danger alert-dismissable" id="error-alert">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Cập nhật thất bại!</strong> thông tin mới không hợp lệ
									</div>
								</th>
							</tr>
						@endif

						<?php  
							Session::forget('sv_dki');
							Session::forget('kq_dki');
						?>

						<div class="panel-body">
							<form action="{{ route('XuLySuaSV') }}" method="POST" id="f_editsv">
								{{ csrf_field() }}

								<div class="form-group">
									<label for="">Mã số sinh viên:</label>
									<input type="text" name="mssv" id="mssv" class="form-control" value="{{ $sv->mssv }}" readonly>
								</div>

								<div class="form-group">
									<label for="">Họ tên:</label>
									<input type="text" name="hoten" id="hoten" value="{{ $sv->hoten }}" class="form-control" >
								</div>

								<div class="form-group">
									<label for="">Số điện thoại:</label>
									<input type="text" name="sdt" id="sdt" value="{{ $sv->sdt }}" class="form-control" >
								</div>

								<div class="form-group">
									<label for="">Ngày sinh:</label>
									<input type="date" name="ngsinh" id="ngsinh" value="{{ $sv->ngsinh }}" class="form-control">
								</div>

								<button type="button" class="btn btn-default" 
									onclick="
										if ({{ $sv->dangki }}) {
											window.location.replace('{{ route('XoaThe') }}');
										} 
										else {										
											window.location.replace('{{ route('goAdmin') }}');
										}"
										
									">
									<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
									Hủy
								</button>

								<button type="submit" class="btn btn-info">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									Sửa thông tin
								</button>
							</form>
						</div>
					</div>				
				</div>				
			</div>

			


		</div>
	</body>
</html>