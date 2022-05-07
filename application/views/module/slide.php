<? $slides = $this->m_slide->items(null,1); ?>
<div class="slider display-desktop">
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
			<img src="<?=BASE_URL."/images/slide/{$slide->id}/thumbnail/".end($thumb)?>" alt="">
		</div>
		<? $i++;} ?>
	</div>
	<div class="control-item">
		<?=$str?>
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
		autoplayTimeout: 10000,
		onDragged: callback
	});
	$(".control-item .item").mouseover(function(){
		var i = parseInt($(this).attr('stt'));
		$('.control-item .item').removeClass('active');
		$(this).addClass('active');
		owl.trigger('to.owl.carousel',i,200);
	});
	function callback(event) {
		var i      = event.item.index;
		$('.control-item .item').removeClass('active');
		$('.control-item .item-'+i).addClass('active');
	}
</script>