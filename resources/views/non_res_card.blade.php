@extends('home')
@section('Input_card')
<script type="text/javascript">
	$(document).ready(function(){
	    responsiveVoice.speak("Thẻ này chưa được đăng kí, vui lòng liên hệ người quản trị để sử dụng","Vietnamese Male");
	});
</script>

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
							<th>Thẻ này chưa được đăng kí, vui lòng liên hệ người quản trị để sử dụng</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

</div>

@endsection