<?
	
	$admin = $this->session->userdata("admin");
	$method = $this->router->fetch_method();
	$category_info = new stdClass();
	$category_info->parent_id = 0;
	// $product_categories = $this->m_product_category->items($category_info,null,null,null,'order_num','ASC');
	$content_categories = $this->m_content_categories->items(null,1);
	$blog_info = new stdClass();
	$blog_info->parent_id = 9;
	$blog_categories = $this->m_content_categories->items($blog_info);
	$info = new stdClass();
	$info->user_types = array(USR_SUPPER_ADMIN, USR_ADMIN);
	$user_onlines = $this->m_user->users($info);
	$service_categories = $this->m_service_category->items(null,1);
	
?>
<div class="header">
	<div class="header-top">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-expanded="false">
						<span class="sr-only"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						<div class="clearfix">
							<div class="pull-left">
								<span class="header-sitename"><?=SITE_NAME?></span><br>
								<span class="header-title">Administration</span>
							</div>
							<div class="pull-left">
								<span class="caret"></span>
							</div>
						</div>
					</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="<?=(($method=='users')?'active':'')?>">
							<a href="<?=site_url("syslog/users")?>">Users
								<!-- <span class="caret"></span> -->
							</a>
							<!-- <ul class="dropdown-menu">
								<li><a href="<?=site_url("syslog/block-users")?>">Block users</a></li>
							</ul> -->
						</li>
						<!-- <li class="dropdown <?=in_array($method, array('about','regulation')) ? 'active' : ''?>">
							<a href="#" class="dropdown-toggle">B??i vi???t<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=site_url("syslog/about")?>">Gi???i thi???u</a></li>
								<li><a href="<?=site_url("syslog/regulation")?>">Quy ch???</a></li>
							</ul>
						</li> -->
						<li class="dropdown <?=in_array($method, array('product','product-category','rating')) ? 'active' : ''?>">
							<a href="#" class="dropdown-toggle">S???n Ph???m<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<!-- <li><a href="<?=site_url("syslog/rating")?>">????nh gi??</a></li> -->
								<li role="separator" class="divider"></li>
								<!-- <li><a href="<?=site_url("syslog/promotion")?>">M?? khuy???n m??i</a></li> -->
								<!-- <li role="separator" class="divider"></li> -->
								<li><a href="<?=site_url("syslog/product-category")?>">Danh m???c</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="<?=site_url("syslog/product/0")?>">T???t c??? s???n ph???m </a></li>
								<? //gen_category_menu($product_categories, $this, 'product'); ?>
							</ul>
						</li>
						<li class="dropdown <?=in_array($method, array('box','enter-box')) ? 'active' : ''?>">
							<a href="#" class="dropdown-toggle">????n H??ng<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=site_url("syslog/booking")?>">Danh s??ch ????n h??ng</a></li>
								<!-- <li><a href="<?=site_url("syslog/booking/add")?>">T???o ????n h??ng</a></li> -->
								<!-- <li><a href="<?=site_url("syslog/booking/view-booking")."?fromdate=".date('Y-m-d',strtotime("-7 days"))."&todate=".date('Y-m-d')?>">Th???ng k?? ng?????i t???o ????n</a></li> -->
								<!-- <li><a href="<?=site_url("syslog/booking-phone")?>">T??m ki???m s??? ??i???n tho???i</a></li> -->
							</ul>
						</li>
						<!-- <li class="<?=(($method=='statistic')?'active':'')?>"><a href="<?=site_url("syslog/statistic")?>">Th???ng k??</a></li> -->
						<!-- <li class="dropdown <?=in_array($method, array('box','enter-box')) ? 'active' : ''?>">
							<a href="#" class="dropdown-toggle">Kho h??ng<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=site_url("syslog/enter-box/0/add")?>">Nh???p kho</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="<?=site_url("syslog/box")?>">Ki???m kho</a></li>
							</ul>
						</li> -->
						<li class="dropdown <?=in_array($method, array('content')) ? 'active' : ''?>">
							<a href="<?=site_url("syslog/content")?>" class="dropdown-toggle">Gi???i ?????u</a>
						</li>
						<li class="dropdown <?=in_array($method, array('service','service-category')) ? 'active' : ''?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">D???ch v???<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=site_url("syslog/service-category")?>">Danh m???c</a></li>
								<li role="separator" class="divider"></li>
								<? foreach ($service_categories as $service_category) { ?>
								<li><a href="<?=site_url("syslog/service/$service_category->id")?>"><?=$service_category->name?></a></li>
								<? } ?>
							</ul>
						</li>
						<li class="<?=(($method=='slide')?'active':'')?>"><a href="<?=site_url("syslog/slide")?>">Slide</a></li>
						<li class="<?=(($method=='contact')?'active':'')?>"><a href="<?=site_url("syslog/contact")?>">Li??n h???</a></li>
						<? if ($admin->user_type == USR_SUPPER_ADMIN) { ?>
						<li class="dropdown <?=((in_array($method, array('mail', 'sub-mail')))?'active':'')?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mail <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=site_url("syslog/sub-mail")?>">????ng k?? mail</a></li>
								<li><a href="<?=site_url("syslog/mail")?>">Mail ???? g???i</a></li>
							</ul>
						</li>
						<!-- <li class="dropdown <?=((in_array($method, array('page-meta-tags', 'page-redirects')))?'active':'')?>">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SEO <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=site_url("syslog/page-meta-tags")?>">Page Meta Tags</a></li>
								<li><a href="<?=site_url("syslog/page-redirects")?>">Page Redirects</a></li>
							</ul>
						</li> -->
						<li class="<?=(($method=='history')?'active':'')?>"><a href="<?=site_url("syslog/history")?>">Log</a></li>
						<li class="<?=(($method=='settings')?'active':'')?>"><a href="<?=site_url("syslog/settings")?>">C??i ?????t</a></li>
						<? } ?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#" class="navbar-link" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$this->session->admin->fullname?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="<?=site_url("syslog/logout")?>"><i class="fa fa-sign-out"></i> ????ng xu???t</a></li>
							</ul>
						</li>
						<?
							foreach ($user_onlines as $user_online) {
								if (($user_online->id != $this->session->admin->id) && (date($this->config->item("log_date_format"), strtotime($user_online->last_activity)) >= date($this->config->item("log_date_format"), strtotime("-30 minutes")))) {
						?>
						<li>
							<a href="#" title="<?=$user_online->fullname?>">
								<? if (!empty($user_online->avatar)) { ?>
								<img class="img-circle" src="<?=$user_online->avatar?>" width="20px">
								<? } else { ?>
								<img class="img-circle" src="<?=IMG_URL?>no-avatar.gif" width="20px">
								<? } ?>
								<? if (date($this->config->item("log_date_format"), strtotime($user_online->last_activity)) >= date($this->config->item("log_date_format"), strtotime("-10 minutes"))) { ?>
								<sup style="margin-left: -6px;"><i class="fa fa-circle" style="color: #5cb85c;"></i></sup>
								<? } else if (date($this->config->item("log_date_format"), strtotime($user_online->last_activity)) >= date($this->config->item("log_date_format"), strtotime("USR_SUPPER_ADMIN0 minutes"))) { ?>
								<sup style="margin-left: -6px;"><i class="fa fa-circle" style="color: orange;"></i></sup>
								<? } else { ?>
								<sup style="margin-left: -6px;"><i class="fa fa-circle" style="color: #afafaf;"></i></sup>
								<? } ?>
							</a>
						</li>
						<?
								}
							}
						?>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</div>
<?
	function gen_category_menu($product_categories, $obj, $method) {
		foreach ($product_categories as $product_category) {
			$child_category_info = new stdClass();
			$child_category_info->parent_id = $product_category->id;
			$child_categories = $obj->m_product_category->items($child_category_info,null,null,null,'order_num','ASC');
			if (!empty($child_categories)) {
				echo '<li class="dropdown-submenu">
						<a href="'.site_url("syslog/{$method}/{$product_category->id}").'" class="dropdown-toggle">'.$product_category->name.' - <span style="color:#2196f3">'.$product_category->code.'</span></a>
						<ul class="dropdown-menu">';
						gen_category_menu($child_categories, $obj, $method);
				echo '	</ul>
					</li>';
			} else {
				echo '<li><a href="'.site_url("syslog/{$method}/{$product_category->id}").'">'.$product_category->name.' - <span style="color:#2196f3">'.$product_category->code.'</span></a></li>';
			}
		}
	}
?>