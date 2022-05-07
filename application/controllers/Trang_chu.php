<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trang_chu extends CI_Controller {

	public function index()
	{
		// $token_login = json_decode($_COOKIE['token_login']);
		$info = new stdClass();
		$info->show_cate = 1;
		// $product_categories = $this->m_product_category->items($info,1,null,null,'order_num','ASC');

		$view_data = array();
		// $view_data["product_categories"] 	= $product_categories;
		// $view_data["contents"] 				= $this->m_contents->items(null,1,8);
		// $view_data["qas"] 					= $this->m_question->items(null,1);

		$tmpl_content = array();
		$tmpl_content["content"]   = $this->load->view("home", $view_data, TRUE);
		$this->load->view("layout/main", $tmpl_content);
	}
	function subscribe_email() {
		$email = $this->input->post('email');
		$info = new stdClass();
		$info->email = $email;
		if (empty($this->m_subscribe->items($info))) {
			$this->m_subscribe->add(array('email' => $email));
			echo 1;
		} else {
			echo 0;
		}
	}
}
?>