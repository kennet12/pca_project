<div class="container container-content">
	<div class="book-cart-shop">
		<form id="frm-checkout" action="<?=site_url("dat-hang/thanh-toan")?>" method="POST" role="form">
			<div class="row">
				<div class="col-md-7">
					<h2 class="title">Sản phẩm của bạn</h2>
					<div class="list">
					<? $i=0; 
						$c=count($items); 
						$totalprice = 0;
						foreach ($items as $item) { 
							$photo = explode('/',$item['thumbnail']);
							$totalprice += $item['qty']*$item['price_sale'];
							$product = $this->m_product->load($item['product_id']);
						?>
						<div class="item display-table">
							<div class="display-table-cell image text-center">
								<img src="<?=BASE_URL."/files/upload/product/{$product->code}/thumb/".end($photo);?>" class="img-responsive" alt="Image">
							</div>
							<div class="display-table-cell info">
								<a><div class="name transition"><?=$item['name']?></div></a>
								<div class="sub-detail"><?=$item['typename']?> <?=!empty($item['subtypename'])?" - ".$item['subtypename']:""?></div>
								<div class="price-detail">
									<?=number_format($item['price'],0,',','.')?><sup> 
										<? if(!empty($item["sale"])) { ?>
										<span class="text-color-red">-<?=$item["sale"]?>%</span>
										<? } ?>
									</sup>
									<? if($this->util->detect_mobile()) {  ?>
									<span class="m-qty"> x<?=$item['qty']?></span> 
									= 
									<span class="m-total"> 
										<?=number_format($item['qty']*$item['price_sale'],0,',','.')?>
										<? if(!empty($item["sale"])) { ?>
										<sup class="text-color-red">( -<?=number_format($item['qty']*($item["sale"]*$item['price']*0.01),0,',','.')?>)</sup>
										<? } ?>
									</span>
									<? } ?>
								</div>
							</div>
							<? if(!$this->util->detect_mobile()) {  ?>
							<div class="display-table-cell qty text-center">
								x<?=$item['qty']?>
							</div>
							<div class="display-table-cell fee text-center">
								<? if(!empty($item["sale"])) { ?>
								<div class="note-sale note-sale-<?=$i?>">( -<?=number_format($item['qty']*($item["sale"]*$item['price']*0.01),0,',','.')?><sup></sup> )</div>
								<? } ?>
								<div class="price price-<?=$i?>" ><?=number_format($item['qty']*$item['price_sale'],0,',','.')?><sup></sup></div>
							</div>
							<? } ?>
						</div>
					<? $i++;} ?>
					</div>
					<div class="wrap-total-price clearfix">
						<div class="float-left">
							<strong class="text-color-green" style="font-size: 25px;color: #795548;">Tổng tiền</strong>
						</div>
						<div class="float-right">
							<div class="price total" style="font-size: 25px;color: #f44336;"><?=number_format($totalprice,0,',','.')?> <sup></sup></div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="info-box">
						<h2 class="title-info">Thông Tin Khách Hàng</h2>
						<div class="item">
							<label class="">Họ và Tên:</label><span class="text-color-red"> *</span>
							<input type="text" id="fullname" name="fullname" class="contact-input" value="<?=empty($booking->fullname) ? '' : $booking->fullname?>">
						</div>
						<div class="item">
							<label class="">Email:</label><span class="text-color-red"> *</span>
							<input type="text" id="email" name="email" class="contact-input" value="<?=empty($booking->email) ? '' : $booking->email?>">
						</div>
						<div class="item">
							<label class="">Phone:</label><span class="text-color-red"> *</span>
							<input type="text" id="phone" name="phone" class="contact-input" value="<?=empty($booking->phone) ? '' : $booking->phone?>">
						</div>
						<div class="item">
							<label class="">Địa chỉ</label><span class="text-color-red"> *</span>
							<textarea name="address" id="address" rows="2"><?=empty($booking->address) ? '' : $booking->address?></textarea>
						</div>
						<div class="item">
							<label class="">Tin Nhắn</label>
							<textarea name="message" id="message" rows="5"></textarea>
							<h5 class="title-payment">Hình thức thanh toán</h5>
							<div class="payment">
								<div class="payment-item">
									<div class="radio">
										<label class="full-width text-center">
											<img src="<?=IMG_URL.'banking.png'?>" alt="">
											<input type="radio" name="payment" value="Banking" checked="checked">Chuyển khoản
										</label>
									</div>
								</div>
								<div class="payment-item">
									<div class="radio">
										<label class="full-width text-center">
											<img src="<?=IMG_URL.'thanh-toan-khi-nhan-hang.png'?>" alt="">
											<input type="radio" name="payment" value="Cash">Thành toán khi nhận hàng
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="item text-center">
							<a href="#" class="btn btn-checkout transition">THANH TOÁN</a>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>