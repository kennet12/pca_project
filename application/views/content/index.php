<link rel="stylesheet" type="text/css" media="screen,all" href="<?=CSS_URL?>owl.carousel.min.css?cr=<?=date('Ymdhis')?>" />
<link rel="stylesheet" type="text/css" media="screen,all" href="<?=CSS_URL?>owl.theme.default.min.css?cr=<?=date('Ymdhis')?>" />
<script type="text/javascript" src="<?=JS_URL?>owl.carousel.min.js?cr=<?=date('Ymdhis')?>"></script>
<script type="text/javascript" src="<?=JS_URL.'lazy-loadimage/jquery.lazy.min.js'?>"></script>
<? $method = $_SERVER['REQUEST_URI']; $method = explode('/',$method); $method = explode('.',end($method)); ?>
<div class="container news">
	<h3 class="new-title"><?=$title?></h3>
	<ul class="cate-list">
		<li class="item"><a class="<?=($method[0]=='tin-tuc')?'active':''?>" href="<?=site_url("tin-tuc")?>">Tất cả</a></li>
		<? foreach($categories as $category) { ?>
		<li class="item"><a class="<?=($method[0]==$category->alias)?'active':''?>" href="<?=site_url("tin-tuc/{$category->alias}")?>"><?=$category->name?></a></li>
		<? } ?>
	</ul>
	<div class="row">
		<div class="col-md-9">
			<div class="owl-carousel owl-theme ">
				<? foreach($slide_items as $slide_item) { 
					?>
				<div class="item">
					<div class="slide-news">
						<a href="<?=site_url("tin-tuc/{$this->m_content_categories->load($slide_item->category_id)->alias}/{$slide_item->alias}")?>">
							<img src="<?=BASE_URL.$slide_item->thumbnail?>" alt="">
						</a>
						<a href="<?=site_url("tin-tuc/{$this->m_content_categories->load($slide_item->category_id)->alias}/{$slide_item->alias}")?>"><h5 class="limit-content-1-line"><?=$slide_item->title?></h5></a>
						<figure class="limit-content-2-line"><?=character_limiter(strip_tags($slide_item->content),400)?></figure>
					</div>
				</div>
				<? } ?>
			</div>
			<script>
				var owl = $('.owl-carousel');
				owl.owlCarousel({
					loop:true,
					nav:true,
					autoplay:true,
					items:1,
					dots:true,
					nav:false,
					center:true,
					autoplayTimeout: 10000,
				});
			</script>
			<div class="list-new">
				<? foreach ($items as $item) { 
					$thumb = explode('/',$item->thumbnail);?>
					<div class="item">
						<div class="left-item">
							<a href="<?=site_url("tin-tuc/{$this->m_content_categories->load($item->category_id)->alias}/{$item->alias}")?>"> 
								<img class="block-img" src="<?=BASE_URL."/images/thumb/{$item->id}/thumbnail/".end($thumb)?>" title="<?=$item->title?>"> 
							</a>
						</div>
						<div class="right-item">
							<a href="<?=site_url("tin-tuc/{$this->m_content_categories->load($item->category_id)->alias}/{$item->alias}")?>">
								<h5 class="title limit-content-1-line"><?=$item->title?></h5>
							</a>
							<p class="limit-content-3-line"><?=character_limiter(strip_tags($item->content),450)?></p>
							<p style="font-size: 12px;margin-top: 5px;color: #777;"><time><i class="far fa-clock"></i> <?=date('H:i, d/m/Y',strtotime($item->created_date))?> </time> </p> 
						</div>
					</div>
				<? } ?>
			</div>
			<?=$pagination?>
		</div>
		<div class="col-md-3">
			<div class="highlight-list">
			<h5 class="title">Bài biết nổi bật</h5>
			<? foreach($right_items as $right_item) { 
				$thumb_s = explode('/',$right_item->thumbnail);?>
				<a href="<?=site_url("tin-tuc/{$this->m_content_categories->load($right_item->category_id)->alias}/{$right_item->alias}")?>">
					<div class="item">
						<div class="left-item">
							<img src="<?=BASE_URL."/images/thumb/{$right_item->id}/thumbnail/".end($thumb_s)?>" alt="">
						</div>
						<div class="right-item">
							<h5 class="limit-content-3-line"><?=$right_item->title?></h5>
						</div>
					</div>
				</a>
				<? } ?>
			</div>

			<div class="highlight-list">
			<h5 class="title">Sản phẩm nổi bật</h5>
			<? foreach($products as $product) { 
				$price = $product->price;
				$thumb_p = explode('/',$product->file_path);
				$price_sale = $price*(1-($product->sale*0.01)); ?>
				<a href="<?=site_url("{$product->alias}")?>">
					<div class="item">
						<div class="left-item">
							<img style="height:80px" src="<?=BASE_URL."/files/upload/product/".$product->code."/thumbnail/".end($thumb_p)?>" alt="">
							<? if(!empty($product->sale)) { ?>
							<div class="sale">-<?=$product->sale?>%</div>
							<? } ?>
						</div>
						<div class="right-item">
							<h5 class="limit-content-2-line"><?=$product->title?></h5>
							<div class="price-sale"><?=number_format($this->util->round_number($price_sale,1000),0,',','.');?>đ</div>
							<? if(!empty($product->sale)) { ?>
							<div class="price"><?=number_format($this->util->round_number($price,1000),0,',','.');?>đ</div>
							<? } ?>
						</div>
					</div>
				</a>
				<? } ?>
			</div>
		</div>
	</div>
</div>