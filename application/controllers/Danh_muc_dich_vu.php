<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Danh_muc_dich_vu extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

	}
	public function index($id) {
		$category	= $this->m_service_category->load($id);
		$info = new stdClass();
		$info->category_id = $category->id;
		$view_data = array();	
		$view_data["category"] 	= $category;
		$view_data["items"] 	= $this->m_service->items($info,1);

		$tmpl_content = array();
		$tmpl_content["content"]	= $this->load->view("service/list", $view_data, TRUE);
		// $tmpl_content["title"]		= $item->title;
		// $tmpl_content["meta_key"]	= $item->meta_key;
		// $tmpl_content["meta_img"]	= !empty($item->photo[0]->file_path)?$item->photo[0]->file_path:null;
		// $tmpl_content["meta_des"]	= $item->meta_des;
		$this->load->view("layout/view", $tmpl_content);
	}
}
?>