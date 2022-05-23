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
		</header>
		<? require_once(APPPATH."views/module/notification.php"); ?>
		<section id="<?=$this->util->slug($this->router->fetch_class())?>">
			<?// require_once(APPPATH."views/module/breadcrumb.php"); ?>
			<?=$content?>
		</section>
		<footer>
			<? require_once(APPPATH."views/module/footer.php"); ?>
		</footer>
		<? require_once(APPPATH."views/module/dialog.php"); ?>
	</body>
</html>
