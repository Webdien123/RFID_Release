<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trang hủy thẻ</title>

		@include('link_css_js')
		<script src="<?php echo asset('public/js/jquery.validate.js')?>"></script>

		<script src="<?php echo asset('public/js/validate_addsv_form.js')?>"></script>
	</head>
	<body>
		<div class="container-fluid">
			@include('admin_header')
			<br>

			<h1 class="text-center">Danh sách sinh viên đã đăng kí</h1>

			<div class="col-sm-12">
				<div class="pull-left">
					<button type="button" class="btn btn-primary"  data-toggle="modal" href='#modal-themsv' id="btn_them_sv">
						<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
						Thêm sinh viên
					</button>
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
	 					<th>Mã thẻ</th>
	 					<th>Thao tác</th>
	 				</tr>
	 			</thead>
	 			<tbody>
	 				@for($i = 0; $i < count($danhsachthe); $i++)
		 				<tr>
		 					<td>{{ $danhsachthe[$i]->sinhvien->hoten }}</td>
		 					<td>{{ $danhsachthe[$i]->sinhvien->mssv }}</td>
		 					<td>{{ $danhsachthe[$i]->sinhvien->sdt }}</td>
		 					<td>{{ date("d-m-Y", strtotime($danhsachthe[$i]->sinhvien->ngsinh)) }}</td>
		 					<td>{{ $danhsachthe[$i]->id }}</td>
		 					<td>
								<a href="{{ route('SuaSV', ['mssv' => $danhsachthe[$i]->mssv]) }}" class="btn btn-success">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									Sửa thông tin
								</a>

								<button type="button" class="btn btn-danger" 
								onclick="
									if(window.confirm('Hủy thẻ này?')){
										if(window.confirm('Xóa cả thông tin của sinh viên này trong bộ nhớ?')){
											window.location.replace('<?php echo route("XuLyXoaThe", ["id" => $danhsachthe[$i]->id, "xoasv" => "true"]) ?>');

										}
										else{
											window.location.replace('<?php echo route("XuLyXoaThe", ["id" => $danhsachthe[$i]->id, "xoasv" => "false"]) ?>');
										}
									}
								">
									<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
									Hủy thẻ
								</button>
							</td>
		 				</tr>
		 			@endfor

		 			@if(count($danhsachthe) == 0)
		 				<tr>
		 					<th colspan="6" class="text-center"><i>Hiện chua có sinh viên đăng kí thẻ</i></th>
		 				</tr>
		 			@endif
	 			</tbody>
	 		</table>
	 		<center>
				{!! $danhsachthe->links() !!}	
			</center>
		</div>
		
	</body>
</html>