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
	<!-- <div class="container">
		<div class="head-top">
			<div class="row">
				<div class="col-lg-3 col-md-12">
					<div class="note-sp">
					Hỗ Trợ : 
					</div>
					<div class="svg-sp">
						<a href="">
							<svg class="transition" style="width:20px;height:20px" version="1.0" xmlns="http://www.w3.org/2000/svg" width="309.000000pt" height="309.000000pt" viewBox="0 0 309.000000 309.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,309.000000) scale(0.100000,-0.100000)" fill="#222" stroke="none"><path d="M1400 3069 c-365 -35 -676 -183 -940 -448 -226 -227 -353 -464 -422 -784 -29 -137 -31 -426 -5 -562 80 -408 292 -746 616 -979 83 -59 229 -140 321 -177 67 -26 230 -74 285 -83 l40 -7 4 533 3 534 -53 -1 c-30 0 -118 1 -196 3 l-143 2 0 225 0 225 195 0 195 0 0 205 c0 240 13 323 67 435 42 87 130 180 210 223 84 45 190 67 322 67 105 0 241 -11 314 -26 l27 -6 0 -141 c0 -78 -3 -165 -6 -194 l-7 -52 -131 1 c-147 1 -187 -9 -244 -65 -50 -49 -62 -104 -62 -294 0 -114 3 -162 11 -158 6 4 100 4 211 0 l200 -8 -7 -61 c-4 -33 -19 -133 -33 -221 l-27 -160 -176 -3 -176 -2 -6 -527 c-4 -289 -5 -528 -2 -531 8 -8 124 18 225 50 742 237 1187 987 1039 1756 -58 299 -200 564 -423 788 -263 262 -567 405 -945 443 -114 12 -156 12 -281 0z"/></g></svg>
						</a>
					</div>
					<div class="svg-sp">
						<a href="">
							<svg class="transition" style="width:20px;height:20px" version="1.0" xmlns="http://www.w3.org/2000/svg" width="309.000000pt" height="309.000000pt" viewBox="0 0 309.000000 309.000000" preserveAspectRatio="xMidYMid meet"><metadata>Created by potrace 1.16, written by Peter Selinger 2001-2019</metadata><g transform="translate(0.000000,309.000000) scale(0.100000,-0.100000)" fill="#222" stroke="none"><path d="M629 3079 c-181 -19 -300 -72 -422 -188 -64 -61 -86 -90 -122 -165 -85 -172 -79 -95 -82 -1141 -3 -1082 -5 -1053 87 -1236 42 -83 171 -212 258 -258 170 -89 231 -93 1277 -89 850 4 861 4 944 26 46 12 116 39 155 60 86 45 203 153 250 231 66 110 106 264 106 413 l0 60 -67 -62 c-219 -201 -548 -332 -927 -369 -402 -40 -836 40 -1127 208 l-72 41 -52 -19 c-114 -43 -333 -68 -350 -41 -4 6 7 28 24 49 57 71 86 148 86 226 -1 67 -3 74 -52 152 -203 327 -273 816 -182 1268 66 329 236 627 447 786 31 24 61 47 66 51 12 10 -142 8 -245 -3z"/><path d="M2040 1717 c0 -269 3 -366 12 -375 7 -7 34 -12 60 -12 l48 0 0 375 0 375 -60 0 -60 0 0 -363z"/><path d="M730 2008 l0 -63 196 3 c108 2 200 0 205 -5 4 -4 -87 -126 -203 -270 -176 -221 -211 -269 -215 -303 l-6 -40 296 0 c283 0 297 1 307 19 5 11 10 36 10 55 l0 36 -215 0 c-118 0 -215 2 -215 5 0 3 92 122 205 265 203 257 225 289 225 336 l0 24 -295 0 -295 0 0 -62z"/> <path d="M1559 1887 c-92 -35 -146 -87 -180 -177 -89 -233 156 -462 383 -358 l54 25 10 -21 c7 -16 19 -22 57 -24 l47 -3 0 278 0 278 -55 0 c-47 0 -55 -3 -55 -18 0 -10 -3 -17 -7 -15 -89 46 -188 59 -254 35z m161 -119 c105 -53 131 -182 54 -267 -44 -50 -82 -65 -145 -59 -145 14 -207 189 -104 293 57 57 125 68 195 33z"/> <path d="M2425 1876 c-219 -102 -226 -416 -11 -521 147 -72 309 -20 383 124 61 117 40 254 -53 343 -84 80 -216 103 -319 54z m195 -108 c131 -66 130 -246 -1 -314 -40 -20 -113 -18 -159 6 -99 51 -120 202 -39 277 63 57 127 67 199 31z"/></g></svg>
						</a>
					</div>
					<div class="svg-sp">
						<a href="tel:0859322224">
							<svg class="transition" style="width:20px;height:25px;" version="1.0" xmlns="http://www.w3.org/2000/svg" width="317.000000pt" height="359.000000pt" viewBox="0 0 317.000000 359.000000" preserveAspectRatio="xMidYMid meet"> <metadata>Created by potrace 1.16, written by Peter Selinger 2001-2019</metadata><g transform="translate(0.000000,359.000000) scale(0.100000,-0.100000)" fill="#222" stroke="none"><path d="M1350 3492 c0 -5 -60 -14 -132 -22 -73 -7 -144 -14 -158 -15 -14 -1 -32 -6 -41 -9 -9 -4 -31 -8 -50 -10 -19 -2 -45 -8 -59 -13 -14 -6 -29 -7 -34 -3 -5 5 -16 2 -24 -7 -8 -8 -26 -13 -38 -10 -13 2 -25 0 -26 -4 -2 -5 -14 -10 -28 -11 -14 -2 -27 -6 -30 -10 -3 -4 -15 -9 -25 -11 -11 -2 -30 -8 -41 -15 -12 -6 -24 -8 -28 -5 -3 3 -6 1 -6 -5 0 -7 -9 -12 -19 -12 -11 0 -23 -5 -26 -11 -4 -6 -13 -8 -21 -5 -8 3 -14 1 -14 -4 0 -6 -7 -10 -15 -10 -8 0 -15 -3 -15 -8 0 -4 -17 -16 -37 -27 -20 -11 -58 -37 -84 -57 -31 -24 -49 -33 -52 -25 -4 8 -6 7 -6 -3 -1 -8 -18 -34 -39 -56 -123 -135 -220 -354 -257 -576 -3 -21 -11 -38 -18 -38 -8 0 -9 -3 -1 -8 7 -5 8 -26 3 -67 -5 -33 -11 -89 -13 -125 -6 -116 -6 -577 0 -594 4 -9 4 -32 1 -50 -3 -19 -2 -38 3 -42 14 -16 21 -104 7 -104 -8 0 -8 -3 2 -9 7 -5 17 -26 21 -47 43 -208 139 -395 269 -521 35 -35 65 -63 67 -63 2 0 31 -20 66 -44 35 -24 95 -56 133 -71 39 -15 75 -32 82 -37 7 -5 16 -7 21 -5 4 3 14 2 21 -2 10 -7 13 -78 12 -344 -1 -225 2 -343 9 -357 28 -52 67 -20 290 239 30 35 64 74 75 87 11 12 27 31 35 41 8 10 56 66 105 125 l89 108 51 -1 c27 0 97 -4 155 -8 68 -5 107 -5 111 2 4 6 44 8 102 5 53 -3 100 -1 104 3 5 5 43 10 85 13 42 2 81 7 86 10 6 3 30 7 54 7 23 1 48 5 53 9 20 14 74 19 78 7 2 -8 9 -6 22 6 11 12 27 17 42 14 12 -2 23 -1 23 3 0 14 63 21 72 8 5 -9 8 -8 8 5 0 9 8 18 18 19 25 2 35 4 54 12 9 4 22 9 30 10 7 2 21 6 30 10 9 4 22 5 28 1 5 -3 10 -2 10 3 0 4 26 19 58 32 31 12 66 31 77 40 11 9 36 26 55 38 20 11 46 32 59 46 13 14 28 23 32 20 5 -3 9 -1 9 4 0 5 14 25 31 43 116 130 209 342 235 537 3 28 9 52 13 52 3 0 7 35 9 77 1 42 6 81 11 87 11 14 12 647 1 661 -5 6 -10 37 -12 70 -2 33 -6 62 -9 65 -3 3 -14 46 -24 95 -39 194 -133 397 -234 507 -49 54 -178 148 -201 148 -6 0 -10 5 -10 10 0 6 -9 10 -20 10 -11 0 -20 4 -20 10 0 5 -7 7 -15 4 -8 -4 -17 1 -21 9 -3 9 -12 13 -19 10 -8 -2 -20 -1 -27 3 -7 5 -19 9 -27 11 -8 1 -17 5 -20 10 -3 4 -17 9 -31 11 -14 1 -26 6 -28 11 -2 5 -11 7 -21 4 -10 -2 -25 2 -33 11 -9 8 -24 12 -35 10 -12 -3 -28 2 -38 13 -11 10 -20 13 -22 7 -4 -11 -63 -7 -63 5 0 3 -19 7 -43 8 -23 2 -43 7 -45 13 -2 5 -13 8 -25 5 -12 -3 -44 -1 -72 4 -27 6 -106 13 -175 16 -69 3 -129 10 -135 16 -12 12 -135 12 -135 -1 0 -6 -30 -10 -70 -10 -40 0 -70 4 -70 10 0 6 -18 10 -40 10 -22 0 -40 -4 -40 -8z m375 -437 c390 -63 702 -341 800 -711 20 -75 45 -244 45 -306 0 -74 -47 -111 -88 -70 -15 15 -20 41 -25 123 -13 205 -85 406 -198 547 -63 79 -191 180 -284 226 -103 50 -234 86 -343 93 -70 5 -99 11 -118 25 -28 23 -30 35 -8 66 13 18 25 22 72 22 31 0 98 -7 147 -15z m-791 -109 c54 -22 237 -259 306 -395 18 -35 21 -56 18 -100 -5 -55 -6 -56 -87 -131 -100 -92 -106 -113 -66 -216 36 -91 107 -211 172 -289 94 -114 265 -229 398 -267 80 -23 107 -12 194 80 84 89 115 103 187 83 83 -22 398 -252 430 -313 26 -50 14 -117 -31 -185 -87 -132 -211 -223 -302 -223 -122 0 -551 218 -813 413 -187 140 -384 360 -525 587 -77 125 -226 418 -253 499 -40 120 -24 208 54 300 70 82 206 170 262 171 12 0 38 -6 56 -14z m856 -156 c137 -33 221 -80 320 -179 106 -106 153 -191 181 -324 25 -124 25 -191 -1 -217 -25 -25 -41 -25 -68 0 -18 17 -22 32 -22 83 -1 148 -61 288 -170 391 -89 83 -170 122 -318 151 -130 26 -150 42 -122 96 14 26 88 25 200 -1z m-9 -250 c149 -28 246 -134 268 -292 10 -73 -4 -108 -43 -108 -33 0 -52 27 -61 85 -9 68 -30 114 -68 153 -31 32 -105 62 -156 62 -74 0 -84 108 -10 110 9 0 40 -5 70 -10z"/></g></svg>
						</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<ul class="menu-pc">
						<li class="item">
							<a style="transform: scale(1.4);display: inline-block;color: #fff;" href="<?=BASE_URL?>"><span class="lnr lnr-home"></span></a>
						</li>
						<li class="item">
							<a href="#"><span class="lnr lnr-sun"></span> Hàng mới (100%)</a>
						</li>
						<li class="item">
							<a href="#"><span style="font-size: 12px;" class="lnr lnr-moon"></span> Hàng like new</a>
						</li>
						<li class="item">
							<a href="#"><span style="font-size: 11px;font-weight: 500;border: thin solid;width: 15px;height: 15px;padding: 0px;display: inline-block;text-align: center;border-radius: 50%;">?</span> Mọi người mua gì ?</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-12 text-right">
					<? if(empty($user->status)) { ?>
					<div class="my-account">
						<a href="<?=site_url('tai-khoan')?>"><span class="lnr lnr-user"></span> Đăng nhập</a>
					</div>
					<? } else { ?>
					<div class="notify"><svg version="1.0" style="width: 20px;height: 20px;" xmlns="http://www.w3.org/2000/svg" width="180.000000pt" height="180.000000pt" viewBox="0 0 180.000000 180.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,180.000000) scale(0.100000,-0.100000)" fill="#444" stroke="none"><path d="M874 1659 c-4 -7 -9 -31 -11 -55 -6 -81 -14 -90 -99 -115 -85 -25 -175 -78 -217 -129 -70 -82 -137 -281 -137 -404 0 -54 -9 -149 -26 -268 -5 -42 -79 -196 -118 -247 -14 -19 -26 -42 -26 -52 0 -38 27 -44 209 -47 l176 -4 25 -51 c70 -145 194 -201 344 -158 68 20 138 88 162 159 l19 52 170 0 c93 0 180 3 192 6 46 13 39 50 -29 150 -70 104 -108 254 -108 427 0 100 -29 247 -64 322 -27 61 -131 177 -181 203 -16 8 -68 28 -115 43 l-85 27 -3 63 c-2 35 -8 69 -14 76 -13 16 -54 17 -64 2z m179 -275 c69 -24 149 -101 187 -180 34 -73 57 -192 65 -340 6 -122 24 -213 64 -324 17 -46 29 -85 26 -88 -6 -6 -984 -7 -990 0 -3 3 8 34 25 69 45 98 67 198 74 354 12 229 44 340 126 429 45 49 103 81 171 96 60 13 194 4 252 -16z m7 -1049 c0 -25 -34 -76 -63 -93 -51 -32 -140 -31 -190 3 -31 22 -67 69 -67 90 0 3 72 5 160 5 88 0 160 -2 160 -5z"/></g></svg>,</div>
					<div class="my-account login-success">
						<a href="#">
							<strong><?=$user->fullname?></strong> 
						</a>
						<ul class="account-list">
							<li class="item"><a href="#"><span class="lnr lnr-pencil"></span> Tin đăng của tôi</a></li>
							<li class="item"><a href="#"><span class="lnr lnr-user"></span> Thông tin cá nhân</a></li>
							<li class="item"><a href="#"><span class="lnr lnr-cog"></span> Đổi mật khẩu</a></li>
							<li class="item"><a href="<?=site_url('tai-khoan/dang-xuat')?>"><span class="lnr lnr-power-switch"></span> Đăng xuất</a></li>
						</ul>
					</div>
					<script>
						$('.login-success').click(function(e){
							$('.account-list').toggle('fast');
						})
						$(document).click(function(event) { 
							var $target = $(event.target);
							if(!$target.closest('.login-success').length && 
							$('.login-success').is(":visible")) {
								$('.login-success .account-list').hide();
							}        
						});
					</script>
					<? } ?>
				</div>
			</div>
		</div>
		
	</div> -->
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
							<a href="#">HOME</a>
						</li>
						<li class="item">
							<a href="#"> MEMBERSHIP</a>
						</li>
						<li class="item">
							<a href="#">UK SHOWS</a>
						</li>
						<li class="item">
							<a href="#"> SERVICES</a>
						</li>
						<li class="item">
							<a href="#">SHOP</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="display-mobile">
	<div class="header-mobile d-flex align-items-center">
		<div class="logo-m ">
			<a href=""><img src="<?=IMG_URL.'logo.png'?>" width="80px" alt="Nguyen Anh Fruit"></a>
		</div>
		<div class="search-m">
			<form action="" method="GET" class="frm-search">
				<input type="text" placeholder="Nhập từ khóa cần tìm...">
				<span class="lnr lnr-magnifier transition"></span>
			</form>
		</div>
		<div class="menu-m">
			<span class="lnr lnr-menu"></span>
		</div>
		<script>
			$('.menu-m > .lnr-menu').click(function(e){
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
	<div class="opacity-menu"><span class=" close-menu-m">X</span></div>
	<div class="content-menu">
		<div class="my-account-m">
			<a href="#"><span class="lnr lnr-user"></span> Đăng nhập</a>
		</div>
		<ul class="menu-m">
			<li class="item" style="margin: 0;font-size: 18px;margin-bottom: 15px;font-weight: 600;"><span style="font-size: 18px;" class="lnr lnr-menu"></span> Menu</li>
			<li class="item">
				<a href="#"><span class="lnr lnr-sun"></span> Hàng mới (100%)</a>
			</li>
			<li class="item">
				<a href="#"><span class="lnr lnr-moon"></span> Hàng like new</a>
			</li>
			<li class="item">
				<a href="#"><span style="font-size: 11px;font-weight: 500;border: thin solid;width: 15px;height: 15px;padding: 0px;display: inline-block;text-align: center;border-radius: 50%;">?</span> Mọi người mua gì ?</a>
			</li>
		</ul>
		<div class="submit-post-m">
			<a href="#"><span class="lnr lnr-pencil"></span> Đăng Tin</a>
		</div>
		<div class="support-m d-flex">
			<div class="svg-sp">
				<a href="">
					<svg class="transition" style="width:40px;height:40px" version="1.0" xmlns="http://www.w3.org/2000/svg" width="309.000000pt" height="309.000000pt" viewBox="0 0 309.000000 309.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,309.000000) scale(0.100000,-0.100000)" fill="#222" stroke="none"><path d="M1400 3069 c-365 -35 -676 -183 -940 -448 -226 -227 -353 -464 -422 -784 -29 -137 -31 -426 -5 -562 80 -408 292 -746 616 -979 83 -59 229 -140 321 -177 67 -26 230 -74 285 -83 l40 -7 4 533 3 534 -53 -1 c-30 0 -118 1 -196 3 l-143 2 0 225 0 225 195 0 195 0 0 205 c0 240 13 323 67 435 42 87 130 180 210 223 84 45 190 67 322 67 105 0 241 -11 314 -26 l27 -6 0 -141 c0 -78 -3 -165 -6 -194 l-7 -52 -131 1 c-147 1 -187 -9 -244 -65 -50 -49 -62 -104 -62 -294 0 -114 3 -162 11 -158 6 4 100 4 211 0 l200 -8 -7 -61 c-4 -33 -19 -133 -33 -221 l-27 -160 -176 -3 -176 -2 -6 -527 c-4 -289 -5 -528 -2 -531 8 -8 124 18 225 50 742 237 1187 987 1039 1756 -58 299 -200 564 -423 788 -263 262 -567 405 -945 443 -114 12 -156 12 -281 0z"/></g></svg>
				</a>
			</div>
			<div class="svg-sp">
				<a href="">
					<svg class="transition" style="width:40px;height:40px" version="1.0" xmlns="http://www.w3.org/2000/svg" width="309.000000pt" height="309.000000pt" viewBox="0 0 309.000000 309.000000" preserveAspectRatio="xMidYMid meet"><metadata>Created by potrace 1.16, written by Peter Selinger 2001-2019</metadata><g transform="translate(0.000000,309.000000) scale(0.100000,-0.100000)" fill="#222" stroke="none"><path d="M629 3079 c-181 -19 -300 -72 -422 -188 -64 -61 -86 -90 -122 -165 -85 -172 -79 -95 -82 -1141 -3 -1082 -5 -1053 87 -1236 42 -83 171 -212 258 -258 170 -89 231 -93 1277 -89 850 4 861 4 944 26 46 12 116 39 155 60 86 45 203 153 250 231 66 110 106 264 106 413 l0 60 -67 -62 c-219 -201 -548 -332 -927 -369 -402 -40 -836 40 -1127 208 l-72 41 -52 -19 c-114 -43 -333 -68 -350 -41 -4 6 7 28 24 49 57 71 86 148 86 226 -1 67 -3 74 -52 152 -203 327 -273 816 -182 1268 66 329 236 627 447 786 31 24 61 47 66 51 12 10 -142 8 -245 -3z"/><path d="M2040 1717 c0 -269 3 -366 12 -375 7 -7 34 -12 60 -12 l48 0 0 375 0 375 -60 0 -60 0 0 -363z"/><path d="M730 2008 l0 -63 196 3 c108 2 200 0 205 -5 4 -4 -87 -126 -203 -270 -176 -221 -211 -269 -215 -303 l-6 -40 296 0 c283 0 297 1 307 19 5 11 10 36 10 55 l0 36 -215 0 c-118 0 -215 2 -215 5 0 3 92 122 205 265 203 257 225 289 225 336 l0 24 -295 0 -295 0 0 -62z"/> <path d="M1559 1887 c-92 -35 -146 -87 -180 -177 -89 -233 156 -462 383 -358 l54 25 10 -21 c7 -16 19 -22 57 -24 l47 -3 0 278 0 278 -55 0 c-47 0 -55 -3 -55 -18 0 -10 -3 -17 -7 -15 -89 46 -188 59 -254 35z m161 -119 c105 -53 131 -182 54 -267 -44 -50 -82 -65 -145 -59 -145 14 -207 189 -104 293 57 57 125 68 195 33z"/> <path d="M2425 1876 c-219 -102 -226 -416 -11 -521 147 -72 309 -20 383 124 61 117 40 254 -53 343 -84 80 -216 103 -319 54z m195 -108 c131 -66 130 -246 -1 -314 -40 -20 -113 -18 -159 6 -99 51 -120 202 -39 277 63 57 127 67 199 31z"/></g></svg>
				</a>
			</div>
			<div class="svg-sp">
				<a href="tel:0859322224">
					<svg class="transition" style="width:40px;height:45px;" version="1.0" xmlns="http://www.w3.org/2000/svg" width="317.000000pt" height="359.000000pt" viewBox="0 0 317.000000 359.000000" preserveAspectRatio="xMidYMid meet"> <metadata>Created by potrace 1.16, written by Peter Selinger 2001-2019</metadata><g transform="translate(0.000000,359.000000) scale(0.100000,-0.100000)" fill="#222" stroke="none"><path d="M1350 3492 c0 -5 -60 -14 -132 -22 -73 -7 -144 -14 -158 -15 -14 -1 -32 -6 -41 -9 -9 -4 -31 -8 -50 -10 -19 -2 -45 -8 -59 -13 -14 -6 -29 -7 -34 -3 -5 5 -16 2 -24 -7 -8 -8 -26 -13 -38 -10 -13 2 -25 0 -26 -4 -2 -5 -14 -10 -28 -11 -14 -2 -27 -6 -30 -10 -3 -4 -15 -9 -25 -11 -11 -2 -30 -8 -41 -15 -12 -6 -24 -8 -28 -5 -3 3 -6 1 -6 -5 0 -7 -9 -12 -19 -12 -11 0 -23 -5 -26 -11 -4 -6 -13 -8 -21 -5 -8 3 -14 1 -14 -4 0 -6 -7 -10 -15 -10 -8 0 -15 -3 -15 -8 0 -4 -17 -16 -37 -27 -20 -11 -58 -37 -84 -57 -31 -24 -49 -33 -52 -25 -4 8 -6 7 -6 -3 -1 -8 -18 -34 -39 -56 -123 -135 -220 -354 -257 -576 -3 -21 -11 -38 -18 -38 -8 0 -9 -3 -1 -8 7 -5 8 -26 3 -67 -5 -33 -11 -89 -13 -125 -6 -116 -6 -577 0 -594 4 -9 4 -32 1 -50 -3 -19 -2 -38 3 -42 14 -16 21 -104 7 -104 -8 0 -8 -3 2 -9 7 -5 17 -26 21 -47 43 -208 139 -395 269 -521 35 -35 65 -63 67 -63 2 0 31 -20 66 -44 35 -24 95 -56 133 -71 39 -15 75 -32 82 -37 7 -5 16 -7 21 -5 4 3 14 2 21 -2 10 -7 13 -78 12 -344 -1 -225 2 -343 9 -357 28 -52 67 -20 290 239 30 35 64 74 75 87 11 12 27 31 35 41 8 10 56 66 105 125 l89 108 51 -1 c27 0 97 -4 155 -8 68 -5 107 -5 111 2 4 6 44 8 102 5 53 -3 100 -1 104 3 5 5 43 10 85 13 42 2 81 7 86 10 6 3 30 7 54 7 23 1 48 5 53 9 20 14 74 19 78 7 2 -8 9 -6 22 6 11 12 27 17 42 14 12 -2 23 -1 23 3 0 14 63 21 72 8 5 -9 8 -8 8 5 0 9 8 18 18 19 25 2 35 4 54 12 9 4 22 9 30 10 7 2 21 6 30 10 9 4 22 5 28 1 5 -3 10 -2 10 3 0 4 26 19 58 32 31 12 66 31 77 40 11 9 36 26 55 38 20 11 46 32 59 46 13 14 28 23 32 20 5 -3 9 -1 9 4 0 5 14 25 31 43 116 130 209 342 235 537 3 28 9 52 13 52 3 0 7 35 9 77 1 42 6 81 11 87 11 14 12 647 1 661 -5 6 -10 37 -12 70 -2 33 -6 62 -9 65 -3 3 -14 46 -24 95 -39 194 -133 397 -234 507 -49 54 -178 148 -201 148 -6 0 -10 5 -10 10 0 6 -9 10 -20 10 -11 0 -20 4 -20 10 0 5 -7 7 -15 4 -8 -4 -17 1 -21 9 -3 9 -12 13 -19 10 -8 -2 -20 -1 -27 3 -7 5 -19 9 -27 11 -8 1 -17 5 -20 10 -3 4 -17 9 -31 11 -14 1 -26 6 -28 11 -2 5 -11 7 -21 4 -10 -2 -25 2 -33 11 -9 8 -24 12 -35 10 -12 -3 -28 2 -38 13 -11 10 -20 13 -22 7 -4 -11 -63 -7 -63 5 0 3 -19 7 -43 8 -23 2 -43 7 -45 13 -2 5 -13 8 -25 5 -12 -3 -44 -1 -72 4 -27 6 -106 13 -175 16 -69 3 -129 10 -135 16 -12 12 -135 12 -135 -1 0 -6 -30 -10 -70 -10 -40 0 -70 4 -70 10 0 6 -18 10 -40 10 -22 0 -40 -4 -40 -8z m375 -437 c390 -63 702 -341 800 -711 20 -75 45 -244 45 -306 0 -74 -47 -111 -88 -70 -15 15 -20 41 -25 123 -13 205 -85 406 -198 547 -63 79 -191 180 -284 226 -103 50 -234 86 -343 93 -70 5 -99 11 -118 25 -28 23 -30 35 -8 66 13 18 25 22 72 22 31 0 98 -7 147 -15z m-791 -109 c54 -22 237 -259 306 -395 18 -35 21 -56 18 -100 -5 -55 -6 -56 -87 -131 -100 -92 -106 -113 -66 -216 36 -91 107 -211 172 -289 94 -114 265 -229 398 -267 80 -23 107 -12 194 80 84 89 115 103 187 83 83 -22 398 -252 430 -313 26 -50 14 -117 -31 -185 -87 -132 -211 -223 -302 -223 -122 0 -551 218 -813 413 -187 140 -384 360 -525 587 -77 125 -226 418 -253 499 -40 120 -24 208 54 300 70 82 206 170 262 171 12 0 38 -6 56 -14z m856 -156 c137 -33 221 -80 320 -179 106 -106 153 -191 181 -324 25 -124 25 -191 -1 -217 -25 -25 -41 -25 -68 0 -18 17 -22 32 -22 83 -1 148 -61 288 -170 391 -89 83 -170 122 -318 151 -130 26 -150 42 -122 96 14 26 88 25 200 -1z m-9 -250 c149 -28 246 -134 268 -292 10 -73 -4 -108 -43 -108 -33 0 -52 27 -61 85 -9 68 -30 114 -68 153 -31 32 -105 62 -156 62 -74 0 -84 108 -10 110 9 0 40 -5 70 -10z"/></g></svg>
				</a>
			</div>
		</div>
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
