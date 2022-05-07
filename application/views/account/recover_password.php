<div class="container">
	<div class="section-detail">
		<form id="frmSignUp" name="frmSignUp" action="" method="POST">
			<div class="row">
				<div class="col-md-6">
					<h1 style="font-size:30px;" class="page-title">Quên mật khẩu</h1>
					<p>Nếu bạn đã quên mật khẩu tài khoản đăng nhập, chỉ cần cung cấp địa chỉ Email, chúng tôi sẽ gửi email bao gồm các thông tin để giúp bạn khôi phục tài khoản.</p>
					<div class="form-group">
						<h5>Nhập vào Email của bạn</h5>
						<input style="border-radius: 5px;" type="text" class="form-control" id="email" name="email" placeholder="Email của bạn" />
						<br>
						<div class="g-recaptcha" data-theme="light" data-sitekey="<?=RECAPTCHA_KEY?>"></div>
						<br>
						<div>
							<span class="input-group-btn">
								<button type="button" class="btn btn-danger" id="btn-getpass">Lấy lại mật khẩu</button>
							</span>
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" id="task" name="task" value="" />
		</form>
	</div>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
	$(document).on('click','.btn-secondary',function() {
		if($('.modal-title').html()=='Gửi thành công'){
			window.location.href = '<?=BASE_URL?>';
		}
	})
$(document).ready(function() {
	<? if ($this->session->flashdata("error")) { ?>
	messageBox("ERROR", "Xảy ra lỗi", "<?=$this->session->flashdata("error")?>");
	<? } else if ($this->session->flashdata("success")) { ?>
	messageBox("INFO", "Gửi thành công", "<?=$this->session->flashdata("success")?>");
	<? } ?>
	
	$("#btn-getpass").click(function() {
		var err = 0;
		var msg = [];
		
		if ($("#email").val() == "") {
			$("#email").addClass("error");
			err++;
			msg.push("Email không được trống.");
		} else {
			// if(isEmail($("#email").val())){
			// 	err++;
			// 	msg.push("Email không hợp lệ.");
			// } else {
				$("#email").removeClass("error");
			// }
		}
		if ($('#g-recaptcha-response').val() == "") {
			err++;
			msg.push('Xác nhận tôi không phải là robot');
		}
		
		if (!err) {
			$("#task").val("getpass");
			$("#frmSignUp").submit();
		} else {
			showErrorMessage(msg);
		}
	});
});
</script>