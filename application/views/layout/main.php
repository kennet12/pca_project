<!DOCTYPE html>
<html lang="vi-VN">
	<head>
		<? require_once(APPPATH."views/module/head_cdn.php"); ?>
	</head>
	<?
		$user_online = $this->session->userdata("user");
		$copy = 'oncopy="return false" oncut="return false"';
		if (!empty($user_online) && ($user_online->user_type < 0)) {
			$copy = '';
		}
	?>
	<body <?=$copy?>>
		<header>
			<? require_once(APPPATH."views/module/header.php"); ?>
			<link rel="stylesheet" type="text/css" media="screen,all" href="<?=CSS_URL?>owl.carousel.min.css?cr=<?=date('Ymdhis')?>" />
			<link rel="stylesheet" type="text/css" media="screen,all" href="<?=CSS_URL?>owl.theme.default.min.css?cr=<?=date('Ymdhis')?>" />
			<script type="text/javascript" src="<?=JS_URL?>owl.carousel.min.js?cr=<?=date('Ymdhis')?>"></script>
		</header>
		<? require_once(APPPATH."views/module/notification.php"); ?>
		<div id="<?=$this->util->slug($this->router->fetch_class())?>">
			<? require_once(APPPATH."views/module/slide.php"); ?>
			<?=$content?>
		</div>
		<footer>
			<? require_once(APPPATH."views/module/footer.php"); ?>
		</footer>
		<? require_once(APPPATH."views/module/dialog.php"); ?>
	</body>
</html>
