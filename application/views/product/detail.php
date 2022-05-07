<? $user = $this->session->userdata('user'); ?>
<div class="container">
	<div class="product-detail">
		<div class="row">
			<div class="col-md-4">
				<div class="wrap-image-detail">
					<div class="zoom-left">
						<div class="list-image">
							<? $g=count($item->photo); 
								$photo_detail = explode('/',$item->photo[0]->file_path);
								for ($i=0;$i<$g;$i++) {
								$photo = explode('/',$item->photo[$i]->file_path);
							?>
							<div class="item item-<?=$i?> <?=($i==0)?'active':''?>">
								<img class="lazyload" alt="<?=$item->title?>" data-src="<?=$item->photo[$i]->file_path?>" src="<?=BASE_URL."/files/upload/product/{$item->code}/thumbnail/".end($photo);?>"/>
							</div>
							<? } ?>
						</div>
						<div class="zoom-img">
							<img id="zoom" clas="lazyload" alt="<?=$item->title?>" title="<?=$item->title?>" data-src="<?=$item->photo[0]->file_path?>" src="<?=$item->photo[0]->file_path?>"/>
						</div>
					</div>
				</div>
			</div>
			<script>
				let i = 0;
				setInterval(function () {
					let g = <?=$g?>;
					$('.zoom-left .item').removeClass('active');	
					$('.zoom-left .item-'+i).addClass('active');
					let data = $('.zoom-left .item-'+i).find('img').attr('data-src');
					// let src = $('.zoom-left .item-'+i).find('img').attr('src');
					$('.zoom-left #zoom').attr('data-src',data);
					$('.zoom-left #zoom').attr('src',data);
					if (i<(g-1)) i++;
					else i=0;
				},10000);
			</script>
			<div class="col-md-8">
				<div class="wrap-info-detail">
					<div class="head-detail">
						<h1 class="title"><?=$item->title?></h1>
						<!-- <span>Hãng sản xuất: <a href="#">nevermorepda</a></span> -->
						<span>Mã sản phẩm: <strong>NA<?=$item->code_product?></strong></span>
						<span>Nguồn gốc xuất xứ: <a href="#"><?=$item->origin?></a></span> 
						<span class="rating">Đánh giá: 
							<? 
							if ($item->rating_cmt != '0'){
								$point = round($item->rating_point/$item->rating_cmt,1);
							} else {
								$point = 0;
							}
							for($i=1;$i<=5;$i++) { ?>
								<? if ($i <= $point) { ?>
									<i class="fas fa-star"></i>
								<? } else { ?>
									<? if (($point > ($i-1)) && $point < $i) { ?>
										<i class="fas fa-star-half-alt"></i>
									<? } else { ?>
										<i class="far fa-star"></i>
									<? } ?>
								<? } ?>
							<? } ?>
							<span class="rat-small">- <?=!empty($item->rating_cmt)?$item->rating_cmt.' đánh giá': 'Chưa đánh giá'?> </span> 
						</span>
					</div>
					<div class="row">
						<div class="col-md-8">
							<? 
								$i=0;
								$check_i = -1;
								$check_j = -1;
								$find_price = 0;
								$price = 0;
								$sale = 0;
								$price_temp = 0;
								$quantity = 0;
								$str_type = '<div class="pattern">';
								$str_typename = '';
								$str_subtypename = '';

								if (!empty($item->typename))
									$str_typename .= '<div class="pattern-label">'.$item->typename.':</div><ul class="list clearfix">';
								if (!empty($item->subtypename))
									$str_subtypename .= '<div class="pattern-label">'.$item->subtypename.':</div>';
									
								foreach($item->product_type as $product_type) {
									$type_quantity 		= json_decode($product_type->quantity);
									$type_price 		= json_decode($product_type->price);
									$type_subtypename 	= json_decode($product_type->subtypename);
									$type_sale 			= json_decode($product_type->sale);
									$type_photo 		= json_decode($product_type->photo);
									$c = count($type_quantity);
									//
									$str_subtypename_child = '';
									for ($j=0;$j<$c;$j++) {
										if ($type_quantity[$j]!=0&&$find_price==0) {
											$check_i 	= $i;
											$check_j 	= $j;
											$price 		= $type_price[$j];
											$sale 		= $type_sale[$j];
											$quantity 	= $type_quantity[$j];
											$photo 		= !empty($type_photo[$j])?$type_photo[$j]:'';
											$find_price = 1;
										}
										//
										if (!empty($item->subtypename)) {
											if ($type_quantity[$j] != 0)
											$str_subtypename_child .= 	'<li class="item get-item" data-src="'.$photo.'" qty="'.$type_quantity[$j].'">';
											else
											$str_subtypename_child .= 	'<li class="item disabled">';
												$str_subtypename_child .= 	'<label class="radio-container">';
													$str_subtypename_child .= 	'<div class="pattern-info">';
														$str_subtypename_child .= 	'<div class="type">'.$type_subtypename[$j].'</div>';
														$str_subtypename_child .= 	'<div class="sub-price" price="'.$type_price[$j].'">'.number_format($type_price[$j],0,',','.').'<sup>₫</sup></div>';
													$str_subtypename_child .= 	'</div>';
													$checked_subtype = ($check_i==$i&&$check_j==$j)?'checked="checked"':'';
													if ($type_quantity[$j] != 0)
													$str_subtypename_child .= 	'<input type="radio" '.$checked_subtype.' name="subtypename" sale="'.$type_sale[$j].'" value="'.$type_subtypename[$j].'">';
													$str_subtypename_child .= 	'<span class="checkmark"></span>';
												$str_subtypename_child .= 	'</label>';
											$str_subtypename_child .= 	'</li>';
										}
									}
									if (!empty($item->subtypename)) {
										$display = ($check_i==$i)?'style="display:block"':'style="display:none"';
										$str_subtypename .= '<ul '.$display.' class="list clearfix p-subtypename subtypename-'.$i.'">';
										$str_subtypename .= $str_subtypename_child;
										$str_subtypename .= '</ul>';
									}
									//
									if (!empty($item->typename)) {
										if ($quantity != 0){
											$photo 		= !empty($type_photo[0])?$type_photo[0]:'';
											if (empty($item->subtypename))
												$str_typename .= '<li class="item get-item" data-src="'.$photo.'"  qty="'.$type_quantity[0].'">';
											else
												$str_typename .= '<li class="item get-item" data-src=""  qty="'.$type_quantity[0].'">';
										}
										else 
										$str_typename .= 	'<li class="item disabled">';
											$str_typename .= 	'<label class="radio-container">';
												$str_typename .= 	'<div class="pattern-info">';
													$str_typename .= 	'<div class="type">'.$product_type->typename.'</div>';
													$checksale = "";
													if ($product_type->subtypename=='""') {
														$str_typename .= 	'<div class="sub-price" price="'.$type_price[0].'">'.number_format($type_price[0],0,',','.').'<sup>₫</sup></div>';
														$checksale = 'sale="'.$type_sale[0].'"';
													}
												$str_typename .= 	'</div>';
												$checked = ($check_i==$i)?'checked="checked"':'';
													if ($quantity != 0)
												$str_typename .= 	'<input stt="'.$i.'" class="p-typename" type="radio" '.$checked.' '.$checksale.'  name="typename" value="'.$product_type->typename.'">';
												$str_typename .= 	'<span class="checkmark"></span>';
											$str_typename .= 	'</label>';
										$str_typename .= 	'</li>';
									}
									//
								$i++;}
								if ($price==0) {
									$price = $type_price[0];
									$sale = $type_sale[0];
								} 
								if (!empty($item->typename)) $str_typename .= '</ul>';
								$str_type .= $str_typename.$str_subtypename.'</div>';
							?>
							<table class="info">
								<tr>
									<td class="label">
										Tình trạng:
									</td>
									<td>
										<?=!empty($quantity)?'<span style="color:green">Còn '.$quantity.' sản phẩm</span>':'<span style="color:red">Hết hàng</span>'?>
									</td>
								</tr>
								<tr>
									<td class="label">
										Yêu thích:
									</td>
									<td>
										<?
										$status = 0;
											$cls = 'far';
											if(!empty($user)) {
												if (strpos($user->like_product,'"'.$item->id.'"') !== false) {
													$status = 2;
													$cls = 'fas';
												} else 
													$status = 1;
											}
										?>
										<i class='<?=$cls?> fa-heart' status='<?=$status?>' id_item='<?=$item->id?>' title='Yêu thích'></i>
									</td>
								</tr>
								<tr>
									<td class="label">
										Giá:
									</td>
									<td>
										<span class="price"><?=number_format($this->util->round_number($price*(1-($sale*0.01)),1000),0,',','.');?><sup>₫</sup></span>
									</td>
								</tr>
								<? if (!empty($sale)) { ?>
								<tr>
									
									<td class="label">
										Tiết kiệm:
									</td>
									<td>
										<span class="save-percent">-<?=$sale?>%</span> <sup class="save-price">(<?=number_format($price*$sale*0.01,0,',','.');?><sup>₫</sup>)</sup>
									</td>									
								</tr>
								<tr>
									<td class="label">
										Giá thị trường:
									</td>
									<td>
										<span class="price-total"><?=number_format($this->util->round_number($price,1000),0,',','.');?><sup>₫</sup></span>
									</td>
								</tr>
								<? } ?>
							</table>
							<? if(!empty($quantity)) { ?>
							<?=$str_type?>
							<div class="buy-product">
								<div class="row">
									<div class="col-md-4" style="padding-bottom: 15px;">
										<span>Số lượng:</span> 
										<input type="number" min=1 max=<?=$quantity?> class="quantity" value=1> 
									</div>
									<div class="col-md-8">
									<a class="btn-cart enable-cart" title="<?=$item->alias?>"><span>Thêm Vào Giỏ</span></a>
									</div>
									<script type="text/javascript">
										addToCart('enable-cart');
									</script>
								</div>
							</div>
							<? } ?>
							<div class="refun-note">
								<p class="text-color-red">Đổi trả hàng trong vòng 05 ngày!</p>
								<p>Thời gian và phí giao hàng sẽ được ước tính khi đặt hàng.</p>
							</div>
						</div>
						<div class="col-md-4">
							<? require_once(APPPATH."views/module/supported.php"); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).on('change','.quantity',function() {
		let min = parseInt($(this).attr('min'));
		let max = parseInt($(this).attr('max'));
		let val = parseInt($(this).val());
		if (val<min)$(this).val(min);else if (val>max)$(this).val(max);
	});
	$('.get-item').click(function(){
		let price = $(this).find('.sub-price').attr('price');
		let max_qty = parseInt($(this).attr('qty'));
		let data_src = $(this).attr('data-src');
		if (data_src!=''){
			data_src = '<?=BASE_URL?>'+data_src;
			$('#zoom').attr('data-src',data_src);
			$('#zoom').attr('src',data_src);
		}
		if(price != undefined) { 
			let sale = parseFloat($(this).find('input').attr('sale'));
			price = parseFloat(price);
			$('.quantity').attr('max',max_qty);
			if (max_qty > 0)
				$('.quantity').val(1);
			else 
				$('.quantity').val(0);
			str = '<tr><td class="label">Tình trạng:</td>';
				if(max_qty!=0)
				str +='<td><span style="color:green">Còn '+max_qty+' sản phẩm</span></td>';
				else
				str +='<td><span style="color:red">Hết hàng</span></td>';
			str +='</tr>';
			str +='<tr>';
				str +='<td class="label">Giá:</td>';
				str +='<td><span class="price">'+formatDollar(price*(1-(sale*0.01)))+'<sup>₫</sup></span></td>';
			str +='</tr>';
			if (sale!=0) {
			str +='<tr class="str-sale">';
				str +='<td class="label">Tiết kiệm:</td>';
				str +='<td><span class="save-percent">-'+sale+'%</span> <sup class="save-price">('+formatDollar(price*sale*0.01)+'<sup>₫</sup>)</sup></td>									';
			str +='</tr>';
			str +='<tr class="str-cost">';
				str +='<td class="label">Giá thị trường:</td>';
				str +='<td><span class="price-total">'+formatDollar(price)+'<sup>₫</sup></span></td>';
			str +='</tr>';
			}	
			$('.product-detail .info').html(str);
		}
	});
	$('.p-typename').click(function() { 
		let st = $(this).attr('stt');
		$('.p-subtypename').css('display','none');
		$('.subtypename-'+st).css('display','block');
	});
</script>
<div class="wrap-content">
	<div class="container">
		<ul class="list">
			<li class="item active">
				<a href="#"><h5 class="title">Thông tin sản phẩm</h5></a>
			</li>
			<li class="item">
				<a href="#wrap-rating"><h5 class="title">Đánh giá</h5></a>
			</li>
		</ul>
		<div class="content">
			<?=$item->content?>
		</div>
		<div id="wrap-rating" class="wrap-rating">
			<h5 class="title">
				Đánh giá về sản phẩm
			</h5>
			<div class="content-rating">
				<div class="row">
					<div class="col-md-8">
						<div class="box-rating">
							<div class="l"><div class="point">0/5</div><div class="rating"><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></div></div>
							<div class="r"><div class="bar-rating"><span>5 <i class="fas fa-star"></i></span><div class="progress-box"><div class="progress"><div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div></div></div><span>0%</span></div><div class="bar-rating"><span>4 <i class="fas fa-star"></i></span><div class="progress-box"><div class="progress"><div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div></div></div><span>0%</span></div><div class="bar-rating"><span>3 <i class="fas fa-star"></i></span><div class="progress-box"><div class="progress"><div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div></div></div><span>0%</span></div><div class="bar-rating"><span>2 <i class="fas fa-star"></i></span><div class="progress-box"><div class="progress"><div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div></div></div><span>0%</span></div><div class="bar-rating"><span>1 <i class="fas fa-star"></i></span><div class="progress-box"><div class="progress"><div class="progress-bar bg-warning" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div></div></div><span>0%</span></div></div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="box-btn">
							<h6 class="text-center">Chia sẻ nhận xét về sản phẩm</h6>
							<a <?=!empty($user)?'class="btn btn-primary btn-frm-rating"':'href="'.site_url('tai-khoan/dang-nhap').'" class="btn btn-primary"'?> >Nhận xét và đánh giá</a>
							<? if (empty($user)) { ?>
							<p style="color: #666;font-size: 13px;font-style: italic;margin-top: 5px;">(Bạn cần đăng nhập tài khoản mới có thể đánh giá)</p>
							<? } ?>
						</div>
					</div>
				</div>
				<? if (!empty($user)) { ?>
				<div class="frm-ratting" style="display:none">
					<div class="row">
						<div class="col-md-7">
							<h5>Gửi nhận xét của bạn</h5>
							<div class="label">1. Đánh giá của bạn về sản phẩm này:</div>
							<div class="rating-cmt"></div>
							<script>
								rating({
									selected:'.rating-cmt',
									items:5,
									position:0,
									note:['Rất Tệ','Tệ','Bình Thường','Tốt','Rất Tốt'],
									noteDefault:'Đánh Giá Sản Phẩm',
								});
							</script>
							<div class="label">2. Thông tin của bạn:</div>
							<input class="form-control" id="name-rating" type="text" name="name" placeholder="Tên bạn" value="<?=!empty($user)?$user->fullname:''?>">
							<div class="row">
								<div class="col-md-6">
									<input class="form-control" id="phone-rating" type="text" name="phone" placeholder="Số điện thoại" value="<?=!empty($user)?$user->phone:''?>">
								</div>
								<div class="col-md-6">
									<input class="form-control" id="email-rating" type="text" name="email" placeholder="Email" value="<?=!empty($user)?$user->email:''?>">
								</div>
							</div>
							<div class="label">3. Viết nhận xét của bạn vào bên dưới:</div>
							<textarea class="form-control" name="message" id="mes-rating" cols="30" rows="3" placeholder="Nhận xét của bạn về sản phẩm này"></textarea>
							<!-- <div class="label">4. Chọn ảnh đánh giá (tối đa 5 hình): <label class="button" id="selectImagesButton">Chọn hình <input id="selectImages" type="file" multiple="" accept="image/*" style="display: none"></label></div> -->
							<div class="label">4. Xác thực người dùng:</div>
							<div class="g-recaptcha" data-theme="light" data-sitekey="<?=RECAPTCHA_KEY?>"></div>
							<br>
							<div class="text-center">
								<button class="btn btn-success btn-send-rating">Gửi đánh giá</button>
								<button class="btn btn-secondary btn-cancel-rating">Đóng</button>
							</div>
						</div>
						<script>
							$('.btn-cancel-rating').click(function(){
								$('.frm-ratting').toggle('fast');
							})
						</script>
						<div class="col-md-5">
							<div class="comment-product-detail">
								<div class="image">
									<img src="<?=BASE_URL."/files/upload/product/{$item->code}/thumbnail/".end($photo_detail);?>" alt="<?=$item->title?>" title="<?=$item->title?>"> 
								</div> 
								<div class="info"><div class="title-rat"><?=$item->title?></div> 
								<div class="comment-count"> Có <strong class="count_rating text-color-red">0</strong> đánh giá </div> </div> 
							</div>
							<ul class="customer-note">  
								<li>Quý khách có thắc mắc về sản phẩm hoặc dịch vụ của <a href="<?=BASE_URL?>">www.hangnhapnguyenanh.vn?</a> Quý khách đang muốn kiểm tra thời gian vận chuyển của đơn hàng đã mua?</li> 
								<li>Tham khảo thông tin thêm tại <a rel="nofollow" target="_blank" href="https://www.hangnhapnguyenanh.vn/hoi-dap/khi-nao-qui-khach-hang-nhan-duoc-hang.html">Vận chuyển &amp; giao hàng</a>.</li> 
								<li>Liên hệ hotline <a rel="nofollow" href="tel:<?=$setting->company_hotline;?>" class="contact-number"><?=$setting->company_hotline;?></a>, hoặc gửi thông tin về email <a href="mailto:<?=$setting->company_email;?>"><?=$setting->company_email;?></a> để được hỗ trợ ngay.</li> 
							</ul> 
						</div>
					</div>
					<script src="https://www.google.com/recaptcha/api.js" async defer></script>
				</div>
				<? } ?>
				<div class="wrap-comment"></div>
			</div>
		</div>
	</div>
</div>
<div class="cluster new-product">
	<div class="container">
		<div class="wrap-title clearfix">
			<h5 class="title float-left">Sản phẩm liên quan</h5>
		</div>
		<div class="wrap-box">
			<div class="box-product-6">
				<div class="na-row">
					<? foreach($related_products as $related_product) { 
						$price = $related_product->price;
						$related_photo = explode('/',$related_product->file_path);?>
					<div class="na-col-md-6">
						<div class="wrap-product">
							<div class="product">
								<? if(!empty($related_product->sale)) { ?>
								<span class="sale-percent">-<?=$related_product->sale?>%</span>
								<? } ?>
								<a title="<?=$related_product->title?>" href="<?=site_url($related_product->alias)?>">
									<div class="border-img">
										<img class="full-width hover-scale lazyload" data-src="<?=BASE_URL."/files/upload/product/{$related_product->code}/thumbnail/".end($related_photo);?>" alt="<?=$related_product->title?>">
									</div>
									<?
									$typename = !empty($related_product->typename)?' - '.$related_product->typename:'';
									$title_related_product = $related_product->title.$typename;
									?>
									<h5 class="title limit-content-2-line"><?=$title_related_product?></h5>
								</a>
								<div class="rating">
									<? if ($related_product->rating_cmt != '0'){
										$point_r = round($related_product->rating_point/$related_product->rating_cmt,1);
									} else {
										$point_r = 0;
									}
									for($i=1;$i<=5;$i++) { ?>
										<? if ($i <= $point_r) { ?>
											<i class="fas fa-star"></i>
										<? } else { ?>
											<? if (($point_r > ($i-1)) && $point_r < $i) { ?>
												<i class="fas fa-star-half-alt"></i>
											<? } else { ?>
												<i class="far fa-star"></i>
											<? } ?>
										<? } ?>
									<? } 
										$status = 0;
										$cls = 'far';
										if(!empty($user)) {
											if (strpos($user->like_product,'"'.$related_product->id.'"') != false) {
												$status = 2;
												$cls = 'fas';
											} else 
												$status = 1;
										}
									?>
									<i class='<?=$cls?> fa-heart' status='<?=$status?>' id_item='<?=$related_product->id?>' title='Yêu thích'></i>
								</div>
								<div class="price"><?=number_format($this->util->round_number($price*(1-($related_product->sale*0.01)),1000),0,',','.');?> ₫ 
								<? if(!empty($related_product->sale)) { ?>
								<span class="sale"><?=number_format($this->util->round_number($price,1000),0,',','.');?> ₫</span>
								<? } ?>
								</div>
							</div>
						</div>
					</div>
					<? } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="plugin-zoom" style="display:none">
	<div class="zoom-content">
		<div class="box">
			<span class="close-plugin-zoom">&#215;</span>
			<div class="list"></div>
			<div class="row">
				<div class="col-md-3"></div>	
				<div class="col-md-6">
				<img src="" alt="" class="item-zoom">
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	addLike('.fa-heart');
	$('.fa-heart').mouseover(function() {
		var st = $(this).attr('status');
		if (st != "2"){
			$(this).addClass('fas');
			$(this).removeClass('far');
		}
	}).mouseout(function() {
		var st = $(this).attr('status');
		if (st != "2"){
			$(this).addClass('far');
			$(this).removeClass('fas');
		}
	});
	function character_check(string) {
		var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
		if(format.test(string)){
			return true;
		} else {
			return false;
		}
	}
	$(document).ready(function(){
		$.ajax({
			url : '<?=site_url('call-service/load-rating')?>',
			type : 'POST',
			data : {'item_id':'<?=$item->id?>'},
			dataType:'json',
			success:function(r) {
				let box_rating = '';
				if (r.count_item != 0) {
					box_rating += '<div class="l">';
						box_rating += '<div class="point">'+r.avg_point+'/5</div>';
						box_rating += '<div class="rating">';
							for(let i=1;i<=5;i++) {
								if (i <= r.avg_point) {
									box_rating += '<i class="fas fa-star"></i>';
								} else {
									if ((r.avg_point > (i-1)) && r.avg_point < i) {
										box_rating += '<i class="fas fa-star-half-alt"></i>';
									} else {
										box_rating += '<i class="far fa-star"></i>';
									}
								}
							}
						box_rating += '</div>';
					box_rating += '</div>';
					box_rating += '<div class="r">';
						for(let i=5;i>=1;i--) {
						let percent = Math.round((r.arr_rat[i]*100)/r.count_item);
						box_rating += '<div class="bar-rating">';
							box_rating += '<span>'+i+' <i class="fas fa-star"></i></span>';
							box_rating += '<div class="progress-box">';
								box_rating += '<div class="progress">';
									box_rating += '<div class="progress-bar bg-warning" role="progressbar" style="width: '+percent+'%" aria-valuenow="'+percent+'" aria-valuemin="0" aria-valuemax="'+percent+'"></div>';
							box_rating += '</div>';
							box_rating += '</div>';
						box_rating += '<span>'+percent+'%</span>';
						box_rating += '</div>';
						}
					box_rating += '</div>';
				} else {
					box_rating += '<div class="l">';
						box_rating += '<div class="point">0/5</div>';
						box_rating += '<div class="rating">';
							for(let i=1;i<=5;i++) {
								box_rating += '<i class="far fa-star"></i>';
							}
						box_rating += '</div>';
					box_rating += '</div>';
					box_rating += '<div class="r">';
						for(let i=5;i>=1;i--) {
						let percent = 0;
						box_rating += '<div class="bar-rating">';
							box_rating += '<span>'+i+' <i class="fas fa-star"></i></span>';
							box_rating += '<div class="progress-box">';
								box_rating += '<div class="progress">';
									box_rating += '<div class="progress-bar bg-warning" role="progressbar" style="width: '+percent+'%" aria-valuenow="'+percent+'" aria-valuemin="0" aria-valuemax="'+percent+'"></div>';
							box_rating += '</div>';
							box_rating += '</div>';
						box_rating += '<span>'+percent+'%</span>';
						box_rating += '</div>';
						}
					box_rating += '</div>';
				}
				
				$('.box-rating').html(box_rating);
				$('.count_rating').html(r.count_item);
				//
				let str_cmt = '';
				for (let i=0;i < r.cmt.length;i++) {
				let name = r.cmt[i].name;
				str_cmt += '<div class="comment">';
					str_cmt += '<div class="row">';
						str_cmt += '<div class="col-md-2">';
							str_cmt += '<div class="box-name display-desktop">';
								str_cmt += '<div class="avatar">'+short_name(name)+'</div>';
								str_cmt += '<div class="name">'+name+'</div>';
								str_cmt += '<p class="time">'+format_date(r.cmt[i].created_date)+'</p>';
							str_cmt += '</div>';
						str_cmt += '</div>';
						str_cmt += '<div class="col-md-10">';
							str_cmt += '<div class="m-comment">';
								str_cmt += '<div class="m-avatar">';
									str_cmt += '<div class="m-avatar-item display-mobile">'+short_name(name)+'</div>';
								str_cmt += '</div>';
								str_cmt += '<div class="info">';
									str_cmt += '<div class="m-name display-mobile">'+name+'  <span class="time">'+format_date(r.cmt[i].created_date)+'</span></div>';
									str_cmt += '<div class="rating">';
										for (let j=1;j<=5;j++) {
											if (j <= parseInt(r.cmt[i].point)) 
												str_cmt += '<i class="fas fa-star"></i>';
											else
												str_cmt += '<i class="far fa-star"></i>';
										}
									str_cmt += '</div>';
								str_cmt += '</div>';
							str_cmt += '</div>';
							str_cmt += '<span class="sheild"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M8.533.133a1.75 1.75 0 00-1.066 0l-5.25 1.68A1.75 1.75 0 001 3.48V7c0 1.566.32 3.182 1.303 4.682.983 1.498 2.585 2.813 5.032 3.855a1.7 1.7 0 001.33 0c2.447-1.042 4.049-2.357 5.032-3.855C14.68 10.182 15 8.566 15 7V3.48a1.75 1.75 0 00-1.217-1.667L8.533.133zm-.61 1.429a.25.25 0 01.153 0l5.25 1.68a.25.25 0 01.174.238V7c0 1.358-.275 2.666-1.057 3.86-.784 1.194-2.121 2.34-4.366 3.297a.2.2 0 01-.154 0c-2.245-.956-3.582-2.104-4.366-3.298C2.775 9.666 2.5 8.36 2.5 7V3.48a.25.25 0 01.174-.237l5.25-1.68zM11.28 6.28a.75.75 0 00-1.06-1.06L7.25 8.19l-.97-.97a.75.75 0 10-1.06 1.06l1.5 1.5a.75.75 0 001.06 0l3.5-3.5z"></path></svg> Đã mua tại Nguyên Anh Store</span>';
							str_cmt += '<p class="mes">'+r.cmt[i].message+'</p>';
							str_cmt += '<p class="reply"><a <?=!empty($user)?'class="btn-reply btn-frm-reply"':'href="'.site_url('tai-khoan/dang-nhap').'" class="btn-reply"'?> item_id="'+r.cmt[i].id+'"><strong>Trả lời</strong></a> Nhận xét này hữu ích với bạn?</p>';
							str_cmt += '<div class="wrap-box-reply"></div>';
							//
							for(let j=0;j<r.cmt[i].reply.length;j++) {
								let name_reply = r.cmt[i].reply[j].name;
								if (r.cmt[i].reply[j].user_type == -1){
									name_reply = '<?=COMPANY?>';
								} 
								
							str_cmt += '<div class="comment child">';
								str_cmt += '<div class="row">';
									str_cmt += '<div class="col-md-2">';
										str_cmt += '<div class="box-name display-desktop">';
											str_cmt += '<div class="avatar">'+short_name(name_reply)+'</div>';
											str_cmt += '<div class="name">'+name_reply+'</div>';
											str_cmt += '<p class="time"> '+format_date(r.cmt[i].reply[j].created_date)+'</p>';
										str_cmt += '</div>';
									str_cmt += '</div>';
									str_cmt += '<div class="col-md-10">';
										str_cmt += '<div class="m-comment">';
											str_cmt += '<div class="m-avatar">';
												str_cmt += '<div class="m-avatar-item display-mobile">'+short_name(name_reply)+'</div>';
											str_cmt += '</div>';
											str_cmt += '<div class="info">';
												str_cmt += '<div class="m-name display-mobile">'+name_reply+'</div>';
												str_cmt += '<div class="time display-mobile"> '+format_date(r.cmt[i].reply[j].created_date)+'</div>';
											str_cmt += '</div>';
										str_cmt += '</div>';
										str_cmt += '<span class="sheild"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M8.533.133a1.75 1.75 0 00-1.066 0l-5.25 1.68A1.75 1.75 0 001 3.48V7c0 1.566.32 3.182 1.303 4.682.983 1.498 2.585 2.813 5.032 3.855a1.7 1.7 0 001.33 0c2.447-1.042 4.049-2.357 5.032-3.855C14.68 10.182 15 8.566 15 7V3.48a1.75 1.75 0 00-1.217-1.667L8.533.133zm-.61 1.429a.25.25 0 01.153 0l5.25 1.68a.25.25 0 01.174.238V7c0 1.358-.275 2.666-1.057 3.86-.784 1.194-2.121 2.34-4.366 3.297a.2.2 0 01-.154 0c-2.245-.956-3.582-2.104-4.366-3.298C2.775 9.666 2.5 8.36 2.5 7V3.48a.25.25 0 01.174-.237l5.25-1.68zM11.28 6.28a.75.75 0 00-1.06-1.06L7.25 8.19l-.97-.97a.75.75 0 10-1.06 1.06l1.5 1.5a.75.75 0 001.06 0l3.5-3.5z"></path></svg>Đã mua tại Nguyên Anh Store</span>';
										str_cmt += '<p class="mes">'+r.cmt[i].reply[j].message+'</p>';
										str_cmt += '<p class="reply"><a <?=!empty($user)?'class="btn-reply btn-frm-reply"':'href="'.site_url('tai-khoan/dang-nhap').'" class="btn-reply"'?> item_id="'+r.cmt[i].id+'"><strong>Trả lời</strong></a> Nhận xét này hữu ích với bạn?</p>';
										str_cmt += '<div class="wrap-box-reply"></div>';
									str_cmt += '</div>';
								str_cmt += '</div>';
							str_cmt += '</div>';
							}
							//
						str_cmt += '</div>';
					str_cmt += '</div>';
				str_cmt += '</div>';
				}
				// str_cmt += '<br><div class="text-center"><button class="btn btn-danger btn-loadmore">Xem thêm đánh giá</button></div>';
				$('.wrap-comment').html(str_cmt);
			}
		});
	});
	$('.btn-frm-rating').click(function(){
		$('.frm-ratting').toggle('fast');
	});
	$(document).on('click','.btn-send-reply',function() {
		event.preventDefault();
		var err = 0;
		var msg = [];
		var p = {};

		clearFormError();
		if ($('#reply-item-id').val() == "0" || $('#reply-item-id').val() == "") {
			$('#reply-item-id').addClass('error');
			err++;
		} else {
			p['item_id'] = $('#reply-item-id').val();
		}

		if ($('#reply-name').val() == "") {
			$('#reply-name').addClass("error");
			err++;
			msg.push("Họ và Tên không được trống.");
		} else {
			if(character_check($('#reply-name').val())) {
				$('#reply-name').addClass("error");
				err++;
				msg.push("Họ tên không có ký tự đặc biệt.");
			} else {
				$('#reply-name').removeClass("error");
				p['name'] = $('#reply-name').val();
			}
		}

		if ($('#reply-phone').val() == "") {
			$('#reply-phone').addClass("error");
			err++;
			msg.push("Số điện thoại không được trống.");
		} else {
			if (validatePhone('reply-phone') == false) {
				$("#reply-phone").addClass("error");
				err++;
				msg.push("Số điện thoại không hợp lệ");
			}
			else {
				$('#reply-phone').removeClass("error");
				p['phone'] = $('#reply-phone').val();
			}
		}

		if ($('#reply-email').val() == "") {
			$('#reply-email').addClass("error");
			err++;
			msg.push("Email không được trống.");
		}
		else {
			if (isEmail($('#reply-email').val()) == false) {
				$("#reply-email").addClass("error");
				err++;
				msg.push("Email không hợp lệ");
			}
			else {
				$('#reply-email').removeClass("error");
				p['email'] = $('#reply-email').val();
			}
		}

		if ($('#reply-message').val() == "") {
			$('#reply-message').addClass('error');
			err++;
			msg.push('Nội dung đánh giá không được trống.');
		}
		else {
			$('#reply-message').removeClass('error');
			p['message'] = $('#reply-message').val();
		}
		p['product_id'] = <?=$item->id?>;

		if (!err) {
			$.ajax({
				url : '<?php echo site_url('call-service/send-reply-rating')?>',
				type : 'POST',
				data : p,
				dataType:'html',
				success:function(r) {
					if(r) {
						$('.wrap-box-reply').html('');
						messageBox('INFO','Gửi nhận xét thành công','Nhận xét của bạn sẽ xuất hiện sau khi được xét duyệt. Cảm ơn bạn đã góp ý và đánh giá về sản phẩm.');
						$('#mes-rating').val('');
					} else {
						messageBox('ERROR','Gửi nhận xét không thành công','Đã có lỗi xảy ra.');
					}
				}
			});
		} else {
			showErrorMessage(msg);
		}
		
	});	
	$(document).on('click','.btn-frm-reply',function() {
		let item_id = $(this).attr('item_id');
		let str = '';
		str += '<div class="box-reply">';
			str += '<div class="row">';
				str += '<div class="col-md-6">';
					str += '<input type="hidden" id="reply-item-id" value="'+item_id+'">';
					str += '<input type="text" class="form-control" id="reply-name" placeholder="Họ tên của bạn" value="<?=!empty($user)?$user->fullname:''?>">';
					str += '<input type="text" class="form-control" id="reply-phone" placeholder="Số điện thoại" value="<?=!empty($user)?$user->phone:''?>">';
					str += '<input type="text" class="form-control" id="reply-email" placeholder="Email" value="<?=!empty($user)?$user->email:''?>">';
					str += '<textarea id="reply-message" class="form-control" rows="3" placeholder="Đánh giá"></textarea>';
					str += '<div class="text-center">';
						str += '<button class="btn btn-success btn-send-reply">Gửi đánh giá</button>';
						str += ' <button class="btn btn-secondary btn-cancel-reply">Đóng</button>';
					str += '</div>';
				str += '</div>';
			str += '</div>';
		str += '</div>';
		$('.wrap-box-reply').html('');
		$(this).parents('.reply').next('.wrap-box-reply').html(str);
	});
	$(document).on('click','.btn-cancel-reply',function() {
		$(this).parents('.wrap-box-reply').html('');
	});
	$(document).on("click",".btn-send-rating",function(event) {
		event.preventDefault();
		var err = 0;
		var msg = [];
		var p = {};

		clearFormError();
		if ($('#position-star').val() == "0") {
			$('#position-star').addClass('error');
			err++;
			msg.push('Bạn chưa đánh giá ở mục số (1).');
		} else {
			p['point'] = $('#position-star').val();
		}

		if ($('#name-rating').val() == "") {
			$('#name-rating').addClass("error");
			err++;
			msg.push("Họ và Tên không được trống");
		} else {
			if(character_check($('#name-rating').val())) {
				$('#name-rating').addClass("error");
				err++;
				msg.push("Họ tên không có ký tự đặc biệt.");
			} else {
				$('#name-rating').removeClass("error");
				p['name'] = $('#name-rating').val();
			}
		}

		if ($('#phone-rating').val() == "") {
			$('#phone-rating').addClass("error");
			err++;
			msg.push("Số điện thoại không được trống");
		} else {
			if (validatePhone('phone-rating') == false) {
				$("#phone-rating").addClass("error");
				err++;
				msg.push("Số điện thoại không hợp lệ");
			}
			else {
				$('#phone-rating').removeClass("error");
				p['phone'] = $('#phone-rating').val();
			}
		}

		if ($('#email-rating').val() == "") {
			$('#email-rating').addClass("error");
			err++;
			msg.push("Email không được trống");
		}
		else {
			if (isEmail($('#email-rating').val()) == false) {
				$("#mail-rating").addClass("error");
				err++;
				msg.push("Email không hợp lệ");
			}
			else {
				$('#email-rating').removeClass("error");
				p['email'] = $('#email-rating').val();
			}
		}

		if ($('#mes-rating').val() == "") {
			$('#mes-rating').addClass('error');
			err++;
			msg.push('Nội dung đánh giá không được trống');
		}
		else {
			$('#mes-rating').removeClass('error');
			p['message'] = $('#mes-rating').val();
		}
		if ($('#g-recaptcha-response').val() == "") {
			err++;
			msg.push('Bạn chưa xác thực người dùng.');
		} else {
			p['g-recaptcha-response'] = $('#g-recaptcha-response').val();
		}
		p['item_id'] = <?=$item->id?>;

		if (!err) {
			$.ajax({
				url : '<?php echo site_url('call-service/send-rating')?>',
				type : 'POST',
				data : p,
				dataType:'html',
				success:function(r) { 
					if(r) {
						$('.frm-ratting').toggle('fast');
						messageBox('INFO','Gửi đánh giá thành công','Đánh giá của bạn sẽ xuất hiện sau khi được xét duyệt. Cảm ơn bạn đã góp ý và đánh giá về sản phẩm.');
						$('#mes-rating').val('');
					} else {
						messageBox('ERROR','Gửi đánh giá không thành công','Đã có lỗi xảy ra.');
					}
				}
			});
		} else {
			showErrorMessage(msg);
		}
	});
	$('.list-image .item').click( function(){
		let src = $(this).find('img').attr('src');
		let data_src = $(this).find('img').attr('data-src');
		$('#zoom').attr('src',data_src);
		$('#zoom').attr('data-src',data_src);
		$('.list-image .item').removeClass('active');
		$(this).addClass('active');
	});
	<? if(!$this->util->detect_mobile()) { ?>
	$(document).on('click','#zoom',function() {
		let html = $('.zoom-left > .list-image').html();
		let data_src = $(this).attr('data-src');
		$('.zoom-content .box .list').html(html);
		$('.item-zoom').attr('src',data_src);
		$('.plugin-zoom').css('display','block');
	});
	<? } ?>
	$(document).on('click','.plugin-zoom .list .item',function() {
		let src = $(this).find('img').attr('data-src');
		$('.item-zoom').attr('src',src);
		$('.plugin-zoom .list .item').removeClass('active');
		$(this).addClass('active');
	});
	$(document).on('click','.plugin-zoom .close-plugin-zoom',function() {
		$('.plugin-zoom').css('display','none');
	});
</script>
