<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Giai_dau extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

	}
	public function index($id=null) {
		if (!empty($id)) {
			$item = $this->m_contents->load($id);
			$view_data = array();
			$view_data['item'] 			= $item;

			$tmpl_content = array();
			$tmpl_content["title"]   	= $item->meta_title;
			$tmpl_content["meta_img"]	= !empty($item->thumbnail)?$item->thumbnail:null;
			$tmpl_content["meta_key"]	= $item->meta_key;
			$tmpl_content["meta_des"]	= $item->meta_des;
			$tmpl_content["content"]   = $this->load->view("show/detail", $view_data, TRUE);
			$this->load->view("layout/view", $tmpl_content);
		} else {
			$view_data = array();
			$view_data['items'] 			= $this->m_contents->items(null,1);

			$tmpl_content = array();
			$tmpl_content["title"]   	= 'Giải đấu';
			$tmpl_content["meta_img"]	= !empty($item->thumbnail)?$item->thumbnail:null;
			$tmpl_content["meta_key"]	= 'Giải đấu hay nhất hành tinh';
			$tmpl_content["meta_des"]	= 'Giải đấu hay nhất hành tinh';
			$tmpl_content["content"]   = $this->load->view("show/index", $view_data, TRUE);
			$this->load->view("layout/view", $tmpl_content);
		}
	}
}
?>