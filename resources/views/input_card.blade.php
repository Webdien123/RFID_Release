@extends('home')
@section('Input_card')
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Thông tin thẻ</h3>
			</div>
			<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Mã thẻ</th>
							<th class="text-primary">
								{{ $mathe }}
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>Họ tên</th>
							<td>
								{{ $sv->hoten }}
								<input type="text" name="hoten" id="hoten" value="{{ $sv->hoten }}" hidden>
								<button type="button" id="btn_doc_ten" class="btn btn-default">
								<script src="<?php echo asset('public/js/input_card.js')?>"></script>
								<span class="glyphicon glyphicon-volume-up" aria-hidden="true"></span>
								Đọc lại họ tên</button>
							</td>
						</tr>

						<tr>
							<th>MSSV</th>
							<td>
								{{ $sv->mssv }}
							</td>
						</tr>

						<tr>
							<th>Ngày sinh</th>
							<td>
								{{ date("d-m-Y", strtotime($sv->ngsinh)) }}
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection