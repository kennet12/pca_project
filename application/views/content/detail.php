<?
	$arr_category_id 	= !empty($_GET['danh_muc'])?explode(',', $_GET['danh_muc']):array();
?>
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="content-post">
				<h2 class="title"><?=$item->title?></h2>
				<div class="date"><p style="font-size: 12px;margin-top: 5px;color: #777;"><time><i class="far fa-clock"></i> <?=date('H:i, d/m/Y',strtotime($item->created_date))?> </time> </p></div>
				<div class="wrap-content">
					<div class="content">
						<?=$item->content?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="wrap-fill-box">
				<div class="reset-all"><a>Bài Viết Khác</a></div>
				<ul class="post-list">
					<? foreach ($related_items as $related_item) { 
						$thumb = explode('/',$related_item->thumbnail);?>
					<li>
						<a href="<?=site_url("tin-tuc/{$this->m_content_categories->load($related_item->category_id)->alias}/{$related_item->alias}")?>">
							<div class="item">
								<div class="img-item">
									<img src="<?=BASE_URL."/images/thumb/{$related_item->id}/thumbnail/".end($thumb)?>" class="transition" alt="<?=$related_item->title?>">
								</div>
								<div class="info-item">
									<h6 class="title transition"><?=$related_item->title?></h6>
								</div>
							</div>
						</a>
					</li>
					<? } ?>
				</ul>
			</div>
			<div class="wrap-fill-box">
				<div class="reset-all"><a>Danh mục</a></div>
				<div class="fill-box">
					<ul class="list" style="display: block;padding-bottom: 15px;">
						<? foreach($categories as $category) { ?>
						<li class="item-cate">
							<a href="<?=site_url("tin-tuc/{$category->alias}")?>"><?=$category->name?></a>
						</li>
						<? } ?>						
					</ul>
				</div>				
			</div>
		</div>
	</div>
</div>