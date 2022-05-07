<div class="profile container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<form id="frm-user" action="" class="form-horizontal" role="form" enctype="multipart/form-data" method="POST">
						<input type="hidden" id="task" name="task" value="">
						<div class="row">
							<div class="col-md-6">
								<div class="panel-heading">
									<h3 class="panel-title">Thông Tin Cá Nhân</h3>
								</div>
								
								<div class="item">
									<div class="row">
										<div class="col-md-3">
											<label class="control-label">Họ và Tên <span class="text-required">*</span></label>
										</div>
										<div class="col-md-9">
											<input type="text" class="form-control" id="fullname" name="fullname" value="<?=$user->fullname?>" placeholder="Họ và Tên" />
										</div>
									</div>
								</div>
								<div class="item">
									<div class="row">
										<div class="col-md-3">
											<label class="control-label">Giới tính <span class="text-required">*</span></label>
										</div>
										<div class="col-md-9 clearfix">
											<div class="radio float-left">
												<label style="font-size: 13px">
													<input type="radio" name="gender" value="1" <?=($user->gender?"checked":"")?>/>
													Nam
												</label>
											</div>
											<div class="radio float-left" style="margin-left: 12px;">
												<label style="font-size: 13px">
													<input type="radio" name="gender" value="0" <?=($user->gender?"":"checked")?>/>
													Nữ
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="row">
										<div class="col-md-3">
											<label class="control-label">Ngày sinh</label>
										</div>
										<div class="col-md-9">
											<input type="date" name="birthday" id="birthday" class="form-control" value="<?=date("Y-m-d", strtotime($user->birthday))?>"/>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="row">
										<div class="col-md-3">
											<label class="control-label">Số điện thoại <span class="text-required">*</span></label>
										</div>
										<div class="col-md-9">
											<input type="text" id="phone" name="phone" class="form-control" value="<?=$user->phone?>" placeholder="Số điện thoại" />
										</div>
									</div>
								</div>
								<div class="item">
									<div class="row">
										<div class="col-md-3">
											<label class="control-label">Địa chỉ</label>
										</div>
										<div class="col-md-9">
											<input type="text" id="address" name="address" class="form-control" value="<?=!empty($user->address) ? $user->address : "" ?>" placeholder="Địa chỉ" />
										</div>
									</div>
								</div>
								<div class="item">
									<div class="row">
										<div class="col-md-3">
										</div>
										<div class="col-md-9">
											<div class="text-left"><a id="btn-save" class="btn btn-danger" style="color:#fff">Cập nhật</a></div>
										</div>
									</div>
								</div>
								
							</div>
							<!-- <div class="col-md-6">
								<div class="panel-heading">
									<h3 class="panel-title">Mạng xã hội</h3>
								</div>
								<div class="item">
									<div class="row">
										<div class="col-md-3">
											<label class="control-label">Facebook</label>
										</div>
										<div class="col-md-9">
											<input type="text" id="facebook" name="facebook" class="form-control" value="<?=!empty($user->facebook) ? $user->facebook : "" ?>" placeholder="Facebook" />
										</div>
									</div>
								</div>
								<div class="item">
									<div class="row">
										<div class="col-md-3">
											<label class="control-label">Twitter</label>
										</div>
										<div class="col-md-9">
											<input type="text" id="twitter" name="twitter" class="form-control" value="<?=!empty($user->twitter) ? $user->twitter : "" ?>" placeholder="Twitter" />
										</div>
									</div>
								</div>
								<div class="item">
									<div class="row">
										<div class="col-md-3">
											<label class="control-label">Google</label>
										</div>
										<div class="col-md-9">
											<input type="text" id="google" name="google" class="form-control" value="<?=!empty($user->google) ? $user->google : "" ?>" placeholder="Google" />
										</div>
									</div>
								</div>
								<div class="item">
									<div class="row">
										<div class="col-md-3">
											<label class="control-label">Website</label>
										</div>
										<div class="col-md-9">
											<input type="text" id="website" name="website" class="form-control" value="<?=!empty($user->website) ? $user->website : "" ?>" placeholder="Website" />
										</div>
									</div>
								</div>
							</div> -->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
	$('.avatar').click(function(){
		$('#userfile').click();
	});

	$("#userfile").change(function() {
		readURL(this);
	});
	if ($("#fullname").val() == "") {
		$("#fullname").addClass("error");
	} else {
		$("#fullname").removeClass("error");
	}
	if ($("#email").val() == "") {
		$("#email").addClass("error");
	} else {
		$("#email").removeClass("error");
	}
	if ($("#phone").val() == "") {
		$("#phone").addClass("error");
	} else {
		$("#phone").removeClass("error");
	}
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('.img-avatar').attr("src", e.target.result);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
	$('#btn-save').click(function(e) {
		e.preventDefault();

		var err = 0;
		var msg = [];

		clearFormError();

		if ($("#fullname").val() == "") {
			$("#fullname").addClass("error");
			err++;
			msg.push("Họ và Tên không được trống.");
		} else {
			$("#fullname").removeClass("error");
		}

		if ($("#email").val() == "") {
			$("#email").addClass("error");
			err++;
			msg.push("Email không được trống.");
		} else {
			$("#email").removeClass("error");
		}

		if ($("#phone").val() == "") {
			$("#phone").addClass("error");
			err++;
			msg.push("Số điện thoại không được trống.");
		} else {
			$("#phone").removeClass("error");
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
