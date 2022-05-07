<?php
class Dang_tin extends CI_Controller{

	var $_breadcrumb = array();
	
	function __construct(){
		parent::__construct();
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Đăng tin" => site_url($this->util->slug($this->router->fetch_class()))));
	}

	public function index (){
		
		$view_data = array();
		$view_data["breadcrumb"] 	= $this->_breadcrumb;
		$view_data['items'] 		= $this->cart->contents();

		$tmpl_content				= array();
		$tmpl_content['title'] 		= 'Giỏ hàng';
		$tmpl_content['content'] 	= $this->load->view("cart/index", $view_data, true);
		$this->load->view('layout/view', $tmpl_content);
	}
}