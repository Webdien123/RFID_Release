<!DOCTYPE html>
<html lang="vi">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trang đăng kí</title>

		@include('link_css_js')
		<script src="<?php echo asset('public/js/jquery.validate.js')?>"></script>

		<script src="<?php echo asset('public/js/validate_addsv_form.js')?>"></script>
		
		<script src="<?php echo asset('public/js/focus_card.js')?>"></script>

	</head>

	<body>
		<div class="container-fluid">
			@include('admin_header')

			
			<?php 
			if (isset($_GET['page'])) {
				\Session::put('page', $_GET['page']); 
			}
			?>
			<h1 class="text-center">Đăng ký thẻ mới</h1>

			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">Thông tin đăng kí</h3>
						</div>
						<div class="panel-body">
							<table class="table table-hover">
								<thead>
									@if( Session::get('kq_dki') == 'success')
										<tr>
											<th colspan="2">
												<div class="alert alert-success alert-dismissable" id="success-alert">
													<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													<strong>Đăng kí thành công!</strong> sinh viên: <?php echo Session::get('sv_dki'); ?>
												</div>
											</th>
										</tr>
									@endif

									@if( Session::get('kq_dki') == 'failed_card')
										<tr>
											<th colspan="2">
												<div class="alert alert-danger alert-dismissable" id="error-alert">
													<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													<strong>Đăng kí thất bại!</strong> Thẻ này đã có người đăng kí
												</div>
											</th>
										</tr>
									@endif

									@if( Session::get('kq_dki') == 'invalid_card')
										<tr>
											<th colspan="2">
												<div class="alert alert-danger alert-dismissable" id="error-alert">
													<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
													<strong>Đăng kí thất bại!</strong> Mã thẻ không hợp lệ
												</div>
											</th>
										</tr>
									@endif

									<?php  
										Session::forget('sv_dki');
										Session::forget('kq_dki');
									?>

								@if (count($danhsachsv) > 0)
									<tr>
										<th>Thẻ đăng kí</th>
										<th>
											<form action="{{ route('DangKiThe') }}" method="post">
												{{ csrf_field() }}
												<input type="text" name="id" id="MaThe" placeholder="quét thẻ để đăng kí" required>
												<input type="hidden" name="mssv" value="{{ $danhsachsv[0]->mssv }}">
												<input type="submit"
									   				style="position: absolute; left: -9999px; width: 1px; height: 1px;"tabindex="-1" />
											</form>
										</th>
									</tr>
									</thead>
									<tbody>
										<tr>
											<th>Họ tên</th>
											<td>
												{{ $danhsachsv[0]->hoten }}
											</td>
										</tr>

										<tr>
											<th>MSSV</th>
											<td id="ms_0">
												{{ $danhsachsv[0]->mssv }}
											</td>
										</tr>

										<tr>
											<th>Số điện thoại</th>
											<td>
												{{ $danhsachsv[0]->sdt }}
											</td>
										</tr>

										<tr>
											<th>Ngày sinh</th>
											<td>
												{{ date("d-m-Y", strtotime($danhsachsv[0]->ngsinh)) }}
											</td>
										</tr>

										<tr>
											<td colspan="2">

												<a href="{{ route('SuaSV', ['mssv' => $danhsachsv[0]->mssv]) }}" class="btn btn-success">
													<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
													Sửa thông tin</a>

												<button type="button" class="btn btn-danger"
												onclick="if(window.confirm('Xóa sinh viên này?')){
												window.location.replace('<?php echo route("XoaSV", ["mssv" => $danhsachsv[0]->mssv]) ?>');}">
													<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
													Xóa</button>
											</td>
										</tr>
									</tbody>
									@else
											<tr>
												<th><i>Không có thông tin, thêm sinh viên mới nếu muốn đăng kí tiếp tục</i></th>
											</tr>						
										</thead>
									@endif
								
							</table>
						</div>
			</div>
				</div>
			</div>
			<h3 class="col-sm-12">Danh sách đăng kí tiếp theo:</h3>
			<div class="col-sm-12">
				<div class="pull-left">
					<button type="button" class="btn btn-primary"  data-toggle="modal" href='#modal-themsv' id="btn_them_sv">
						<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
						Thêm sinh viên
					</button>

					<a href="{{ route('XoaThe') }}" class="btn btn-info">
						<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
						Sinh viên đã đăng kí
					</a>				
				</div>

			</div>			


			<div class="modal fade" id="modal-themsv">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Thêm sinh viên</h4>
						</div>
						<div class="modal-body">
							<form action="{{ route('AddSV') }}" method="POST" id="f_addsv">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="">Họ tên:</label>
									<input type="text" name="hoten" id="hoten" class="form-control" placeholder="họ tên">
								</div>

								<div class="form-group">
									<label for="">MSSV:</label>
									<input type="text" name="mssv" id="mssv" class="form-control" placeholder="mã số sinh viên">
								</div>

								<div class="form-group">
									<label for="">Số điện thoại:</label>
									<input type="text" name="sdt" id="sdt" class="form-control" placeholder="số điện thoại">
								</div>

								<div class="form-group">
									<label for="">Ngày sinh:</label>
									<input type="date" name="ngsinh" id="ngsinh" class="form-control">
								</div>

								<button type="button" class="btn btn-default" data-dismiss="modal">
									<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
									Hủy
								</button>

								<button type="submit" class="btn btn-primary">
									<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
									Thêm sinh viên
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>

			
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>Họ tên</th>
						<th>MSSV</th>
						<th>Số điện thoại</th>
						<th>Ngày sinh</th>
						<th>Thao tác</th>
					</tr>
				</thead>
				<tbody>
				@if( count($danhsachsv) > 0 )
					@for($i = 1; $i < count($danhsachsv); $i++)
						<tr>
							<td>{{ $danhsachsv[$i]->hoten }}</td>
							<td>{{ $danhsachsv[$i]->mssv }}</td>
							<td>{{ $danhsachsv[$i]->sdt }}</td>
							<td>{{ date("d-m-Y", strtotime($danhsachsv[$i]->ngsinh)) }}</td>

							<td>
								<a href="{{ route('SuaSV', ['mssv' => $danhsachsv[$i]->mssv]) }}" class="btn btn-success">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									Sửa thông tin
								</a>

								<button type="button" class="btn btn-danger"
									onclick="if(window.confirm('Xóa sinh viên này?')){
									window.location.replace('<?php echo route("XoaSV", ["mssv" => $danhsachsv[$i]->mssv]) ?>');}">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									Xóa
								</button>
							</td>
						</tr>
					@endfor
				@else
					<tr>
						<th colspan="5" class="text-center"><i>
							danh sách trống
						</i></th>
					</tr>
				@endif
				</tbody>
			</table>
			<center>
				{!! $danhsachsv->links() !!}
			</center>
			
		</div>

	</body>
</html>