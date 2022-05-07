<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class San_pham extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Sản phẩm" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	public function index($id=null) {

		if (!isset($_GET['trang']) || (($_GET['trang']) < 1)) {
			$page = 1;
		}
		else {
			$page = $_GET['trang'];
		}
		$offset   = ($page - 1) * 25;

		$info = new stdClass();

		$info->list_category= !empty($_GET['danh_muc'])?explode(',',$_GET['danh_muc']):null;
		$info->price 		= !empty($_GET['gia'])?explode(',',$_GET['gia']):null;
		$sort 				= !empty($_GET['sort'])?explode('-',$_GET['sort']):null;
		$order_by 			= !empty($sort[0]) ? $sort[0] : null;
		$sort_by 			= !empty($sort[1]) ? $sort[1] : null;

		$select = "p.id";
		$total_items = $this->m_product->get_list_category_items($select,$info, 1);

		$select = "p.id,
		p.title,
		p.alias,
		p.category_id,
		p.code,
		p.rating_point,
		p.rating_cmt,
		p.meta_title,
		p.meta_key,
		p.meta_des,
		CONVERT(JSON_EXTRACT(t.price, '$[0]'), DECIMAL) as price,
		CONVERT(JSON_EXTRACT(t.sale, '$[0]'), DECIMAL) as sale,
		t.typename,
		g.file_path";
		$items = $this->m_product->get_list_category_items($select,$info, 1, 25, $offset, $order_by, $sort_by);
		$total = !empty($total_items)?count($total_items):0;
		$total_page = ceil($total/25);

		$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
		$url = str_replace("?trang={$page}", '?', $url);
		$url = str_replace("&trang={$page}", '', $url);

		$pagination = $this->util->pagination($url, $total, 25);
		$info_cate = new stdClass();
		$info_cate->parent_id = 0;

		$view_data = array();
		$view_data["categories"] 	= $this->m_product_category->items($info_cate,1,null,null,'order_num','ASC');
		$view_data["items"] 		= $items;
		$view_data["total_page"] 	= $total_page;

		$view_data["total"] 		= $total;
		$view_data["breadcrumb"] 	= $this->_breadcrumb;
		$view_data["pagination"] 	= $pagination;

		$tmpl_content = array();
		$tmpl_content["title"]   = 'Sản phẩm';
		$tmpl_content["content"]   = $this->load->view("product/index", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
	}
}
?>