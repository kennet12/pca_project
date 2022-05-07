<? if ($this->util->slug($this->router->fetch_class()) != "trang-chu" && !empty($breadcrumb)) { ?>
<div class="display-desktop">
	<div class="breadcrumbs" id="breadcrumbs">
		<div class="container">
			<ul class="breadcrumb clearfix">
				<li><a href="<?=BASE_URL?>" class="transition"><span class="lnr lnr-home"></span></a></li>
				<?
					foreach ($breadcrumb as $k => $v) {
						echo '<li><a title="'.$k.'" href="'.$v.'" class="transition"><span class="lnr lnr-chevron-right"></span> '.$k.'</a></li>';
						}
				?>
			</ul>
		</div>
	</div>
</div>
<? } ?>