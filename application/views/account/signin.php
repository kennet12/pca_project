<div class="container">
	<div class="section">
		<form id="frm-login" name="frm-login" class="frm-login form-horizontal" role="form" action="" method="POST">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="box-login">
						<h1 class="title">Đăng nhập</h1>
						<p class="text-color-gray">Xin chào, bạn đã đến với chợ phụ tùng</p>
						<div class="form-group">
							<input type="text" name="username" id="username" placeholder="Email hoặc số điện thoại">
						</div>
						<div class="form-group">
							<input type="password" name="password" id="password" placeholder="Nhập mật khẩu của bạn">
						</div>
						<div class="text-center">
							<a id="btn-login">Đăng nhập</a>
						</div>
						<div class="text-center forgot-password">
							<a href="">Bạn quên mật khẩu?</a>
						</div>
						<!-- <div class="text-center forgot-password">
							<p class="text-color-gray">Hoặc sử dụng</p>
						</div>
						<div class="login-social">
							<a href="#" class="login-fb">Đăng nhập bằng Facebook</a>
							<a href="#" class="login-gle">Đăng nhập bằng Google</a>
						</div> -->
						<div class="text-center forgot-password">
							<p class="">Bạn chưa có tài khoản? <a href="<?=site_url('tai-khoan/dang-ky')?>" class="text-color-blue">Đăng ký ngay</a></p>
						</div>
					</div>
					<input type="hidden" id="task" name="task" value="" />
				</div>
				<div class="col-md-3"></div>
			</div>
		</form>
	</div>
</div>
<script>
$(document).ready(function() {
	<? if ($this->session->flashdata("error")) { ?>
	messageBox("ERROR", "Xảy ra lỗi", "<?=$this->session->flashdata("error")?>");
	<? } ?>

	$("#btn-login").click(function() { console.log(123);
		var err = 0;
		var msg = [];

		clearFormError();

		if ($("#username").val() == "") {
			$("#username").addClass("error");
			err++;
			msg.push("Tên đăng nhập không được trống.");
		} else {
			$("#username").removeClass("error");
		}

		if ($("#password").val() == "") {
			$("#password").addClass("error");
			err++;
			msg.push("Mật khẩu không được trống.");
		} else {
			$("#password").removeClass("error");
		}
		if (err == 0) {
			$("#task").val("login");
			$("#frm-login").submit();
		} else {
			showErrorMessage(msg);
		}
	});
});
</script>

