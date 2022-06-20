<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$method = str_replace(BASE_URL.'/','',$url);
$method = str_replace(BASE_URL,'',$method);
$method = str_replace('.html','',$method);
$method = explode('/',$method)[0];



$route['default_controller'] = 'trang_chu';
$route['404_override'] = 'error404';
$route['translate_uri_dashes'] = TRUE;

$array_route = array(
    'dich-vu',
    'tim-kiem',
    'gioi-thieu',
    'lien-he',
    'dang-tin',
    'dat-hang',
    'tai-khoan',
    'quen-mat-khau',
    'syslog',
    'error404',
    'call-service',
    'hoi-dap',
    'quy-che',
    'check-qrcode',
    'tra-cuu-don-hang',
);
$route['dich-vu'] 					        = "dich-vu/index";
$route['tin-tuc'] 		    		        = "tin-tuc/index";
$route['tin-tuc/(:any)'] 		    		= "tin-tuc/index/$1";
$route['tin-tuc/(:any)/(:any)'] 		    = "tin-tuc/index/$1/$2";
$route['quen-mat-khau/(:any)'] 		        = "quen-mat-khau/index/$1";
$route['tim-kiem'] 				            = "tim-kiem/index";
$route['tim-kiem/(:any)'] 				    = "tim-kiem/ajax-search";
$route['hoi-dap/(:any)'] 				    = "hoi-dap/index/$1";
$route['check-qrcode/(:any)'] 			    = "check-qrcode/index/$1";
$route['blog'] 				                = "blog/index";
$route['blog/chi-tiet'] 				    = "blog/chi-tiet";
$route['lien-he/ajax-contact']				= 'lien-he/ajax-contact';
$route['tra-cuu-don-hang/(:any)/(:any)']    = 'tra-cuu-don-hang/index/$1/$2';
$route['call-service/send-rating']			= 'call-service/send-rating';
$route['call-service/load-rating']			= 'call-service/load-rating';
$route['call-service/send-reply-rating']	= 'call-service/send-reply-rating';
$route['call-service/optimize-image']	    = 'call-service/optimize-image';
$route['call-service/qrcode']	            = 'call-service/qrcode';
$route['call-service/like-product']	        = 'call-service/like-product';

if(!in_array($method, $array_route)) {
    $route['dich-vu-(:any)'] 				= "chi-tiet-dich-vu/index/$1/$2";
    $route['(:any)'] 						= "danh-muc-dich-vu/index/$1";
}





