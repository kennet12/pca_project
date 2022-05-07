<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chi_tiet_san_pham extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Sản phẩm" => site_url("san-pham")));
	}
	public function index($alias) {
		$item				= $this->m_product->load($alias);
		if (!empty($item)) {
			$list_cateid = json_decode($item->category_id);
			foreach ($list_cateid as $cateid) {
				$category = $this->m_product_category->load($cateid);
				$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$category->name}" => site_url("san-pham")."?danh_muc={$category->id}"));
			}
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->title}" => "#"));
			
			$info 				= new stdClass();
			$info->product_id 	= $item->id;
			$item->photo		= $this->m_product_gallery->items($info);
			$item->product_type	= $this->m_product_type->items($info);

			$info 					= new stdClass();
			$info->category_id 		= $category->id;
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
			$related_products		= $this->m_product->relative_items($select,$info,$item->id,1,6);
			
			$view_data["item"] 				= $item;
			$view_data["related_products"] 	= $related_products;
			$view_data["breadcrumb"] 		= $this->_breadcrumb;

			$tmpl_content = array();
			$tmpl_content["content"]	= $this->load->view("product/detail", $view_data, TRUE);
			$tmpl_content["title"]		= $item->title;
			$tmpl_content["meta_key"]	= $item->meta_key;
			$tmpl_content["meta_img"]	= !empty($item->photo[0]->file_path)?$item->photo[0]->file_path:null;
			$tmpl_content["meta_des"]	= $item->meta_des;
			$this->load->view("layout/view", $tmpl_content);
		} else {
			redirect(site_url('error404'),'back');
		}
	}
}
?>