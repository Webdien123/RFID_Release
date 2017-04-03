<div class="row">
	<div class="col-sm-12 bg-success">
		<div class="pull-left">
			<a href="{{ route('GetViewHome') }}" class="btn btn-primary">
				<span class="glyphicon glyphicon-home" aria-hidden="true"></span>
				Trang chủ
			</a>

			@if(strpos($_SERVER['REQUEST_URI'], 'SuaSV') || strpos($_SERVER['REQUEST_URI'], 'XoaThe') || strpos($_SERVER['REQUEST_URI'], 'Error') || strpos($_SERVER['REQUEST_URI'], 'TimKiem'))
				<a href="{{ route('goAdmin') }}" class="btn btn-info">
					<span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span>
					Trang quản trị
				</a>	
			@endif
		</div>

		<div class="pull-right"">
			{!! 'Xin chào: <b>'.Session::get('uname').'</b>' !!}

			<a href="{{ route('logout') }}" class="btn btn-warning">
				<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
				Đăng xuất
			</a>
		</div>
		
	</div>

	<div class="col-sm-12">
		<div class="pull-right">
			<form action="{{ route('TimKiem') }}" method="get" class="form-inline" role="search">
				{{ csrf_field() }}
				<b>Tìm kiếm:</b>
				<input type="text" class="form-control" name="TuKhoa" placeholder="Nhập nội dung tìm kiếm" required>
				<button type="submit" class="btn btn-info">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					Tìm
				</button>
			</form>
		</div>
	</div>

</div>