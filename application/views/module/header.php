<?
	$method = $this->util->slug($this->router->fetch_class());
	$setting = $this->m_setting->load(1);
	$info_cate = new stdClass();
	$info_cate->parent_id = 0;
	if (!empty($_COOKIE['token_login'])){
		$user = json_decode($_COOKIE['token_login']);
	}
?>
<div class="header display-desktop">
	<div class="head-content">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<a href="<?=BASE_URL?>">
						<div class="wrap-logo">
							<div class="border-logo">
								<img src="<?=IMG_URL.'logo.png'?>" class="logo" alt="Nguyen Anh Fruit">
							</div>
							<div class="text-logo">
								P C A
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-9">
					<ul class="menu-pc clearfix">
						<li class="item">
							<a class="<?=(($method=='trang-chu')?'active':'')?>" href="<?=site_url()?>">HOME</a>
						</li>
						<li class="item">
							<a class="<?=(($method=='tai-khoan')?'active':'')?>" href="<?=site_url('tai-khoan')?>"> MEMBERSHIP</a>
						</li>
						<li class="item">
							<a class="<?=(($method=='giai-dau')?'active':'')?>" href="<?=site_url('giai-dau')?>">UK SHOWS</a>
						</li>
						<li class="item">
							<a class="<?=(($method=='dich-vu')?'active':'')?>" href="<?=site_url('dich-vu')?>"> SERVICES</a>
						</li>
						<li class="item">
							<a class="<?=(($method=='lien-he')?'active':'')?>" href="#">CONTACT</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="display-mobile">
	<div class="header-mobile align-items-center">
		<div class="menu-m box-menu-m">
			<div class="border-menu">
				<span class="menu-icon">ME NU</span>
			</div>
		</div>
		<div class="logo-m ">
			<div class="wrap-logo-m">
				<div class="border-logo">
					<a href="<?=BASE_URL?>"><img src="<?=IMG_URL.'logo.png'?>" class="logo" alt="Nguyen Anh Fruit"></a>
				</div>
			</div>
		</div>
		<div class="search-m">
			<i class="far fa-search lnr-magnifier transition"></i>
		</div>
		<script>
			$('.box-menu-m').click(function(e){
				$('.list-menu-m').css('right','0');
			});
			$(document).on('click','.list-menu-m > .opacity-menu',function(e){
				$('.list-menu-m').css('right','-100%');
			});
		</script>
	</div>
</div>
<div class="display-mobile">
	<div class="list-menu-m transition d-flex">
		<div class="opacity-menu"><span class=" close-menu-m"><i class='fal fa-times'></i></span></div>
		<div class="content-menu">
			<!-- <div class="my-account-m">
				<a href="#"><span class="lnr lnr-user"></span> Đăng nhập</a>
			</div> -->
			<ul class="menu-m">
				<li class="item">
					<a href="<?=site_url()?>" class="active">HOME</a>
				</li>
				<li class="item">
					<a href="<?=site_url('tai-khoan')?>"> MEMBERSHIP</a>
				</li>
				<li class="item">
					<a href="<?=site_url('giai-dau')?>">UK SHOWS</a>
				</li>
				<li class="item">
					<a href="<?=site_url('dich-vu')?>"> SERVICES</a>
				</li>
				<li class="item">
					<a href="<?//=site_url('lien-he')?>"> CONTACT</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<script>
$(window).scroll(function() {
	// $scroll = $(window).scrollTop();
	// if($scroll > 200){
	// 	$(".header").addClass('scroll-header');
	// }
	// else{
	// 	$(".header").removeClass('scroll-header');
	// }
});
</script>
