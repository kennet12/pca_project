<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tai_khoan extends CI_Controller {

	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$method = $this->util->slug($this->router->fetch_method());
		$this->load->library("cart");

		if (!in_array($method, array("dang-tin", "dang-ky", "dang-nhap", "lay-lai-mat-khau", "dang-xuat"))) {
			$this->util->require_user_login();
			$user = $this->session->userdata("user");
			// if (!empty($_COOKIE['token_login'])){
			// 	$user = json_decode($_COOKIE['token_login']);
			// }
			if (!$user->active) {
				// $this->session->set_flashdata("error", "Tài khoản của bạn đang được xem xét.");
				redirect(site_url("tai-khoan/dang-nhap"));
			}
			else if ($user->deleted) {
				// $this->session->set_flashdata("error", "Tài khoản của bạn không có hoặc đã xoá.");
				redirect(site_url("tai-khoan/dang-nhap"));
			}
		}

		if (isset($this->session->user->signin_date)) {
			if (($this->session->user->event_signin_everyday == 0) && ($this->session->user->signin_date == date("Y/m/d"))) {
				$this->session->user->event_signin_everyday = 1;
				$this->event->event_signin_everyday($this->session->user->id);
			}
			if (($this->session->user->event_signin_everyday == 1) && ($this->session->user->signin_date < date("Y/m/d"))) {
				$this->session->user->signin_date = date("Y/m/d");
				$this->event->event_signin_everyday($this->session->user->id);
			}
			if ($this->session->user->signin_date > date("Y/m/d")) {
				$this->session->user->signin_date = date("Y/m/d");

			}
		}
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tài Khoản" => site_url($this->util->slug($this->router->fetch_class()))));
	}

	public function index()
	{
		redirect(site_url("tai-khoan/lich-su-don-hang"));
		// $info = new stdClass();
		// $info->user_id = $this->session->user->id;
		// // $bookings = $this->m_booking->items($info);

		// $view_data = array();
		// // $view_data["bookings"] 		= $bookings;
		// $view_data["breadcrumb"] 	= $this->_breadcrumb;
		// // $view_data['cart'] 			= $this->cart->contents();

		// $tmpl_content = array();
		// $tmpl_content["content"] = $this->load->view("account/index", $view_data, true);
		// $tmpl_content["title"] 		= 'Tài khoản';
		// $this->load->view("layout/account", $tmpl_content);
	}
	public function lich_su_don_hang()
	{
		if (!isset($_GET['trang']) || (($_GET['trang']) < 1)) {
			$page = 1;
		}
		else {
			$page = $_GET['trang'];
		}
		$offset   = ($page - 1) * 5;

		$info = new stdClass();
		$info->user_id = $this->session->user->id;
		$total = count($this->m_booking->items($info));
		$bookings = $this->m_booking->items($info, 5, $offset);

		$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
		$url = str_replace("?trang={$page}", '?', $url);
		$url = str_replace("&trang={$page}", '', $url);

		$pagination = $this->util->pagination($url, $total, 5);

		$view_data = array();
		$view_data["bookings"] 		= $bookings;
		$view_data["breadcrumb"] 	= $this->_breadcrumb;
		$view_data["pagination"] 	= $pagination;

		$tmpl_content = array();
		$tmpl_content["content"] = $this->load->view("account/order_list", $view_data, true);
		$tmpl_content["title"] 		= 'Lịch sử đơn hàng';
		$this->load->view("layout/account", $tmpl_content);
	}
	public function dang_tin($type=null) {
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Đăng tin" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));

		if (!empty($type)) {
			if ($type == 'rao-ban') {
				$view_data = array();
				// $view_data["bookings"] 		= $bookings;
				$view_data["breadcrumb"] 	= $this->_breadcrumb;

				$tmpl_content = array();
				$tmpl_content["content"] 	= $this->load->view("account/post/post", $view_data, true);
				$tmpl_content["title"] 		= 'Đăng tin';
				$tmpl_content["meta_title"] = 'Đăng tin';
				$this->load->view("layout/account", $tmpl_content);
			} else if ($type == 'can-mua') {
				$view_data = array();
				// $view_data["bookings"] 		= $bookings;
				$view_data["breadcrumb"] 	= $this->_breadcrumb;

				$tmpl_content = array();
				$tmpl_content["content"] 	= $this->load->view("account/post/buy", $view_data, true);
				$tmpl_content["title"] 		= 'Đăng tin';
				$tmpl_content["meta_title"] = 'Đăng tin';
				$this->load->view("layout/account", $tmpl_content);
			} else {
				redirect(site_url('error404'),'back');
			}
		} else {
			$view_data = array();
			// $view_data["bookings"] 		= $bookings;
			$view_data["breadcrumb"] 	= $this->_breadcrumb;

			$tmpl_content = array();
			$tmpl_content["content"] 	= $this->load->view("account/post", $view_data, true);
			$tmpl_content["title"] 		= 'Đăng tin';
			$tmpl_content["meta_title"] = 'Đăng tin';
			$this->load->view("layout/account", $tmpl_content);
		}
	}

	public function dang_ky()
	{
		$task = $this->input->post("task");
		if (!empty($task)) {
			if ($task == "register") {
				$this->load->library('form_validation');

				$fullname			= $this->input->post("fullname");
				$email				= $this->input->post("email");
				$phone				= $this->input->post("phone");
				$password			= $this->input->post("password");
				
				$count_email = 0;
				$count_phone = 0;
				$this->form_validation->set_rules('new_email', 'Email', 'valid_email');
				if ($this->form_validation->run() == FALSE){
					$count_email +=1;
				}

				if (preg_match('/^0(1\d{9}|1\d{8}|2\d{8}|3\d{8}|4\d{8}|5\d{8}|6\d{8}|7\d{8}|8\d{8}|9\d{8})$/', $phone) == 0){
					$count_phone +=1;
				}

				if (empty($fullname)) {
					$this->session->set_flashdata("error", "Họ và Tên không được trống.");
					redirect(site_url("tai-khoan/dang-ky"), "back");
				}
				else if (empty($email)) {
					$this->session->set_flashdata("error", "Email không được trống.");
					redirect(site_url("tai-khoan/dang-ky"), "back");
				}
				else if (empty($phone)) {
					$this->session->set_flashdata("error", "Số điện thoại không được trống.");
					redirect(site_url("tai-khoan/dang-ky"), "back");
				}
				else if ($count_email != 0)
				{
					$this->session->set_flashdata("error", "Email này không hợp lệ. Vui lòng nhập email khác.");
					redirect(site_url("tai-khoan/dang-ky"), "back");
				}
				else if ($count_phone != 0)
				{
					$this->session->set_flashdata("error", "Số điện thoại không hợp lệ. Vui lòng nhập khác.");
					redirect(site_url("tai-khoan/dang-ky"), "back");
				}
				else if ($this->util->get_block_phone($phone))
				{
					$this->session->set_flashdata("error", "Số điện thoại này đã bị chặn.");
					redirect(site_url("tai-khoan/dang-ky"), "back");
				}
				else if ($this->m_user->get_user_by_email($email)) {
					$this->session->set_flashdata("error", "Email này đã được đăng ký. Vui lòng nhập email khác.");
					redirect(site_url("tai-khoan/dang-ky"), "back");
				}
				else if ($this->m_user->get_user_by_phone($phone)) {
					$this->session->set_flashdata("error", "Số điện thoại này đã được đăng ký. Vui lòng nhập số khác.");
					redirect(site_url("tai-khoan/dang-ky"), "back");
				}
				else if (strlen(trim($password)) < 6) {
					$this->session->set_flashdata("error", "Mật khẩu phải có ít nhất 6 ký tự.");
					redirect(site_url("tai-khoan/dang-ky"), "back");
				}
				else {
					$data = array(
						"fullname"			=> $fullname,
						"email"				=> $email,
						"password"			=> md5($password),
						"password_text"		=> $password,
						"phone"				=> $phone,
					);
					$this->m_user->add($data);
					// Auto Login
					$info = new stdClass();
					$info->phone 	= $phone;
					$info->password = $data['password_text'];

					$user = $this->m_user->user($info);
					
					if ($user != null) {
						$this->m_user->login($phone, $password, '','phone');
						$this->session->set_flashdata("success", "Đăng ký thành công.");
						redirect(BASE_URL, "back");
					}
					else {
						$this->session->set_flashdata("error", "Đã xảy ra lỗi vui lòng đăng ký lại.");
						redirect(site_url("tai-khoan/dang-ky"), "back");
					}
				}
			}
		}
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Đăng ký" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));

		$view_data = array();
		$view_data["breadcrumb"] = $this->_breadcrumb;

		$tmpl_content = array();
		$tmpl_content["content"] 	= $this->load->view("account/register", $view_data, true);
		$tmpl_content["title"] 		= 'Đăng ký';
		$tmpl_content["meta_title"] = 'Đăng ký';
		$this->load->view("layout/login", $tmpl_content);
	}

	public function dang_nhap()
	{
		if (!empty($_COOKIE['token_login'])){
			$token_login = json_decode($_COOKIE['token_login']);
		}
		$this->load->library('session');

		if (!empty($token_login->status)){
			redirect(BASE_URL,'back'); // redirect when logined
		}

		$task = $this->input->post("task");
		if (!empty($task)) {
			if ($task == "login") {
				$uid = $this->input->post("username");
				$password = $this->input->post("password");

				$info = new stdClass();
				$type_uid = $this->util->classify_userid_type($uid);
				if ($type_uid == 'email') {
					$info->email = $uid;
				} else if ($type_uid == 'phone')  {
					$info->phone = $uid;
				}
				$info->password = $password;
				$user = $this->m_user->user($info, 1,1);

				$data = new stdClass();
				$data->username = $uid;
				$this->session->set_flashdata("login", $data);
				if ($user != null) {
					if ($this->m_user->login($uid, $password,'',$type_uid)) {
						redirect(BASE_URL,'back');
					}
				}
				else {
					$this->session->set_flashdata("error", "Đăng nhập không thành công &#128549;");
					redirect(site_url("tai-khoan/dang-nhap"), "back");
				}
			}
			redirect(site_url("tai-khoan"), "back");
		}
		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Đăng Nhập" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));

		$view_data = array();
		$view_data["breadcrumb"] = $this->_breadcrumb;

		$tmpl_content = array();
		$tmpl_content["content"] 	= $this->load->view("account/signin", $view_data, true);
		$tmpl_content["title"] 		= 'Đăng nhập';
		$tmpl_content["meta_title"] = 'Đăng nhập';
		$this->load->view("layout/login", $tmpl_content);
	}

	public function dang_xuat()
	{
		$this->m_user->logout();
		redirect(site_url("tai-khoan"));
	}

	public function lay_lai_mat_khau()
	{
		$task = $this->input->post("task");
		if (!empty($task)) {
			if ($task == "getpass") {
				$email = $this->input->post("email");
				$recaptcha 	= $this->input->post('g-recaptcha-response');
				if (isset($recaptcha) && $recaptcha) {
					$user		= $this->m_user->get_user_by_email($email);
			
					if (!empty($user)) {
						$code_confirm = str_replace('=', '', base64_encode($user->email).'_'.md5(rand(0, 99).date('U')));

						$data = array('code_confirm' => $code_confirm);
						$where = array('id' => $user->id);
						$this->m_user->update($data, $where);

						$tpl_data = array(
								"FULLNAME"	=> $user->fullname,
								"EMAIL"		=> $user->email,
								"LINK"		=> site_url('quen-mat-khau/'.$code_confirm)
						);

						$message = $this->mail_tpl->forgot_password($tpl_data);

						$mail_data = array(
											"subject"		=> "Quên mật khẩu - ".SITE_NAME,
											"from_sender"	=> MAIL_INFO,
											"name_sender"	=> SITE_NAME,
											"to_receiver"	=> $user->email,
											"message"		=> $message
						);
						$this->mail->config($mail_data);
						$this->mail->sendmail();

						$this->session->set_flashdata("success", "Thông tin yêu cầu đã được gửi. Vui lòng kiểm tra hộp mail của bạn.");
						redirect(site_url("tai-khoan/lay-lai-mat-khau"), "location");
					}
					else {
						$this->session->set_flashdata("error", "Email này không tìm thấy hoặc chưa đăng ký.");
						redirect(site_url("tai-khoan/lay-lai-mat-khau"), "back");
					}
				}
			}
		}

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Lấy Lại Mật Khẩu" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));

		$view_data = array();
		$view_data["breadcrumb"] = $this->_breadcrumb;
		$view_data['cart'] 			= $this->cart->contents();

		$tmpl_content = array();
		$tmpl_content["content"] = $this->load->view("account/recover_password", $view_data, true);
		$this->load->view("layout/view", $tmpl_content);
	}

	public function doi_mat_khau()
	{
		$task = $this->input->post("task");
		if (!empty($task)) {
			if ($task == "save") {
				$password				= $this->input->post("password");
				$new_password			= $this->input->post("new_password");
				$confirm_new_password	= $this->input->post("confirm_new_password");

				$data = new stdClass();
				$data->password				= $password;
				$data->new_password			= $new_password;
				$data->confirm_new_password	= $confirm_new_password;
				$this->session->set_flashdata("login", $data);

				if (empty($password)) {
					$this->session->set_flashdata("error", "Mật khẩu hiện tại không được trống.");
					redirect(current_url(), "back");
				}
				else if (md5($password) != $this->session->user->password) {
					$this->session->set_flashdata("error", "Mật khẩu hiện tại không đúng.");
					redirect(current_url(), "back");
				}
				else if (strlen(trim($new_password)) < 6) {
					$this->session->set_flashdata("error", "Mật khẩu mới phải có ít nhất 6 ký tự.");
					redirect(current_url(), "back");
				}
				else {
					$data = array(
						"password"		=> md5($new_password),
						"password_text"	=> $new_password
					);
					$where = array(
						"id" => $this->session->user->id
					);
					$this->m_user->update($data, $where);

					// Re-Login
					$this->m_user->cp_login($this->session->user->id);

					$this->session->set_flashdata("success", "Mật khẩu đã được thay đổi.");
					redirect(current_url(), "back");
				}
			}
		}

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Thay Đổi Mật Khẩu" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));

		$view_data = array();
		$view_data["breadcrumb"] = $this->_breadcrumb;

		$tmpl_content = array();
		$tmpl_content["title"] = 'Thay đổi mật khẩu';
		$tmpl_content["content"] = $this->load->view("account/change_password", $view_data, true);
		$this->load->view("layout/account", $tmpl_content);
	}

	public function thong_tin_tai_khoan()
	{
		die;
		$task = $this->input->post("task");
		if (!empty($task)) {
			if ($task == "save") {
				$fullname 		= $this->input->post("fullname");
				$gender			= $this->input->post("gender");
				$birthday		= $this->input->post("birthday");
				$phone			= $this->input->post("phone");
				$address		= $this->input->post("address");

				$data = array(
					"fullname"		=> $fullname,
					"gender"		=> $gender,
					"birthday"	=> date("Y-m-d", strtotime($birthday)),
					"phone"			=> $phone,
					"address"		=> $address,
				);

				$where = array("id" => $this->session->user->id);
				$this->m_user->update($data, $where);

				$this->session->set_flashdata("info", 'Cập nhật thành công');
				redirect(current_url());
			}
		}

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Thông Tin Cá Nhân" => site_url("{$this->util->slug($this->router->fetch_class())}/{$this->util->slug($this->router->fetch_method())}")));

		$view_data = array();
		$view_data["breadcrumb"] = $this->_breadcrumb;
		$view_data['user'] 			= $this->m_user->load($this->session->user->id);

		$tmpl_content = array();
		$tmpl_content["content"] = $this->load->view("account/profile", $view_data, true);
		$tmpl_content["title"] = 'Thông tin tài khoản';
		$this->load->view("layout/account", $tmpl_content);
	}
	public function chi_tiet_mua_hang()
	{
		$booking_id		= $this->input->post("booking_id");

		$booking = $this->m_booking->load($booking_id);

		$info = new stdClass();
		$info->booking_id = $booking->id;
		$booking_details = $this->m_booking_detail->items($info);

		$view_data = array();
		$view_data['booking'] 			= $booking;
		$view_data['booking_details']	= $booking_details;

		echo $this->load->view('account/booking/booking_details', $view_data, true);
	}
	public function san_pham_yeu_thich()
	{
		$user = $this->session->userdata("user");
		$like_product = str_replace('"','',$user->like_product);
		$info = new stdClass();
		$items = array();
		if (!empty($like_product)) {
		$info->like_item = $like_product;
		$select = "
		p.id,
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
		$items = $this->m_product->get_list_category_items($select, $info, 1);
		}

		$view_data = array();
		$view_data["breadcrumb"] 	= $this->_breadcrumb;
		$view_data['user'] 			= $user;
		$view_data['items'] 		= $items;

		$tmpl_content = array();
		$tmpl_content["content"] = $this->load->view("account/like_product", $view_data, true);
		$tmpl_content["title"] = 'Thông tin tài khoản';
		$this->load->view("layout/account", $tmpl_content);
	}
}
