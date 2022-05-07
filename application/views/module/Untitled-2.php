<?
$setting = $this->m_setting->load(1);
$meta_info = new stdClass();
$meta_info->url = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
$configured_metas = $this->m_meta->items($meta_info, 1);

if (empty($meta['title'])) {
	$meta['title'] = $setting->company_name;
}
if (empty($meta['keywords'])) {
	$meta['keywords'] = $setting->tags;
}
if (empty($meta['description'])) {
	$meta['description'] = "Nguyên Anh Fruit, chuyên cung cấp trái cây";
}
if (empty($meta['author'])) {
	$meta['author'] = SITE_NAME;
}
if (!empty($title)) {
	$meta['title'] = $title;
}
if (!empty($meta_key)) {
	$meta['keywords'] = $meta_key;
}
if (!empty($meta_des)) {
	$meta['description'] = $meta_des;
}
if (!empty($configured_metas)) {
	$configured_meta = array_shift($configured_metas);
	$meta['title'] = $configured_meta->title;
	$meta['keywords'] = $configured_meta->keywords;
	$meta['description'] = $configured_meta->description;
}

?>
<title><?=$meta['title']?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="google" content="notranslate">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Cache-Control" content="must-revalidate">
<meta http-equiv="Expires" content="<?=gmdate("d/m/Y - H:i:s", time() + (7*60*60))?> GMT">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?=$meta['description']?>" />
<meta name="keywords" content="<?=$meta['keywords']?>" />
<meta name="news_keywords" content="<?=$meta['keywords']?>" />
<meta property="og:title" content="<?=$meta['title']?>">
<meta property="og:description" content="<?=$meta['description']?>">
<meta property="og:image" content="<?=!empty($meta_img)?$meta_img:IMG_URL.'nguyenanh-fruit.jpeg'?>">
<meta property="og:url" content="<?=BASE_URL.$_SERVER["REQUEST_URI"]?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<? if (strtolower($this->router->fetch_class()) == "syslog") { ?>
<meta name="robots" content="noindex,nofollow" />
<? } else { ?>
<meta name="robots" content="index,follow" />
<meta name="googlebot" content="index,follow" />
<? } ?>
<meta name="author" content="<?=$meta['author']?>" />
<meta name="google-site-verification" content="dLe5lS5OIA58VpGjFhqxkP1lguyw-VPplvDXQEEnQ-s" />

<link rel="SHORTCUT ICON" href="<?=BASE_URL?>/favicon.ico?v=<?=CACHE_TIME?>"/>
<link rel="manifest" href="<?=BASE_URL?>/manifest.json">
<link rel="icon" sizes="192x192" href="<?=IMG_URL?>launcher/192x192.jpg?v=<?=CACHE_TIME?>">
<link rel="icon" sizes="128x128" href="<?=IMG_URL?>launcher/128x128.jpg?v=<?=CACHE_TIME?>">
<link rel="apple-touch-icon" sizes="128x128" href="<?=IMG_URL?>launcher/128x128.jpg?v=<?=CACHE_TIME?>">
<link rel="apple-touch-icon-precomposed" sizes="128x128" href="<?=IMG_URL?>launcher/128x128.jpg?v=<?=CACHE_TIME?>">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="//fonts.googleapis.com/css?family=Roboto:400,500,600,700" rel="stylesheet" type="text/css" media="all">
<link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>front-end/bootstrap.min.css?v=<?=CACHE_TIME?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>front-end/common.css?v=<?=CACHE_TIME?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>front-end/owl.carousel.min.css?v=<?=CACHE_TIME?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>front-end/owl.theme.default.css?v=<?=CACHE_TIME?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>front-end/slick.css?v=<?=CACHE_TIME?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>front-end/jquery.mmenu.all.css?v=<?=CACHE_TIME?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>front-end/layout.css?v=<?=CACHE_TIME?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>front-end/theme.css?v=<?=CACHE_TIME?>" rel="stylesheet" type="text/css" media="all">
<link href="<?=CSS_URL?>front-end/responsive.css?v=<?=CACHE_TIME?>" rel="stylesheet" type="text/css" media="all">
  
    
<script>
  var theme = {
    strings: {
      select_options: "Select Options",
      addToCart: "Add to cart",
      soldOut: "Sold out",
      unavailable: "Unavailable",
      showMore: "Show More",
      showLess: "Show Less",
      addressError: "Error looking up that address",
      addressNoResults: "No results for that address",
      addressQueryLimit: "You have exceeded the Google API usage limit. Consider upgrading to a \u003ca href=\"https:\/\/developers.google.com\/maps\/premium\/usage-limits\"\u003ePremium Plan\u003c\/a\u003e.",
      authError: "There was a problem authenticating your Google Maps account.",
      total: "Total",
      spend: "Spend",
      content_threshold: "Congratulations! You\u0026#39;ve got free shipping!",
      spend__html: "for free shipping",
      check_out: "Check out",
      remove: "Remove",
      remove_wishlist: "Remove Wishlist",
      add_to_wishlist: "translation missing: en.wishlist.wishlist.add_to_wishlist",
      added_to_wishlist: "translation missing: en.wishlist.wishlist.added_to_wishlist",
      view_cart: "View Cart"
    },
    moneyFormat: "\u003cspan class=\"money\"\u003e${{amount}}\u003c\/span\u003e",
    moneyFormatnojson: "\u003cspan class=\"money\"\u003e${{amount}}\u003c\/span\u003e",
    freeshipping_value: 200,
    show_free_shipping: true
  }
</script>

<script src="<?=JS_URL?>jquery.min.js?v=<?=CACHE_TIME?>" type="text/javascript"></script>
<script src="<?=JS_URL?>front-end/lazysizes.js?v=<?=CACHE_TIME?>" async="async"></script>
<script src="<?=JS_URL?>front-end/vendor.js?v=<?=CACHE_TIME?>" defer="defer"></script>
<script src="<?=JS_URL?>front-end/history.js?v=<?=CACHE_TIME?>" type="text/javascript"></script>
<script src="<?=JS_URL?>front-end/jquery.owl.carousel.min.js?v=<?=CACHE_TIME?>" defer="defer"></script>
<script src="<?=JS_URL?>front-end/jquery.mmenu.all.min.js?v=<?=CACHE_TIME?>" defer="defer"></script>
<script src="<?=JS_URL?>util.js?v=<?=CACHE_TIME?>" type="text/javascript"></script>
<script src="<?=JS_URL?>front-end/theme.js?v=<?=CACHE_TIME?>" defer="defer"></script>
<script src="<?=JS_URL?>front-end/global.js?v=<?=CACHE_TIME?>" defer="defer"></script>

<script type="text/javascript">
	var BASE_URL = "<?=BASE_URL?>";
</script>