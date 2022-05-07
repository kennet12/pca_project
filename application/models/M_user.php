<?
class M_user extends M_db
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');
		$this->_table = "m_user";
	}
	
	public function user($info=null, $active=null)
	{
		if (!is_null($info)) {
			$sql  = " SELECT * FROM {$this->_table} WHERE 1 = 1";
			if (!empty($info->email)) {
				$info->email    = addslashes(trim($info->email));
				$info->email    = strtoupper($info->email);
				$info->password = addslashes(trim($info->password));
				$info->password = md5($info->password);

				if (empty($info->email) || empty($info->password)) {
					return null;
				}
				$sql .= " AND UPPER({$this->_table}.email) = '{$info->email}'";
			} else if (!empty($info->phone)) {
				$info->phone    = addslashes(trim($info->phone));
				$info->phone    = strtoupper($info->phone);
				$info->password = addslashes(trim($info->password));
				$info->password = md5($info->password);

				if (empty($info->phone) || empty($info->password)) {
					return null;
				}
				$sql .= " AND {$this->_table}.phone = '{$info->phone}'";
			}
			$sql .= " AND {$this->_table}.password = '{$info->password}'";
			
			if (!is_null($active)) {
				$sql .= " AND {$this->_table}.active = '{$active}'";
			}
			
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return $query->row();
			}
		}
		
		return null;
	}
	
	public function users($info=null, $active=null, $limit=null, $offset=null)
	{
		$sql = "SELECT *, '0' AS 'child_num' FROM {$this->_table} WHERE 1 = 1";
		
		if (!is_null($info)) {
			if (!empty($info->user_type)) {
				$sql .= " AND {$this->_table}.user_type = '{$info->user_type}'";
			}
			if (!empty($info->user_types)) {
				$sql .= " AND {$this->_table}.user_type IN (".implode(",", $info->user_types).")";
			}
			if (!empty($info->search_text)) {
				$info->search_text = strtoupper(trim($info->search_text));
				$sql .= " AND (UPPER({$this->_table}.email) = '{$info->search_text}' OR UPPER({$this->_table}.fullname) LIKE '%{$info->search_text}%')";
			}
		}
		if (!is_null($active)) {
			$sql .= " AND {$this->_table}.active = '{$active}'";
		}
		$sql .= " AND {$this->_table}.id <> '0'";
		$sql .= " ORDER BY {$this->_table}.created_date DESC";
		
		if (!is_null($limit)) {
			$sql .= " LIMIT {$limit}";
		}
		if (!is_null($limit)) {
			$sql .= " OFFSET {$offset}";
		}
		
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	public function count($info=null, $active=null)
	{
		$sql = "SELECT COUNT(*) AS 'total' FROM {$this->_table} WHERE 1 = 1";
		if (!is_null($info)) {
			if (!empty($info->user_type)) {
				$sql .= " AND {$this->_table}.user_type = '{$info->user_type}'";
			}
			if (!empty($info->user_types)) {
				$sql .= " AND {$this->_table}.user_type IN (".implode(",", $info->user_types).")";
			}
			if (!empty($info->search_text)) {
				$info->search_text = strtoupper(trim($info->search_text));
				$sql .= " AND (UPPER({$this->_table}.email) = '{$info->search_text}' OR UPPER({$this->_table}.fullname) LIKE '%{$info->search_text}%')";
			}
		}
		if (!is_null($active)) {
			$sql .= " AND {$this->_table}.active = '{$active}'";
		}
		
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->row()->total;
		}
		
		return 0;
	}
	
	public function is_user_exist($email, $active=null, $provider=null)
	{
		$email = addslashes(trim($email));
		
		$sql = "SELECT * FROM {$this->_table} WHERE 1 = 1";
		if (!is_null($email)) {
			$sql .= " AND LOWER({$this->_table}.email) = '".strtolower($email)."'";
		}
		if (!is_null($active)) {
			$sql .= " AND {$this->_table}.active = '{$active}'";
		}
		if (!empty($provider)) {
			$sql .= " AND {$this->_table}.provider = '{$provider}'";
		}
		
		$query = $this->db->query($sql);
		return ($query->num_rows() > 0);
	}
	
	public function get_user_by_email($email, $active=null, $provider=null)
	{
		$email = addslashes(trim($email));
		
		if (empty($email)) {
			return null;
		}
		
		$sql = "SELECT * FROM {$this->_table} WHERE LOWER({$this->_table}.email) = '".strtolower($email)."'";
		
		if (!is_null($active)) {
			$sql .= " AND {$this->_table}.active = '{$active}'";
		}
		if (!empty($provider)) {
			$sql .= " AND {$this->_table}.provider = '{$provider}'";
		}
		
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->row();
		}
		
		return null;
	}
	public function get_user_by_phone($phone, $active=null, $provider=null)
	{
		$phone = addslashes(trim($phone));
		
		if (empty($phone)) {
			return null;
		}
		
		$sql = "SELECT * FROM {$this->_table} WHERE LOWER({$this->_table}.phone) = '".strtolower($phone)."'";
		
		if (!is_null($active)) {
			$sql .= " AND {$this->_table}.active = '{$active}'";
		}
		if (!empty($provider)) {
			$sql .= " AND {$this->_table}.provider = '{$provider}'";
		}
		
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->row();
		}
		
		return null;
	}
	
	public function get_social_user($uid=null, $provider=null, $email=null, $active=null)
	{
		if (empty($provider)) {
			return null;
		}
		
		$email = addslashes(trim($email));
		
		if (empty($email)) {
			return null;
		}
		
		$sql = "SELECT * FROM {$this->_table} WHERE 1 = 1";
		if (!empty($uid)) {
			$sql .= " AND {$this->_table}.uid = '{$uid}'";
		}
		
		if (!is_null($email)) {
			$sql .= " AND LOWER({$this->_table}.email) = '".strtolower($email)."'";
		}
		
		$sql .= " AND {$this->_table}.provider = '{$provider}'";
		
		if (!is_null($active)) {
			$sql .= " AND {$this->_table}.active = '{$active}'";
		}
		
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->row();
		}
		
		return null;
	}
	
	public function login($uid, $password, $user_type='user',$type='email')
	{
		
		$password = addslashes(trim($password));
		$uid    = addslashes(trim($uid));
		if (empty($uid) || empty($password)) {
			return false;
		}
		$password = md5($password);
		if ($type == 'email') {
			$uid    = strtoupper($uid);
			$sql      = "SELECT * FROM {$this->_table} WHERE UPPER({$this->_table}.email)='{$uid}' AND {$this->_table}.password='{$password}' AND {$this->_table}.active=1";
		} else if ($type == 'phone') {
			$sql      = "SELECT * FROM {$this->_table} WHERE UPPER({$this->_table}.phone)='{$uid}' AND {$this->_table}.password='{$password}' AND {$this->_table}.active=1";
		}
		
		$query    = $this->db->query($sql);
		
		if ($query->num_rows() > 0) {
			$user = $query->row();

			$token_login = md5($user->email).md5(rand(1,1000)).md5($user->password_text).md5(date('Ymdhis')).md5($user->phone);
			$data_cookie_login = array(
				'fullname' => $user->fullname,
				'email'=>$user->email,
				'phone'=>$user->phone,
				'avatar'=>$user->avatar,
				'token_login' => $token_login,
				'status' => 1,
			);
			$this->m_user->update(array('token_login'=>$token_login),array('id'=>$user->id));
			setcookie('token_login', json_encode($data_cookie_login),time() + (10 * 365 * 24 * 60 * 60), "/");
			// if ($user_type == "admin") {
			// 	$this->session->set_userdata("agent_id", ADMIN_AGENT_ID);
			// }
			return true;
		}
		
		return false;
	}
	
	function cp_login($id, $user_type="user")
	{
		if (empty($id)) {
			return false;
		}
		
		$sql = "SELECT * FROM {$this->_table} WHERE {$this->_table}.id='{$id}'";
		$query = $this->db->query($sql);
		
		if ($query->num_rows() > 0) {
			$user = $query->row();
			$this->session->set_userdata($user_type, $user);
			if ($user_type == "admin") {
				$this->session->set_userdata("agent_id", ADMIN_AGENT_ID);
			}
			return true;
		}
		
		return false;
	}
	
	public function logout()
	{
		$user = json_decode($_COOKIE['token_login']);
		$data_cookie_login = array(
			'fullname' => $user->fullname,
			'email'=>$user->email,
			'phone'=>$user->phone,
			'avatar'=>$user->avatar,
			'token_login' => '',
			'status' => 0,
		);
		$this->m_user->update(array('token_login'=>NULL),array('phone'=>$user->phone));
		setcookie('token_login', json_encode($data_cookie_login),1, "/");
		// $this->session->sess_destroy();
	}
	
	public function last_activity($user_id)
	{
		$data = array("last_activity" => date($this->config->item("log_date_format")));
		$where = array("id" => $user_id);
		$this->db->update($this->_table, $data, $where);
	}
	public function get_user_email($email, $active=null)
	{
		if (empty($email)) {
			return null;
		}
		$sql = "SELECT * FROM m_user WHERE LOWER(email) = '".strtolower($email)."'";
		if (!is_null($active)) {
			$sql .= " AND active = '{$active}' ";
		}
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->row();
		}
		return null;
	}
	public function forgot_password($code_confirm=null,$active=null)
	{
		if (empty($code_confirm) && empty($active)) {
			return null;
		}
		$sql = "SELECT * FROM m_user WHERE code_confirm = '{$code_confirm}'";
		if (!is_null($active)) {
			$sql .= " AND active = '{$active}' ";
		}
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->row();
		}
		return null;
	}
}
?>
