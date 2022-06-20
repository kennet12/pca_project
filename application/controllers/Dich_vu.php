<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dich_vu extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Dịch vụ" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	public function index($id=null) {

		$view_data = array();
		$view_data["items"] 	= $this->m_service_category->items(null,1,null,null,'id','ASC');

		$tmpl_content = array();
		$tmpl_content["title"]   = 'Dịch vụ';
		$tmpl_content["content"]   = $this->load->view("service/index", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
	}
}
?>