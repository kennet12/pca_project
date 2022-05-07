<?
$setting = $this->m_setting->load(1);
// if (!empty($_GET['af']) && empty($_COOKIE['af'])){
//   setcookie("af", $_GET['af'], time() + (10 * 365 * 24 * 60 * 60));
//   $affiliate_item = $this->m_affiliate_analytic->load_item($_GET['af']);
//   if(!empty($affiliate_item)){
//     $data = array(
//       'approach' => $affiliate_item->approach+1,
//     );
//     $this->m_affiliate_analytic->update($data,array("id"=>$affiliate_item->id));
//   }
// }
if (empty($meta['title'])) {
	$meta['title'] = $setting->company_name;
}
if (empty($meta['keywords'])) {
	$meta['keywords'] = $setting->tags;
}
if (empty($meta['description'])) {
	$meta['description'] = "Nguyên Anh Fruit, chuyên cung cấp các loại trái cây tươi nhập khẩu và trong nước.";
}
if (empty($meta['author'])) {
	$meta['author'] = SITE_NAME;
}
if (!empty($meta_title)) {
	$meta['title'] = $meta_title;
}
if (!empty($meta_key)) {
	$meta['keywords'] = $meta_key;
}
if (!empty($meta_des)) {
	$meta['description'] = $meta_des;
}
$meta_img = !empty($meta_img)?BASE_URL.str_replace('./','/',$meta_img):IMG_URL.'fruits.jpg'
?>
<title><?=$meta['title']?></title>
<meta name="google" content="notranslate">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Cache-Control" content="must-revalidate">
<meta http-equiv="Expires" content="<?=gmdate("d/m/Y - H:i:s", time() + (7*60*60))?> GMT">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="description" content="<?=$meta['description']?>" />
<meta name="keywords" content="<?=$meta['keywords']?>" />
<link rel="canonical" href="<?=BASE_URL.$_SERVER["REQUEST_URI"]?>">
<link rel="preload" href="<?=$meta_img?>" as="image" media="(max-width: 600px)" type="image/jpeg">
<meta property="og:title" content="<?=$meta['title']?> | <?=SITE_NAME?>">
<meta property="og:description" content="<?=$meta['description']?>">
<meta property="og:image" content="<?=$meta_img?>">
<meta property="og:url" content="<?=BASE_URL.$_SERVER["REQUEST_URI"]?>">
<meta property="og:site_name" content="nguyenanhfruit.vn">
<meta property="og:image:type" content="image/jpeg"/>
<meta property="og:type" content="website">
<meta property="og:locale" content="vi_VN">
<meta name="robots" content="index,follow" />
<meta name="googlebot" content="index,follow" />
<meta name="author" content="<?=$meta['author']?>" />

<link rel="SHORTCUT ICON" href="<?=BASE_URL?>/favicon.ico?v=<?=CACHE_TIME?>"/>
<link rel="manifest" href="<?=BASE_URL?>/manifest.json">
<link rel="icon" sizes="192x192" href="<?=IMG_URL?>launcher/192x192.jpg?v=<?=CACHE_TIME?>">
<link rel="icon" sizes="128x128" href="<?=IMG_URL?>launcher/128x128.jpg?v=<?=CACHE_TIME?>">
<link rel="apple-touch-icon" sizes="128x128" href="<?=IMG_URL?>launcher/128x128.jpg?v=<?=CACHE_TIME?>">
<link rel="apple-touch-icon-precomposed" sizes="128x128" href="<?=IMG_URL?>launcher/128x128.jpg?v=<?=CACHE_TIME?>">
<link rel="stylesheet" type="text/css" media="screen,all" href="<?=CSS_URL?>style.css?cr=<?=CACHE_RAND?>" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="<?=JS_URL?>util.js?cr=<?=CACHE_RAND?>"></script>
<script src="<?=JS_URL?>lazysizes.js?v=<?=CACHE_TIME?>" async="async"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<script type="text/javascript">
	var BASE_URL = "<?=BASE_URL?>";
</script>