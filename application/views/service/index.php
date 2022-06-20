<div class="cluster">
	<div class="container container-content">
		<div class="banner-text">
			<h1 class="text font-wf">PCA OFFICIAL SERVICES</h1>
		</div>
		<div class="row">
			<? $i=0; foreach($items as $item) { ?>
			<div class="col-md-6">
				<div class="service-box <?=($i%2==0)?'box-left':'box-right'?>">
					<h5 class="service-title font-wf">
						<?=$item->name?>
					</h5>
					<a href="<?=site_url($item->alias)?>" class="service-button"><?=$item->btn_text?></a>
					<div class="service-info">
						<?=$item->description?>
						<div class="content-table">
							<div class="content-left">
								<?=$item->content?>
							</div>
							<div class="content-right">
								<img src="<?=BASE_URL.$item->thumbnail?>" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
			<? $i++;} ?>
		</div>
	</div>
</div>
