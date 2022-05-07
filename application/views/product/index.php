<?
	$arr_category_id 	= !empty($_GET['danh_muc'])?explode(',', $_GET['danh_muc']):array();
	$arr_price 			= !empty($_GET['gia'])?explode(',', $_GET['gia']):array();
	$user_login = $this->session->userdata("user");
?>
<?
function gen_category_menu($product_categories, $obj, $arr_category_id) {
	foreach ($product_categories as $product_category) {
		$child_category_info = new stdClass();
		$child_category_info->parent_id = $product_category->id;
		$child_categories = $obj->m_product_category->items($child_category_info,1,null,null,'order_num','ASC');
		$check = (in_array($product_category->id,$arr_category_id))?'checked':'';
		if (!empty($child_categories)) {
			echo '<li>
					<div class="checkbox">
						<label>
							<input type="checkbox" class="transition filter" status="danh_muc" '.$check.' value="'.$product_category->id.'">
							'.$product_category->name.'
						</label>
					</div>
					<ul class="list" style="padding-left:20px;">';
					gen_category_menu($child_categories, $obj, $arr_category_id);
			echo '	</ul>
				</li>';
		} else {
			echo '<li>
					<div class="checkbox">
						<label>
							<input type="checkbox" class="transition filter" status="danh_muc" '.$check.' value="'.$product_category->id.'">
							'.$product_category->name.'								
						</label>
					</div>
				</li>';
		}
	}
}
?>
<div class="cluster">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="wrap-fill-box-m">
					<h5 class="title-fill-box clearfix">
						<span style="padding-top: 5px;" class="float-left">Lọc sản phẩm</span><i class="fas fa-filter float-right"></i>
					</h5>
				</div>
				<script>
					$('.title-fill-box').click(function (){
						$('.wrap-box-list').toggle('fast');
					})
				</script>
				<div class="wrap-fill-box">
					<? if($this->util->detect_mobile()) { 
							$style='style="display:none;"';
						} else {
							$style='style="display:block;"';
						}
					?>
					<div class="wrap-box-list" <?=$style?>>
						<div class="fill-box">
							<a href="<?=site_url('san-pham')?>"><h6 class="title">Sản phẩm mới</h6></a>
						</div>
						<div class="fill-box">
							<h6 class="title text-color-green" stt=1>Danh mục sản phẩm<i class="fas fa-angle-down transition rotate"></i></h6>
							<ul class="list">
								<? gen_category_menu($categories, $this, $arr_category_id);?>
							</ul>
						</div>
						<div class="fill-box">
							<h6 class="title text-color-green" stt=1>Giá<i class="fas fa-angle-down transition rotate"></i></h6>
							<ul class="list" >
								<li>
									<div class="checkbox">
										<label>
											<input type="checkbox" class="transition filter" status="gia" value="1-499000" <?=(!empty($arr_price) && in_array('1-499000', $arr_price))?'checked':''?> >
											Dưới 500k
										</label>
									</div>
								</li>
								<li>
									<div class="checkbox">
										<label>
											<input type="checkbox" class="transition filter" status="gia" value="500000-999000" <?=(!empty($arr_price) && in_array('500000-999000', $arr_price))?'checked':''?> >
											500k - 999k
										</label>
									</div>
								</li>
								<li>
									<div class="checkbox">
										<label>
											<input type="checkbox" class="transition filter" status="gia" value="1000000-1499000" <?=(!empty($arr_price) && in_array('1000000-1499000', $arr_price))?'checked':''?> >
											1tr - 1tr499
										</label>
									</div>
								</li>
								<li>
									<div class="checkbox">
										<label>
											<input type="checkbox" class="transition filter" status="gia" value="1500000-2000000" <?=(!empty($arr_price) && in_array('1500000-2000000', $arr_price))?'checked':''?> >
											1tr5 - 2tr
										</label>
									</div>
								</li>
								<li>
									<div class="checkbox">
										<label>
											<input type="checkbox" class="transition filter" status="gia" value="2000000-plus" <?=(!empty($arr_price) && in_array('2000000-plus', $arr_price))?'checked':''?> >
											Trên 2tr
										</label>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="nav-list-product clearfix" id="list-product">
					<div class="float-left">
						<h6 class="render-result">Có <span class="text-color-red"><?=$total?></span> sản phẩm</h6>
					</div>
					<div class="float-right">
						<div class="wrap-sort-by">
							Sắp xếp:
							<select class="sort-by" status="sort">
								<option value="">Tất cả</option>
								<option value="price-desc">Giá &#8595;</option>
								<option value="price-asc">Giá &#8593;</option>
								<option value="title-asc">A &#8594; Z</option>
							</select>
							<script type="text/javascript">
								$('.sort-by').val('<?=!empty($_GET['sort'])?$_GET['sort']:''?>');
							</script>
						</div>
					</div>
				</div>
				<div class="wrap-box">
					<div class="box-product-5">
						<div class="na-row">
							<? foreach ($items as $item) { 
								$photo = explode('/',$item->file_path);?>
							<div class="na-col-md-5">
								<div class="wrap-product">
									<div class="product">
										<? if(!empty($item->sale)) { ?>
										<span class="sale-percent">-<?=$item->sale?>%</span>
										<? } ?>
										<a title="<?=$item->title?>" href="<?=site_url($item->alias)?>">
											<div class="border-img">
												<img class="full-width hover-scale lazyload" data-src="<?=BASE_URL."/files/upload/product/{$item->code}/thumbnail/".end($photo);?>" title="<?=$item->title?>">
											</div>
											<?
											$typename = !empty($item->typename)?' - '.$item->typename:'';
											$title_product = $item->title.$typename;
											?>
											<h5 class="title limit-content-2-line"><?=$title_product?></h5>
										</a>
										<div class="rating">
										<? if ($item->rating_cmt != '0'){
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
										<? } 
										$status = 0;
										$cls = 'far';
										if(!empty($user_login)) {
											if (strpos($user_login->like_product,'"'.$item->id.'"') !== false) {
												$status = 2;
												$cls = 'fas';
											} else 
												$status = 1;
										}
										?>
											<i class='<?=$cls?> fa-heart' status='<?=$status?>' id_item='<?=$item->id?>' title='Yêu thích'></i>
										</div>
										<div class="price"><?=number_format($this->util->round_number($item->price*(1-($item->sale*0.01)),1000),0,',','.');?> ₫ 
										<? if(!empty($item->sale)) { ?>
										<span class="sale"><?=number_format($this->util->round_number($item->price,1000),0,',','.');?> ₫</span>
										<? } ?>
										</div>
									</div>
								</div>
							</div>
							<? } ?>
						</div>
					</div>
				</div>
				<?=$pagination?>
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
	let total_page = <?=$total_page?>;
	$(document).ready(function() {
		$('.fill-box .title').click(function(event) {
			let stt = parseInt($(this).attr('stt'));
			if (stt == 0) {
				$(this).find('i').addClass('rotate');
				$(this).attr('stt','1');
				$(this).addClass('text-color-green');
			} else {
				$(this).find('i').removeClass('rotate');
				$(this).attr('stt','0');
				$(this).removeClass('text-color-green');
			}
			$(this).nextAll('.list').toggle('fast');
		});

		$('.sort-by').change(function(event) {
			let base_url = BASE_URL+'/san-pham.html';
			let st = $(this).attr('status');
			let v = $(this).val();
			let ob = getParams(window.location.href);

			let i = 0;
			cleanObject(ob);
			ob[st] = v;
			let page_key = '';
			let page_val = '';
			Object.entries(ob).forEach(([key,value]) => {
				if (key != 'trang') {
					if (ob[key] != '') {
						if (i == 0){
							if (ob[key] != '') base_url += '?'+key+'='+ob[key];
						} else {
							if (ob[key] != '') base_url += '&'+key+'='+ob[key];
						}
						i++;
					}
				} else {
					page_key = key; page_val = value;
				}
			});
			
			if (page_key != "") {
				if (page_val <= total_page) base_url += '&trang='+page_val;
				else base_url += '&trang='+total_page;
			}
			base_url += '#list-product';
			window.location.href = base_url;
		});

		$('.filter').change(function(event) {
			let ob = getParams(window.location.href); 
			let st = $(this).attr('status');
			let v = $(this).val();
			let ck = false;
			let base_url = BASE_URL+'/san-pham.html';
			if (this.checked) ck = true;
			let ob_new = true;

			Object.entries(ob).forEach(([key,value]) => {
				if (key == st) ob_new = false;
			});
			
			const keyValue = (input) => Object.entries(input).forEach(([key,value]) => { 
				cleanObject(ob);
				if (ob_new) ob[st] = v;

				let str = '';
				if (key == st) {
					if (ck) {
						if (value !='') str += value+','+v;
						else str += value+v;
					} else {
						let item = value.split(',');
						removeArr(item, v);
						for (var i = 0; i < item.length; i++) {
							if (item[i] != v) {
								if (i > 0) str += ',';
								str += item[i];
							}
						}
					}
					input[key] = str;
				}
			});
			keyValue(ob); 
			let i = 0;
			let page_key = '';
			let page_val = '';
			const convert_url = (input) => Object.entries(input).forEach(([key,value]) => {
				if (key != 'trang') {
					if (input[key] != '') {
						if (i == 0){
							if (input[key] != '') base_url += '?'+key+'='+input[key];
						} else {
							if (input[key] != '') base_url += '&'+key+'='+input[key];
						}
						i++;
					}
				} else {
					page_key = key; page_val = value;
				}
			});
			convert_url(ob);
			if (page_key != "") {
				if (page_val <= total_page) base_url += '&trang='+page_val;
				else base_url += '&trang='+total_page;
			}
			// window.history.pushState('','',base_url);
			base_url += '#list-product';
			window.location.href = base_url;
		});
	});
</script>
