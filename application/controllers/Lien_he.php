<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lien_he extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Liên hệ" => site_url($this->util->slug($this->router->fetch_class()))));
	}

	public function index ()
	{
		$boxs = $this->m_box_detail->items();
		foreach($boxs as $box){
			$this->m_box_detail->update(array("quantity_box"=>$box->quantity),array("id"=>$box->id));
		}
		// $this->util->codeOTP('0859322224','tran ngoc thien nhi');
		//
		// $this->util->post_data(
		// 	'https://globalapi.nxcloud.com/mtsend',
		// 	'"appkey":"p16GQDjX","secretkey":"957Y50eY","phone":"0859322224","content":"12345 la ma xac thuc cua ban"',
		// 	'_gcl_aw=GCL.1623988349.Cj0KCQjw5auGBhDEARIsAFyNm9Ee1s9Ll3GUpHmBa6B-i-e-ddbOywaFAlTDgqgKaFjTfIkQa9KPPuwaApO8EALw_wcB; _gcl_au=1.1.2110535465.1623988349'
		// );
		$view_data = array();
		// $view_data['breadcrumb'] 	= $this->_breadcrumb;

		$tmpl_content = array();
		$tmpl_content["title"] = 'Liên hệ';
		$tmpl_content["content"] = $this->load->view("contact/index", $view_data, TRUE);
		$this->load->view("layout/view", $tmpl_content);
	}
	public function ajax_contact () {
		$name 		= $this->input->post('name');
		$phone 		= $this->input->post('phone');
		$email 		= $this->input->post('email');
		$content 	= nl2br($this->input->post('content'));
		$recaptcha 	= $this->input->post('g-recaptcha-response');

		$result = FALSE;

		if (isset($recaptcha) && $recaptcha) {
			if((!is_null($name)) 
				&& (!is_null($phone))
				&& (!is_null($email))) {
				$data = array (
					'name'		 => $name,
					'phone'		 => $phone,
					'email'		 => $email,
					'content'	 => $content
					);
				$result = $this->m_contact->add($data);
			}
		}
		if ($result) {
			$tpl_data = array(
				"FULLNAME"	=> $name,
				"EMAIL"		=> $email,
				"PHONE"		=> $phone,
				"CONTENT"	=> $content,
			);

			$message = $this->mail_tpl->contact_admin($tpl_data);

			$mail_data = array(
				"subject"		=> "Hỗ Trợ - ".SITE_NAME,
				"from_sender"	=> $email,
				"name_sender"	=> SITE_NAME,
				"to_receiver"	=> MAIL_INFO,
				"message"		=> $message
			);
			$this->mail->config($mail_data);
			$this->mail->sendmail();

			$message = $this->mail_tpl->contact($tpl_data);

			$mail_data = array(
				"subject"		=> "Hỗ Trợ - ".SITE_NAME,
				"from_sender"	=> MAIL_INFO,
				"name_sender"	=> SITE_NAME,
				"to_receiver"	=> $email,
				"message"		=> $message
			);
			$this->mail->config($mail_data);
			$this->mail->sendmail();

			$this->session->set_flashdata("info", "Gửi liên hệ thành công");
			redirect(site_url("lien-he"), "back");
		} else {
			$this->session->set_flashdata("error", "Đã xảy ra lổi vui long nhập lại");
			redirect(site_url("lien-he"), "back");
		}
	}
}
?>