<div class="cluster">
	<div class="container">
		<div class="banner-service-text">
			<h1 class="text font-wf">PCA BACKSTAGE <?=$category->name?> SERVICE</h1>
		</div>
	</div>
	<div class="container container-content-child">
		<div class="text-center">
			<img style="margin:50px 0"src="<?=BASE_URL.$category->thumbnail?>" alt="">
		</div>
		<div class="row">
			<? foreach ($items as $item) { ?>
			<div class="col-md-6">
				<div class="box-service-item">
					<img src="<?=$item->thumbnail?>" alt="">
					<div class="box-service-title">
						<h4 class="service-title"><?=$item->title?></h4>
						<p class="service-date"><?=$this->util->to_vn_date($item->start_date)?></p>
					</div>
					<p class="note">NEW THEATRE, PETERBOROUGH, PE1 1RS</p>
					<a class="btn-booknow" href="<?=site_url("{$item->alias}-ctdv")?>">BOOK NOW</a>
				</div>
			</div>
			<? } ?>
		</div>
	</div>
</div>