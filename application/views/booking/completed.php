<div class="container">
	<div class="completed-page">
		<h2 class="title">Thank You! <i class="far fa-check-circle"></i></h2>
		<h6 class="dear-customer">Xin cảm ơn, <strong><?=$client_name?> </strong></h6>
		<p>Đơn hàng của bạn đã được tạo thành công.</p>
		<div class="row">
			<div class="col-md-6">
				<div style="color: #555;font-size: 15px;font-family: Arial,Tahoma,sans-serif; font-size: 13px;">
					<div>
						<div style="padding: 15px;border: 1px solid #ebebeb;">
							<div style="display:table;width:100%; font-size:14px;">
								<div style="display:table-cell;width:35%">
									<div style="color: #fc5722;margin-bottom: 7px;font-size:12px;">Người nhận</div>
									<strong style="font-size:15px;"><?=$client_name?></strong>
									<p style="margin-bottom:0"><?=$booking->address?></p>
								</div>
								<div style="display:table-cell;width:25%;padding-left: 5%;">
									<div style="color: #999;margin-bottom: 7px;font-size:12px;">Mã đơn hàng</div>
									<p style="margin-bottom:0">
										<?=$transaction_id?>
									</p>
									<br>
									<div style="color: #999;margin-bottom: 7px;font-size:12px;">Ngày đặt hàng</div>
									<p style="margin-bottom:0">
										<?=date('d/m/Y',strtotime($booking->created_date))?>
									</p>
								</div>
								<div style="display:table-cell;width:40%;text-align:right;">
									<div style="color: #999;margin-bottom: 7px;font-size:12px;">Tổng tiền</div>
									<div style="font-size: 18px;color: #2e7731;font-weight: bold;"><?=number_format($booking->total,0,',','.')?><sup>₫</sup></div>
									<div style="color: #999;margin-bottom: 7px;font-size:12px;">Hình thức thanh toán</div>
									<p style="margin-bottom:0">
										<?=$this->util->note_payment($booking->payment)?>
									</p>
								</div>
							</div>
							<table style="width: 100%;border-top: 2px solid #fc5722;margin-top: 40px;">
								<tr>
									<td style="width:10%;padding: 20px 0;color: #fc5722;font-weight: bold;">
										Hình
									</td>
									<td style="width:35%;padding: 20px 10px;color: #fc5722;font-weight: bold;">
										Tên sản phẩm
									</td>
									<td style="width:23%;padding: 20px 10px;color: #fc5722;font-weight: bold;">
										Giá
									</td>
									<td style="width:7%;padding: 20px 10px;color: #fc5722;font-weight: bold;">
										SL
									</td>
									<td style="width:25%;padding: 20px 10px;color: #fc5722;font-weight: bold;">
										Thành tiền
									</td>
								</tr>
								<? $total=0; foreach($booking_paxs as $booking_pax) { 
									$photo = explode('/',$booking_pax->thumbnail);$c = count($photo);
									
									$price_sale = $booking_pax->price_sale;
									if(!empty($booking->code_promotion)) {
										$price_sale = $booking_pax->price;
									}
									$total += $price_sale*$booking_pax->qty;
								?>
								<tr style="border-bottom: 1px solid #eee;">
									<td style="width:10%;padding: 20px 0;">
										<img style="width: 55px;height: 55px;object-fit: contain;" src="<?=BASE_URL.'/files/upload/product/'.$photo[$c-2].'/thumbnail/'.end($photo)?>" alt="">
									</td>
									<td style="width:35%;padding: 20px 10px;">
										<div style="font-size: 14px;"><a href="" target="_blank" style="text-decoration: none;color: #555;display: block;"><?=$booking_pax->title?></div></a>
										<div style="font-size: 12px;color: #8bc34a"><?=$booking_pax->typename?> <?=$booking_pax->subtypename?></div>
									</td>
									<td style="width:23%;padding: 20px 10px;vertical-align: top;">
										<div style="font-size: 14px;"><?=number_format($price_sale,0,',','.')?><sup>₫</sup></div>
									</td>
									<td style="width:7%;padding: 20px 10px;vertical-align: top;">
										<span style="margin: 8px 0;">x<?=$booking_pax->qty?></span>
									</td>
									<td style="width:25%;padding: 20px 10px;vertical-align: top;">
										<div style="font-size: 14px;"><?=number_format($price_sale*$booking_pax->qty,0,',','.')?><sup>₫</sup></div>
									</td>
								</tr>
								<? } $total = $this->util->round_number($total,1000); ?>
							</table>
							<table style="width: 100%;margin-top:30px;">
								<? if(!empty($booking->code_promotion)) { ?>
								<tr>
									<td style="width:75%;padding: 3px 10px;font-size: 14px;color: #fc5722;text-align:right;">
										Giảm giá:
									</td>
									<td style="width:25%;font-size: 14px;padding: 3px 10px;">
										<div style="font-size: 14px;">- <?=number_format($total-$booking->total,0,',','.')?><sup>₫</sup></div>
									</td>
								</tr>
								<? } ?>
								<tr>
									<td style="width:75%;padding: 3px 10px;font-size: 14px;color: #fc5722;text-align:right;">
										Tổng tiền:
									</td>
									<td style="width:25%;font-size: 14px;padding: 3px 10px;">
										<div style="font-size: 14px;"><?=number_format($booking->total,0,',','.')?><sup>₫</sup></div>
									</td>
								</tr>
							</table>
							<p class="text-color-red">*Phí giao hàng sẽ được nhân viên liên hệ với khách trước khi giao hàng.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<? if ($pay_method == 'Banking') { ?>
				<div class="bank-list">
					<div class="bank-item">
						<img src="<?=IMG_URL.'bank/vietcombank.png'?>" alt="Vietcombank">
						<p>Ngân hàng TMCP ngoại thương Việt Nam. Chi nhánh Hùng Vương</p>
						<div class="name" style="color: #014a2d;">Lê Tuyết Nhung</div>
						<div class="name" style="color: #014a2d;">0421000514377</div>
					</div>
					<br>
					<h6>Thông tin chuyển khoản: <span style="color:#fc5722">(Mã đơn hàng - Tên khách hàng - SDT đặt hàng)</span></h6>
					<div class="box-banking">
						<div class="copy">Sao chép</div>
						<input type="text" id="content-copy" value="<?=$transaction_id?> - <?=$client_name?> - <?=$phone?>">
					</div>
					<br>
					<p class="text-color-red"><i>(Chúng tôi sẽ kiểm tra tài khoản và giao hàng đúng hẹn cho bạn. Xin chân thành cảm ơn).</i></p>
				</div>
				<? } ?>
				<p>Quý khách có thể tiếp tục mua sản phẩm khác <a class="link" href="<?=site_url("san-pham")?>">tại đây</a>, Chúc quý khách có một ngày mua sắp vui vẻ.</p>
			</div>
		</div>
	</div>
</div>
<script>
	$('.copy').click(function (e){
		var copyText = document.getElementById("content-copy"); console.log(copyText);
		copyText.select();
		copyText.setSelectionRange(0, 99999)
		document.execCommand("copy");
	})
</script>
<script>
window.dataLayer = window.dataLayer || [];
	dataLayer.push({
		'transactionId': '<?=$transaction_id?>',
		'transactionAffiliation': '<?=$transaction_name?>',
		'transactionTotal': <?=$transaction_fee?>, 
		'transactionTax': 0,
		'transactionShipping': 0,
		'transactionProducts': [{
			'sku': '<?=$transaction_id?>',
			'name': '<?=$transaction_name?>',
			'category': '<?=$transaction_category?>',
			'price': <?=$transaction_fee?>,
			'quantity': <?=$transaction_quantity?>
		},{
		'sku': '<?=$transaction_id?>',
		'name': '<?=$transaction_name?>',
		'category': '<?=$transaction_category?>',
		'price': <?=$transaction_fee?>,
		'quantity': <?=$transaction_quantity?>
	}]
});
</script>