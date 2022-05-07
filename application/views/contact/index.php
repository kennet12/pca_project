<?
	$setting = $this->m_setting->load(1);
?>
<div class="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<div class="box-contact-info display-desktop-contact">
					<div class="contact-info">
						<h2 class="title">THÔNG TIN LIÊN HỆ</h2>
						<p><?=$setting->company_logan?></p>
						<div class="contact-list">
							<ul>
								<li><a href="tel:<?=$setting->company_hotline?>" class="transition"><i class="fa fa-phone transition"></i><?=$setting->company_hotline?></a></li>
							</ul>
							<ul>
								<li><a href="mailto:<?=$setting->company_email?>" class="transition"><i class="fa fa-envelope transition"></i><?=$setting->company_email?></a></li>
							</ul>
							<ul>
								<li><a target="_blank" href="https://www.google.com/maps/place/S4+Ba+V%C3%AC,+Ph%C6%B0%E1%BB%9Dng+15,+Qu%E1%BA%ADn+10,+Th%C3%A0nh+ph%E1%BB%91+H%E1%BB%93+Ch%C3%AD+Minh,+Vietnam/@10.7798593,106.6618899,18z/data=!4m5!3m4!1s0x31752ec563d43459:0x18923029e1754f84!8m2!3d10.780136!4d106.662646" class="transition"><i class="fa fa-map-marker transition"></i><?=$setting->company_address?></a></li>
							</ul>
						</div>
						<div id="mapcanvas" style="height: 255px; width: 100%; margin-top:45px;border-radius: 10px;" ></div>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="box-contact-form">
					<form id="frm-contact" action="<?=site_url("lien-he/ajax-contact")?>" method="POST" accept-charset="utf-8">
						<h2 class="title">THÔNG TIN KHÁCH HÀNG</h2>
						<div class="frm-contact">
							<div class="row">
								<div class="col-md-12">
									<label for="input-id">Tên Khách Hàng:</label><span class="text-color-red"> *</span>
									<input type="text" id="name" name="name" class="contact-input" value="">
								</div>
							</div>
						</div>
						<div class="frm-contact">
							<div class="row">
								<div class="col-md-12"><label for="input-id">Điện Thoại:</label><span class="text-color-red"> *</span><input type="tel" id="phone" name="phone" class="contact-input" value=""></div>
							</div>
						</div>
						<div class="frm-contact">
							<div class="row">
								<div class="col-md-12"><label for="input-id">Email:</label><span class="text-color-red"> *</span><input type="email" id="email" name="email" class="contact-input" value=""></div>
							</div>
						</div>
						<div class="frm-contact">
							<label for="input-id">Tin nhắn:</label><span class="text-color-red"> *</span>
							<textarea class="contact-textarea" id="content" name="content" rows="5"></textarea>
							<br><br>
							<div class="g-recaptcha" data-theme="light" data-sitekey="<?=RECAPTCHA_KEY?>"></div>
						</div>
						<div class="text-right"><button type="submit" id="btn-send" class="btn-send-contact transition" style="margin-bottom: 10px">GỬI</button></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?&key=AIzaSyDigCaYfSLVz0PhLL4P7s7D6kU5Kd63AEY&sensor=true"></script>
<script type="text/javascript">
$(document).ready(function() {
	var options = {
			scrollwheel: false,
			zoom:14,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		// var contentString = '<div id="contents">'+
		// 	'<div id="siteNotice">'+
		// 	'</div>'+
		// 	'<h1 id="firstHeading" class="firstHeading" style="color:#C52515"><?=$setting->company_name?></h1>'+
		// 	'<div id="bodyContent">'+
		// 	'<p style="color:#333"><b><?=BASE_URL?></b> là một website <b>Chuyên cung cấp hàng nhập khẩu chính hãng USA, EU, AU</b><br>' +
		// 	'<b>Điện thoai: </b> <?=$setting->company_hotline?><br>'+
		// 	'<b>Email: </b> <?=$setting->company_email?><br><br>'+
		// 	'<b>Địa chỉ: </b> <?=$setting->company_address?></p>'+
		// 	'</div>'+
		// 	'</div>';
		// var infowindow = new google.maps.InfoWindow({
		// 	content: contentString
		// });
		var map = new google.maps.Map(document.getElementById("mapcanvas"), options);
		geoclient = new google.maps.Geocoder();
		geoclient.geocode({'address': '<?=$setting->company_address?>'}, function(results, status){
			if(status == google.maps.GeocoderStatus.OK){
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location,
					title : '<?=$setting->company_name?>'
				});
			infowindow.open(map, marker);
			}
		});
});
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#btn-send").click(function(event) {
			event.preventDefault();
			var err = 0;
			var msg = [];

			clearFormError();

			if ($('#name').val() == "") {
				$('#name').addClass("error");
				err++;
				msg.push("Họ và Tên không được trống");
			} else {
				$('#name').removeClass("error");
			}

			if ($('#phone').val() == "") {
				$('#phone').addClass("error");
				err++;
				msg.push("Số điện thoại không được trống");
			} else {
				$('#phone').removeClass("error");
			}

			if ($('#email').val() == "") {
				$('#email').addClass("error");
				err++;
				msg.push("Email không được trống");
			}
			else {
				$('#email').removeClass("error");
			}

			if ($('#content').val() == "") {
				$('#content').addClass('error');
				err++;
				msg.push('Nội dung không được trống');
			}
			else {
				$('#content').removeClass('error');
			}
			if ($('#g-recaptcha-response').val() == "") {
				err++;
				msg.push('Xác nhận tôi không phải là robot');
			}

			if (!err) {
				$('#frm-contact').submit();
			} else {
				showErrorMessage(msg);
			}
		});
	});
</script>