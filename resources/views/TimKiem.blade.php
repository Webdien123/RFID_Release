<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trang tìm kiếm</title>

		@include('link_css_js')
	</head>
	<body>
		<div class="container-fluid">

			@include('admin_header')

			@include('To_Mau_Ket_Qua')

			<br>
			<h1 class="text-center">Kết quả tìm kiếm: '{{ $TuKhoa }}'</h1>

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
					@for($i = 0; $i < count($danhsachsv); $i++)
						<tr>
							<td>{!! Doi_Mau($danhsachsv[$i]->hoten, $TuKhoa) !!}</td>
							<td>{!! Doi_Mau($danhsachsv[$i]->mssv, $TuKhoa) !!}</td>
							<td>{!! Doi_Mau($danhsachsv[$i]->sdt, $TuKhoa) !!}

							</td>
							<td>{!! Doi_Mau(date("d-m-Y", strtotime($danhsachsv[$i]->ngsinh)), $TuKhoa) !!}</td>

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
							Không tìm thấy kết quả nào
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