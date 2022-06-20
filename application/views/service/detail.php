<?
	$class_arr = [
		"First Timers Bodybuilding",
		"Novice Bodybuilding",
		"Juniors Bodybuilding",
		"Classic Bodybuilding",
		"DisABILITY",
		"Juniors Bikini Toned ",
		"Ladies Bikini Short Under 164cm",
		"Ladies Bikini Tall Over 164.1cm",
		"Ladies Trained Bikini",
		"Ladies Master (Over 35)",
		"Juniors Men's Physique",
		"Men's Physique Short Under 178cm",
		"Men's Physique Tall Over 178.1cm",
		"Masters Men's Physique (Over 35)",
		"Ladies Toned Figure",
		"Ladies AthleticFigure",
		"Ladies Trained Figure",
		"Masters Bodybuilding Over 40",
		"Masters Bodybuilding  Over 50",
		"Mr Bodybuilding Class Short (UNDER 5FT 6)",
		"Mr Bodybuilding Class Medium (OVER 5FT 6 ",
		"Mr Bodybuilding Class Tall (OVER 5FT 10)",
		"Ladies Wellness",
	];
	$type_arr = [
		'Extremely Pale',
		'Fair/Medium',
		'Dark',
		'Extremely Dark Skinned',
	];
	$payment_arr = [
		'Deposit / Rest of cash to be paid on tanning day **Non Refundable',
		'Full Payment Booking - Fully Refundable',
		'Top Coat and Glaze Application Only (full payment)',
	];
	$contact_arr = [
		'Email',
		'Text',
		'Call',
	];
?>
<div class="cluster">
	<div class="container">
		<div class="banner-service-detail-text">
			<h1 class="text font-wf"><?=$item->title?></h1>
			<div class="backstage-service font-wf">BACKSTAGE SERVICE</div>
			<div class="date font-wf"><?=$this->util->to_vn_date($item->start_date)?></div>
		</div>
	</div>
	<div class="container container-content">
		<div class="box-serive-detail-info">
			<div class="row">
				<div class="col-md-6">
					<img src="<?=$item->thumbnail?>"  class="full-width"alt="">
					<br><br>
					<div class="box-frm-booking">
						<form action="">
							<div class="text-center">
								<h5>PCA Scotland ProTan Bookings</h5>
								<p>Pro Tan Professional Tanning Service</p>
							</div>
							<input type="text" class="booking-input" name="fullname" id="fullname" placeholder="*Full Name">
							<input type="text" class="booking-input" name="email" id="email" placeholder="*Email Address">
							<input type="text" class="booking-input" name="phone" id="phone" placeholder="*Contact phone">
							<hr color="gray">
							<div class="radio-frm">
								<h6><span class="text-color-red">*</span>What class have you registered for?</h6>
								<? foreach ($class_arr as $value) { ?>
								<input type="radio" name="class" value="<?=$value?>">
								<label for="<?=$value?>"><?=$value?></label><br>
								<? } ?>
							</div>
							<div class="radio-frm">
								<h6><span class="text-color-red">*</span>What Skin Type are you?</h6>
								<? foreach ($type_arr as $value) { ?>
								<input type="radio" name="class" value="<?=$value?>">
								<label for="<?=$value?>"><?=$value?></label><br>
								<? } ?>
								<input type="text" class="booking-input" name="type-option" id="type-option" placeholder="*Do you suffer from sensitive skin? yes/no">
							</div>
							<div class="radio-frm">
								<h6><span class="text-color-red">*</span>Booking Payment Options -</h6>
								<? foreach ($payment_arr as $value) { ?>
								<input type="radio" name="class" value="<?=$value?>">
								<label for="<?=$value?>"><?=$value?></label><br>
								<? } ?>
							</div>
							<div class="radio-frm">
								<h6>When completing this form we will need to contact you with show updates, please let us know all the ways you would like to hear from us:</h6>
								<? foreach ($contact_arr as $value) { ?>
								<input type="radio" name="class" value="<?=$value?>">
								<label for="<?=$value?>"><?=$value?></label><br>
								<? } ?>
							</div>
							<div class="radio-frm">
								<h6>We take your privacy very seriously and will only use your personal information to provide the products and services you requested.</h6>
							</div>
							<a class="btn-submit-frm">Submit £70</a>
						</form>
					</div>
				</div>
				<div class="col-md-6">
					<a href="" class="element-link element-link-gray">Tickets</a>
					<a href="" class="element-link element-link-pink">Makeup & Hair Bookings</a>
					<a href="" class="element-link element-link-gray">Order Photo Package</a>
					<div class="content">
						<div style="color:#fff">
							<?=$item->content?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>