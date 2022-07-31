<div class="cluster member">
	<div class="container container-content-child">
		<div class="banner-text">
			<h1 class="text font-wf">PCA MEMBERSHIP</h1>
		</div>
		<p>If you would like to compete in the PCA Shows you must have an active yearly membership. Membership with the PCA entitles you to compete at any PCA affiliated show for a one off fee of just £35 per year.</p>
		<p><strong> PLEASE MAKE SURE THE INFORMATION YOU PROVIDE IN THE FORM BELOW IS CORRECT BEFORE SUBMITTING </strong></p>
		<h5 class="text-pink"><strong>No refunds will be given once purchased. Refund Policy</strong></h5><br>
		<div class="row">
			<div class="col-md-6">
				<p><span class="text-pink"> STEP 1: </span>Please complete this form below to become an active member of the PCA</p>
			</div>
			<div class="col-md-2"></div>
			<div class="col-md-4">
				<a href="" class="linkElement">ONLINE REGISTRATION</a>
				<a href="" class="linkElement">EVENT CALENDAR</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form id="signin-frm" action="">
					<div class="box-register">
						<h3>PCA MEMBERSHIP LOGIN FORM</h3><br><br>
						<input class="username" type="text" placeholder="Tài khoản">
						<input class="password" type="password" placeholder="Mật khẩu">
						<div class="text-right">
							<button class="btn-login" type="submit">Đăng Nhập</button>
						</div>
						<br>
					</div>
				</form>
			</div>
			<div class="col-md-3"></div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<p style="font-size: 12px;font-weight: bold;color: #3078BE;">Experiencing payment problems? please feel free to contact our payment department: <a href="mailto:<?=$setting->company_email?>"><?=$setting->company_email?></a></p>
			</div>
		</div>
		<div class="text-center">
			<img class="img-mv2" src="<?=IMG_URL.'mv2.jpg'?>" alt="mv2">
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
	// <? if ($this->session->flashdata("error")) { ?>
	// messageBox("ERROR", "Xảy ra lỗi", "<?=$this->session->flashdata("error")?>");
	// <? } ?>

	// $("#btn-login").click(function() { console.log(123);
	// 	var err = 0;
	// 	var msg = [];

	// 	clearFormError();

	// 	if ($("#username").val() == "") {
	// 		$("#username").addClass("error");
	// 		err++;
	// 		msg.push("Tên đăng nhập không được trống.");
	// 	} else {
	// 		$("#username").removeClass("error");
	// 	}

	// 	if ($("#password").val() == "") {
	// 		$("#password").addClass("error");
	// 		err++;
	// 		msg.push("Mật khẩu không được trống.");
	// 	} else {
	// 		$("#password").removeClass("error");
	// 	}
	// 	if (err == 0) {
	// 		$("#task").val("login");
	// 		$("#frm-login").submit();
	// 	} else {
	// 		showErrorMessage(msg);
	// 	}
	// });
});
</script>

