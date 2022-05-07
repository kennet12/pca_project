<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quen_mat_khau extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Quên mật khẩu" => site_url("quen-mat-khau")));
	}
	public function index($code_confirm) {
		$user = $this->m_user->forgot_password($code_confirm,1);
        
		if (empty($user)) {
			redirect(site_url(""));
		}
		$task = $this->input->post("task");
		if (!empty($task)) {
			if ($task == "save") {
				$new_password			= $this->input->post("new_password");
				$confirm_new_password	= $this->input->post("confirm_new_password");


				if (empty($new_password)) {
					$this->session->set_flashdata("error", "Không bỏ trống mật khẩu .");
					redirect(current_url(), "back");
				}
                else if (empty($confirm_new_password)) {
					$this->session->set_flashdata("error", "Không bỏ trống xác nhận mật khẩu.");
					redirect(current_url(), "back");
				}
				else if ($new_password != $confirm_new_password) {
					$this->session->set_flashdata("error", "Xác nhận lại mật khẩu không trùng khớp.");
					redirect(current_url(), "back");
				}
				else if (strlen(trim($new_password)) < 6) {
					$this->session->set_flashdata("error", "Mật khẩu mới phải có ít nhất 6 ký tự.");
					redirect(current_url(), "back");
				}
				else {
					$data = array(
						"password"		=> md5($new_password),
						"password_text"	=> $new_password,
                        "code_confirm"	=> NULL
					);
					$where = array(
						"id" => $user->id
					);
					$this->m_user->update($data, $where);

					$this->session->set_flashdata("success", "Mật khẩu đã được thay đổi.");
					redirect(site_url("tai-khoan"), "back");
				}
			}
		}

		$view_data = array();
		$view_data["breadcrumb"] = $this->_breadcrumb;

		$tmpl_content = array();
		$tmpl_content["title"] = 'Quên Mật Khẩu';
		$tmpl_content["content"] = $this->load->view("account/forgot_password", $view_data, true);
		$this->load->view("layout/view", $tmpl_content);
	}
}
?>