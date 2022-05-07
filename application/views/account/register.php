<div class="container">
	<div class="section">
		<form id="frm-login" name="frm-login" class="frm-login form-horizontal" role="form" action="" method="POST">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="box-login">
						<h1 class="title">Đăng ký</h1>
						<p class="text-color-gray">Xin chào, bạn đã đến với chợ phụ tùng</p>
						<div class="form-group">
							<input type="text" name="phone" id="phone" placeholder="Số điện thoại của bạn.">
						</div>
						<div class="form-group">
							<input type="password" name="password" id="password" placeholder="Nhập mật khẩu của bạn ít nhất 6 ký tự">
						</div>
                        <div class="form-group">
							<input type="text" name="fullname" id="fullname" placeholder="Nhập tên của bạn">
						</div>
                        <div class="form-group">
							<input type="text" name="email" id="email" placeholder="Email của bạn.">
                            <p class="text-color-gray" style="font-size:13px;">(Có thể dùng email để đăng nhập - không bắt buộc)</p>
						</div>
						<div class="text-center">
							<a id="btn-login">Đăng ký</a>
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

		var err = 0;
		var msg = [];

		clearFormError();

		function validatePhone(new_phone) {
			var a = $('#'+new_phone).val();
			var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
			if (filter.test(a)) {
				return true;
			}
			else {
				return false;
			}
		}

        if ($("#email").val() != "") {
            if (!isEmail($("#email").val())){
                $("#email").addClass("error");
                err++;
                msg.push("Không phải định dạng của email.");
            } else {
                $("#email").removeClass("error");
            }
		}

		if ($("#fullname").val() == "") {
			$("#fullname").addClass("error");
			err++;
			msg.push("Vui lòng nhập tên của bạn.");
		} else {
			$("#fullname").removeClass("error");
		}

		if ($("#phone").val() == "") {
			$("#phone").addClass("error");
			err++;
			msg.push("Vui lòng nhập số điện thoại.");
		} else {
			if (validatePhone('phone') == false) {
				$("#phone").addClass("error");
				err++;
				msg.push("Số điện thoại không hợp lệ");
			}
			else {
				$("#phone").removeClass("error");
			}

		}

		if ($("#password").val() == "") {
			$("#password").addClass("error");
			err++;
			msg.push("Mật khẩu không được trống.");
		} else if ($("#password").val().length < 6) {
			$("#password").addClass("error");
			err++;
			msg.push("Mật khẩu phải có ít nhất 6 ký tự.");
		} else {
			$("#password").removeClass("error");
		}

		if (!err) {
			$("#task").val("register");
			$("#frm-login").submit();
		} else {
			showErrorMessage(msg);
		}
	});
});
</script>

