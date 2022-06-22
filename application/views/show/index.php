<div class="cluster">
	<div class="container">
		<div class="banner-service-text" style="margin-bottom:100px;">
			<h1 class="text font-wf">UK SHOWS 2022</h1>
		</div>
	</div>
	<div class="container container-content-child">
		<div class="row">
            <? foreach($items as $item) { ?>
			<div class="col-md-6">
				<div class="box-service-item">
					<img src="<?=$item->thumbnail?>" alt="">
					<div class="box-service-title">
						<h4 class="service-title"><?=$item->title?></h4>
						<p class="service-date"><?=$this->util->to_vn_date($item->created_date)?></p>
					</div>
					<p class="note">NEW THEATRE, PETERBOROUGH, PE1 1RS</p>
					<a class="btn-booknow" href="<?=site_url("giai-dau-{$item->alias}")?>">REGISTER NOW</a>
				</div>
			</div>
            <? } ?>
		</div>
	</div>
</div>