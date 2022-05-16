<? $slides = $this->m_slide->items(null,1); ?>
<div class="wrap-slide">
	<div class="slider">
		<div class="owl-carousel owl-theme ">
			<? $str = "";$i=2; foreach ($slides as $slide) { 
				$thumb = explode('/',$slide->thumbnail);
				$active = "";
				$class = "item-{$i}"; 
				if ($i==2) {
					$active = "active";
					$c = count($slides)+2;
					$class = "item-{$i} item-{$c}"; 
				}
				$t = $i-2;
				$str .= "<div stt='{$t}' class='transition item {$active} {$class}'><span class='lnr lnr-cog'></span></div>";
			?>
			<div class="item slide-item">
				<img src="<?=BASE_URL."/images/slide/{$slide->id}/".end($thumb)?>" alt="">
			</div>
			<? $i++;} ?>
		</div>
	</div>
	<div class="box-slide">
		<div class="container full-height" style="position:relative">
			<div class="box-control display-desktop">
				<div class="control-item-left">
					<i class="fal fa-angle-left lnr-chevron-left"></i>
				</div>
				<div class="control-item-right">
					<i class="fal fa-angle-right lnr-chevron-right"></i>
				</div>
			</div>
			<div class="wrap-box-form">
				<div class="row full-height">
					<div class="col-md-6"></div>
					<div class="col-md-6 full-height">
						<div class="box-form">
							<div class="form">
								<img src="<?=IMG_URL.'logo-big.png'?>" alt="">
								<div class="form-post">
									<span>COMPETE <br> WITH THE PCA</span>
									<a href="">SHOW LIST</a>
									<a href="">MEMBERSHIP</a>
									<a href="">BACKSTAGE SERVICES</a>
									<a href="">EVENT TICKETS</a>
									<a href="">POSING WORKSHOP</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var owl = $('.slider .owl-carousel');
	owl.owlCarousel({
		loop:true,
		nav:true,
		lazyLoad:true,
		autoplay:true,
		items:1,
		dots:false,
		nav:false,
		center:true,
	});
	$('.lnr-chevron-left').click(function() {
		owl.trigger('prev.owl.carousel');
	})
	$('.lnr-chevron-right').click(function() {
		owl.trigger('next.owl.carousel');
	})
</script>