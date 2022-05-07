<div class="menu visible-lg">
	<div class="container">
		<ul class="menu-items">
			<li <?=($method=='home') ? 'class="active"' : '' ?>><a href="<?=BASE_URL?>"><i class="fa fa-home fa-lg" aria-hidden="true"></i></a></li>
			<li <?=($method=='gioi-thieu') ? 'class="active"' : '' ?>><a href="<?=site_url('gioi-thieu')?>">Giới thiệu</a></li>
			<? $count=count($product_categories); for ($i=0; $i < $count; $i++) { ?>
			<li <?=($this->uri->segment(2)=="{$product_categories[$i]->alias}") ? 'class="active"' : '' ?>><a href="<?=site_url("san-pham/{$product_categories[$i]->alias}")?>"><?=$product_categories[$i]->name?></a></li>
			<? } ?>
			<li class="dropdown <?=($method=='tin-tuc-su-kien') ? 'active' : '' ?>">
				<a href="<?=site_url("tin-tuc-su-kien")?>" class="dropdown-toggle">Tin tức - sự kiện<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<? foreach ($new_categories as $new_categorie) { ?>
					<li><a style="text-transform: uppercase;" href="<?=site_url("tin-tuc-su-kien/{$new_categorie->alias}")?>"><?=$new_categorie->name?></a></li>
					<? } ?>
				</ul>
			</li>
			<li class="dropdown <?=($method=='hoi-dap') ? 'active' : '' ?>">
				<a href="<?=site_url("hoi-dap")?>" class="dropdown-toggle">Hỏi - đáp<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<? foreach ($faq_categories as $faq_categorie) { ?>
					<li><a style="text-transform: uppercase;" href="<?=site_url("hoi-dap/{$faq_categorie->alias}")?>"><?=$faq_categorie->name?></a></li>
					<? } ?>
				</ul>
			</li>
			<li <?=($method=='lien-he') ? 'class="active"' : '' ?>><a href="<?=site_url("lien-he")?>">Liên hệ</a></li>
		</ul>
	</div>
</div>