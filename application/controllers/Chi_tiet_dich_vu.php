<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chi_tiet_dich_vu extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Sản phẩm" => site_url("san-pham")));
	}
	public function index($alias, $id=null) {
		// $item				= $this->m_product->load($alias);
		// if (!empty($item)) {
			if (!empty($id)){
				$view_data = array();	
				// $view_data["item"] 				= $item;
				// $view_data["related_products"] 	= $related_products;
				// $view_data["breadcrumb"] 		= $this->_breadcrumb;

				$tmpl_content = array();
				$tmpl_content["content"]	= $this->load->view("service/detail", $view_data, TRUE);
				// $tmpl_content["title"]		= $item->title;
				// $tmpl_content["meta_key"]	= $item->meta_key;
				// $tmpl_content["meta_img"]	= !empty($item->photo[0]->file_path)?$item->photo[0]->file_path:null;
				// $tmpl_content["meta_des"]	= $item->meta_des;
				$this->load->view("layout/view", $tmpl_content);
			} else {
				$view_data = array();	
				// $view_data["item"] 				= $item;
				// $view_data["related_products"] 	= $related_products;
				// $view_data["breadcrumb"] 		= $this->_breadcrumb;

				$tmpl_content = array();
				$tmpl_content["content"]	= $this->load->view("service/list", $view_data, TRUE);
				// $tmpl_content["title"]		= $item->title;
				// $tmpl_content["meta_key"]	= $item->meta_key;
				// $tmpl_content["meta_img"]	= !empty($item->photo[0]->file_path)?$item->photo[0]->file_path:null;
				// $tmpl_content["meta_des"]	= $item->meta_des;
				$this->load->view("layout/view", $tmpl_content);
			}
			
		// } else {
		// 	redirect(site_url('error404'),'back');
		// }
	}
}
?>