<?
	$data = null;
	if ($this->session->flashdata('login')) {
		$data = $this->session->flashdata('login');
	}
	$password				= (!empty($data->password) ? $data->password : "");
	$new_password			= (!empty($data->new_password) ? $data->new_password : "");
	$confirm_new_password	= (!empty($data->confirm_new_password) ? $data->confirm_new_password : "");
?>
<div class="page-content-wrap">
	<div class="container">
		<div class="panel panel-default change-password">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<br>
						<div class="panel-heading">
							<h5 class="panel-title">Thay Đổi Mật Khẩu</h5>
						</div>
						<br>
						<form id="frm-user" action="" class="form-horizontal" role="form" method="POST">
							<input type="hidden" id="task" name="task" value="">
							<div class="row">
								<div class="col-md-4">
									<label class="control-label">Mật khẩu hiện tại <span class="text-required">*</span></label>
								</div>
								<div class="col-md-8">
									<input type="password" class="form-control" id="password" name="password" value="<?=$password?>" placeholder="" />
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-4">
									<label class="control-label">Mật khẩu mới <span class="text-required">*</span></label>
								</div>
								<div class="col-md-8">
									<input type="password" class="form-control" id="new_password" name="new_password" value="<?=$new_password?>" placeholder="" />
									<span class="help-block">
										<i>Mật khẩu phải có ít nhất 6 ký tự.</i>
									</span>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-4">
									<label class="control-label">Nhập lại mật khẩu mới <span class="text-required">*</span></label>
								</div>
								<div class="col-md-8">
									<input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" value="<?=$confirm_new_password?>" placeholder="" />
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-4">
								</div>
								<div class="col-md-8">
									<button id="btn-save" class="btn btn-danger">Cập nhật</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
	
	$('#btn-save').click(function(e) {
		e.preventDefault();
		
		var err = 0;
		var msg = [];
		
		clearFormError();
		
		if ($("#password").val() == "") {
			$("#password").addClass("error");
			err++;
			msg.push("Mật khẩu hiện tại không được trống.");
		} else {
			$("#password").removeClass("error");
		}
		
		if ($("#new_password").val() == "") {
			$("#new_password").addClass("error");
			err++;
			msg.push("Mật khẩu mới không được trống.");
		} else if ($("#new_password").val().length < 6) {
			$("#new_password").addClass("error");
			err++;
			msg.push("Mật khẩu phải có ít nhất 6 ký tự.");
		} else {
			$("#new_password").removeClass("error");
		}

		if ($("#new_password").val().length && $("#confirm_new_password").val() != $("#new_password").val()) {
			$("#confirm_new_password").addClass("error");
			err++;
			msg.push("Mật khẩu không giống nhau.");
		} else {
			$("#confirm_new_password").removeClass("error");
		}
		
		if (!err) {
			$("#task").val("save");
			$("#frm-user").submit();
		} else {
			showErrorMessage(msg);
		}
	});
});
</script>