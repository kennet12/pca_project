<div class="container">
	<div class="wrap-box" style="background: #fff;padding: 10px;">
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
									<img class="full-width hover-scale" src="<?=BASE_URL."/files/upload/product/{$item->code}/thumbnail/".end($photo);?>" title="<?=$item->title?>">
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
							if(!empty($user)) {
								if (strpos($user->like_product,'"'.$item->id.'"') !== false) {
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
</script>
