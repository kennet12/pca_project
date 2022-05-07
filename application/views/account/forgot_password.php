<div class="container">
	<div class="section-detail">
		<form id="frm-user" name="" action="" method="POST">
			<input type="hidden" id="task" name="task" value="" />
			<div class="row">
				<div class="col-md-6">
					<h1 class="page-title">Quên mật khẩu</h1><br>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Mật khẩu mới: <span class="text-color-red">*</span></label>
							</div>
							<div class="col-md-9">
								<input type="password" class="form-control" id="new_password" name="new_password" value="" placeholder="" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label class="control-label">Xác nhận lại: <span class="text-color-red">*</span></label>
							</div>
							<div class="col-md-9">
								<input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" value="" placeholder="" />
								<span class="help-block">
									<i>Mật khẩu phải có ít nhất 6 ký tự.</i>
								</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-9">
								<button type="submit" class="btn btn-danger" id="btn-update">Đổi mật khẩu</button>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
$(document).ready(function() {
	
	$('#btn-update').click(function(e) {
		e.preventDefault();
		
		var err = 0;
		var msg = [];
		
		clearFormError();
		
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
			msg.push("Xác nhận mật khẩu không giống mật khẩu.");
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