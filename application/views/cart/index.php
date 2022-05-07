<div class="container">
	<div class="book-cart-shop">
		<form id="frm-checkout" action="<?=site_url("dat-hang/thanh-toan")?>" method="POST" role="form">
			<div class="row">
				<div class="col-md-5">
					<h5 class="title">Giỏ Hàng Của Bạn</h5>
					<div class="list">
					<? $i=0; 
						$c=count($items); 
						$totalprice = 0;
						$totalqty = 0;
						foreach ($items as $item) { 
							$price = $item['qty']*$item['price_sale']; 
							$totalprice += $price;
							$totalqty 	+= $item['qty'];

							$product = $this->m_product->load($item['product_id']);
							$info = new stdClass();
							$info->product_id = $item['product_id'];
							$product->product_type = $this->m_product_type->items($info);
							$key_i = ($item['key_i']!='-1') ? $item['key_i'] : '0';
							$key_j = ($item['key_j']!='-1') ? $item['key_j'] : '0';
							$photo = explode('/',$item['thumbnail']);
							$type_quantity = json_decode($product->product_type[$key_i]->quantity)[$key_j];

						?>
						<div class="item display-table">
							<div class="display-table-cell text-center image">
								<i class="fas fa-times transition" data-toggle="modal" data-target="#delete-cart" rowid_item="<?=$item['rowid']?>" id_item="<?=$item['id']?>"></i>
								<img src="<?=BASE_URL."/files/upload/product/{$product->code}/thumbnail/".end($photo);?>" class="img-responsive" alt="<?=$item['name']?>">
							</div>
							<div class="display-table-cell info">
								<a href="<?=site_url($product->alias)?>"><div class="name transition"><?=$item['name']?></div></a>
								<div class="sub-detail"><?=$item['typename']?> <?=!empty($item['subtypename'])?" - ".$item['subtypename']:""?></div>
								<div class="clearfix"></div>
								<div class="price-detail"><?=number_format($this->util->round_number($item['price'],1000),0,',','.')?><sup>₫ 
									<? if(!empty($item["sale"])) { ?>
									<span class="text-color-red">-<?=$item["sale"]?>%</span>
									<? } ?>
									</sup> x 
									<select name="" class="qty quantity quantity-<?=$i?> quantity-<?=$item['id']?>" cost="<?=$item['price']?>" price="<?=$item['price_sale']?>" id_item="<?=$item['id']?>" sale="<?=!empty($item['sale'])?$item['sale']:0?>" stt="<?=$i?>">
										<? for ($j=1; $j <= $type_quantity; $j++) { ?>
										<option value="<?=$j?>"><?=$j?></option>
										<? } ?>
									</select>
									<script type="text/javascript">
										$('.quantity-<?=$item['id']?>').val("<?=$item['qty']?>");
									</script>
								</div>
								<div class="fee">
									<? if(!empty($item["sale"])) { ?>
									<div class="note-sale note-sale-<?=$i?>">( -<?=number_format($item['qty']*($item["sale"]*$item['price']*0.01),0,',','.')?><sup>₫</sup> )</div>
									<? } ?>
									<div class="price price-<?=$i?>" ><?=number_format($this->util->round_number($price,1000),0,',','.')?><sup>₫</sup></div>
								</div>	
							</div>
						</div>
					<? $i++;} ?>
						<div class="review-box">
							<div class="clearfix" style="border-top:1px solid #e1e1e1;padding-top: 20px;">
								<div class="float-left">
									<span class="total-qty"><?=$totalqty?></span> sản phẩm
								</div>
								<div class="float-right">
									<div class="price total"><?=number_format($this->util->round_number($totalprice,1000),0,',','.')?><sup>₫</sup></div>
								</div>
							</div>
							<!-- <div class="clearfix" style="padding-bottom: 20px;">
								<div class="float-left">
									Phí vận chuyển
								</div>
								<div class="float-right">
									<div class="price">20.000<sup>đ</sup></div>
								</div>
							</div> -->
							<div class="clearfix" style="border-top:1px solid #e1e1e1;padding-top: 20px;padding: 15px 0;">
								<div class="float-left">
									Mã khuyến mãi
								</div>
								<div class="float-right promotion">
									<? if (!empty($this->session->userdata('user'))) { ?>
									<div class="input-group mb-3">
										<input type="text" id="promotion" name="promotion" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-outline-secondary btn-add-promotion" type="button">Nhập</button>
										</div>
										<div class="error-promotion">Vui lòng nhập mã</div>
									</div>
									<div class="total-price-sale"></div>
									<script>
										$('.btn-add-promotion').click(function(e){
											if ($("#promotion").val() == "") {
												$('.error-promotion').show();
											} else {
												$.ajax({
													url: '<?=site_url('gio-hang/promotion')?>',
													type: 'POST',
													dataType: 'json',
													data: {promotion:$("#promotion").val()},
													success: function(res) {
														if (res[1]){
															var total_price = 0;
															var total_sale_price = 0;
															var total_sale_product_price = 0;
															var sale_value = parseFloat(res[1].sale_value);
															for (var i = 0; i < <?=$c?>; i++) {
																var price_cost = parseFloat($('.quantity-'+i).attr('cost'))*parseInt($('.quantity-'+i+' option:selected').val());
																var sale_product = parseFloat($('.quantity-'+i).attr('sale'));
																
																total_price += price_cost;
																if (sale_product != 0){
																	total_sale_product_price += price_cost*sale_product*0.01;
																}
																if (sale_product>sale_value){
																	sale_value = sale_product;
																}
																if (res[1].sale_type=="0"){
																	total_sale_price += price_cost*sale_value*0.01;
																} else {
																	total_sale_price = sale_value
																}
															}
															if (res[1].sale_type=="0"){
																if (total_sale_price > res[1].money_limit){
																	total_sale_price = parseFloat(res[1].money_limit);
																}
																if (total_sale_product_price > res[1].money_limit){
																	total_sale_price = total_sale_product_price;
																}
															} else {
																if (total_sale_product_price > sale_value){
																	total_sale_price = total_sale_product_price;
																}
															}
															total_price -= total_sale_price;
															$('.total').html(formatDollar(total_price+total_sale_price)+'<sup>đ</sup>');
															$('.total-price-sale').html('-'+formatDollar(total_sale_price)+'<sup>đ</sup>');
															$('.total-price-sale').show();
															$('.total-price').html(formatDollar(total_price)+'<sup>đ</sup>');
															$('.error-promotion').hide();
														} else {
															if (res[0] == 0){
																$('.error-promotion').html('Mã không hợp lệ');
															} else if (res[0] == -1){
																$('.error-promotion').html('Mã áp dụng cho đơn '+formatDollar(parseFloat(res[2]))+'đ');
															}
															$('.error-promotion').show();
														}
													}
												});
											}
										})
									</script>
									<? } else { ?>
										<a style="font-size:14px;" href="<?=site_url("tai-khoan/dang-nhap")?>">Đăng nhập dùng mã khuyến mãi</a>
									<? } ?>
								</div>
								<div style="display: inline-block;color: red;font-size: 12px;margin-top: 10px;font-style: italic;">(Lưu ý *: Không áp dụng cùng lúc 2 chương trình khuyến mãi. Ưu tiên mã có giá trị lớn hơn.)</div>
							</div>
							<div class="clearfix" style="border-top:1px solid #e1e1e1;padding-top: 20px;border-bottom: 1px solid #e1e1e1; padding: 15px 0;">
								<div class="float-left">
									Tổng tiền (VND)
								</div>
								<div class="float-right">
									<div class="total-price total"><?=number_format($this->util->round_number($totalprice,1000),0,',','.')?><sup>₫</sup></div>
									<div style="display: inline-block;color: green;font-size: 12px;margin-top: 10px;font-style: italic;">Chưa bao gồm phí vận chuyển</div>
								</div>
							</div>
							<p class="time-ship">Thời gian giao hàng: <strong>Trong vòng 8-10 giờ (từ khi xuất hàng)</strong></p>
						</div>
					</div>
				</div>
				<? $user = $this->session->userdata("user"); ?>
				<div class="col-md-7">
					<div class="info-box">
						<div class="item">
							<div class="row">
								<div class="col-md-6">
									<label class="text-color-gray">Họ và Tên</label><span class="text-color-red"> *</span>
									<input type="text" id="fullname" name="fullname" class="contact-input" value="<?=empty($user->fullname) ? '' : $user->fullname?>">
								</div>
								<div class="col-md-6">
									<label class="text-color-gray">Email</label><span class="text-color-red"> *</span>
									<input type="text" id="email" name="email" class="contact-input" value="<?=empty($user->email) ? '' : $user->email?>">
								</div>
							</div>
						</div>
						<div class="item">
							<div class="row">
								<div class="col-md-6">
									<label class="text-color-gray">Điện thoại người nhận</label><span class="text-color-red"> *</span>
									<input type="text" id="phone" name="phone" class="contact-input" value="<?=empty($user->phone) ? '' : $user->phone?>">
								</div>
								<div class="col-md-6">
									<label class="text-color-gray">Điện thoại 2</label>
									<input type="text" id="phone_temp" name="phone_temp" class="contact-input" value="">
								</div>
							</div>
						</div>
						<div class="item">
							<label class="text-color-gray">Địa chỉ</label><span class="text-color-red"> *</span>
							<input type="text" id="address" name="address" class="contact-input" value="<?=empty($user->address) ? '' : $user->address?>">
						</div>
						<div class="item">
							<div class="row">
								<div class="col-md-6">
									<label class="text-color-gray">Ghi chú giao hàng</label>
									<select class="form-control" name="note" id="note">
										<option value="Giao giờ hành chính">Giao giờ hành chính</option>
										<option value="Đặt hàng hộ người thân">Đặt hàng hộ người thân</option>
										<option value="">Ghi chú thêm</option>
									</select>
								</div>
							</div>
							<br>
							<textarea style="display:none" name="message" id="message" rows="5"></textarea>
							<script>
								$('#note').change(function () {
									let val = $(this).val();
									if (val == ''){
										$('#message').css('display','block');
									} else {
										$('#message').css('display','none');
										$('#message').val('');
									}
								})
							</script>
							<h5 class="title-payment">Hình thức thanh toán</h5>
							<div class="payment">
								<div class="payment-item">
									<div class="radio">
										<label class="full-width text-center">
											<img src="<?=IMG_URL.'banking.png'?>" alt="">
											<input type="radio" name="payment" class="payment-method" value="Banking" checked="checked">Chuyển khoản
										</label>
									</div>
								</div>
								<div class="payment-item">
									<div class="radio">
										<label class="full-width text-center">
											<img src="<?=IMG_URL.'thanh-toan-khi-nhan-hang.png'?>" alt="">
											<input type="radio" name="payment" class="payment-method" value="Cash">Thanh toán khi nhận hàng
										</label>
									</div>
								</div>
							</div>
							<br><br>
							<div class="g-recaptcha" data-theme="light" data-sitekey="<?=RECAPTCHA_KEY?>"></div>
						</div>
					</div>
					<div class="item text-center">
						<a href="#" class="btn btn-red btn-checkout transition">THANH TOÁN</a>
					</div>
					<br>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="wrap-loading-emptyCart" <?=!empty($items)?'style="display:none"':''?>>
	<div class="box-loading-emptyCart">
		<h2>Bạn chưa thêm sản phẩm.</h2>
		<img src="<?=IMG_URL.'empty-cart.gif'?>" alt="">
		<p style="font-size: 18px;">Nhấp <a href="<?=site_url('san-pham');?>">vào đây</a> để thêm sản phẩm.</p>
	</div>
</div>
<div class="wrap-loading-checkout" style="display:none">
	<div class="box-loading-checkout">
		<h2>Hệ thống đang xử lý ...</h2>
		<img src="<?=IMG_URL.'shipper.gif'?>" alt="">
	</div>
</div>
<div class="wrap-delete-cart" style="display:none">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="box-delete">
				<div class="box-title">
					Xóa sản phẩm
				</div>
				<div class="box-content">
					Bạn có chắc là muốn xóa sản phẩm này không?
				</div>
				<div class="confirm-box">
					<button type="button" class="btn btn-danger btn-sure-delete" rowid_item="">OK</button>
					<button type="button" class="btn btn-secondary btn-cancel" data-dismiss="modal">Đóng</button>
				</div>
			</div>				
		</div>
		<div class="col-md-4"></div>
	</div>
</div>
<!-- <div class="modal fade" id="delete-cart" tabindex="-1" role="dialog" aria-labelledby="delete-cartLabel" aria-hidden="true"><div class="modal-dialog modal-warning" id="dialog" role="document"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="delete-cartLabel">Xóa sản phẩm</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Bạn chắc chắn muốn xóa sản phẩm này?</div><div class="modal-footer"></div></div></div></div> -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.btn-checkout').click(function() {
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
			if (validatePhone("phone") == false) {
				$("#phone").addClass("error");
				err++;
				msg.push("Số điện thoại không hợp lệ");
			}
			else {
				$("#phone").removeClass("error");
			}
		}
		if ($("#address").val() == "") {
			$("#address").addClass("error");
			err++;
			msg.push("Địa chỉ không được trống.");
		} else {
			$("#address").removeClass("error");
		}
		if ($('#g-recaptcha-response').val() == "") {
			err++;
			msg.push('Xác nhận tôi không phải là robot');
		}

		if (!err) {
			$('.wrap-loading-checkout').css('display','block');
			$("#frm-checkout").submit();
		} else {
			showErrorMessage(msg);
		}
	});
});
</script>
<script type="text/javascript">
$(document).ready(function() {
	$('.book-cart-shop .quantity').change(function(event) {
		let id 					= $(this).attr('id_item');
		let qty 				= parseInt($(this).val());
		let stt 				= $(this).attr('stt');
		let price 				= parseFloat($(this).attr('price'));
		let sale 				= parseFloat($(this).attr('sale'));
		let cost 				= parseFloat($(this).attr('cost'));
		let total 				= 0;
		let total_qty 			= 0;
		$('.price-'+stt).html(formatDollar(qty*price));
		for (var i = 0; i < <?=$c?>; i++) {
			total_qty += parseInt($('.quantity-'+i).val());
			total += parseFloat($('.price-'+i).html().replaceAll('.',''));
		}
		$('.total-qty').html(total_qty);
		$('.total').html(formatDollar(total));
		$('.note-sale-'+stt).html('( -'+formatDollar(qty*(sale*cost*0.01))+'<sup>₫</sup> )');
		$('#promotion').val('');
		$('.total-price-sale').hide();
		$('.error-promotion').html('Vui lòng nhập mã lại');
		$('.error-promotion').show();
		let p = {};
			p["id"] = id;
			p["qty"] = qty;
		$.ajax({
			url: BASE_URL+'/gio-hang/ajax-update-cart.html',
			type: 'POST',
			dataType: 'json',
			data: p
		});
	});
	$('.fa-times').click(function(event) {
		$('.wrap-delete-cart').css('display','block');
		$('.btn-sure-delete').attr('rowid_item',$(this).attr('rowid_item'));
		$('.btn-sure-delete').attr('id_item',$(this).attr('id_item'));
	});
	$('.btn-cancel').click(function(event) {
		$('.wrap-delete-cart').css('display','none');
	});
	$('.btn-sure-delete').click(function(event) {
		let p = {};
			p["rowid"] = $(this).attr('rowid_item');
			p["id"] = $(this).attr('id_item');
		$.ajax({
			url: BASE_URL+'/gio-hang/ajax-delete-cart.html',
			type: 'POST',
			dataType: 'json',
			data: p,
			success: function(r) {
				if (r) {
					location.reload();
				}
			}
		});
	});
});
</script>