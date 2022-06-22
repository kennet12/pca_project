<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Call_service extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

	}
    public function optimize_image() {
        if (!empty($_GET['url'])&&!empty($_GET['w'])) {
            $url = $_GET['url'];
            $width_thumb = $_GET['w'];
            $path = str_replace(BASE_URL,'.',$url);
            $format = explode('.',$url);
            $format = end($format);
            chmod("{$path}", 0777);
            
            // Get new dimensions
            list($width, $height) = getimagesize($url);
            $percent = ($width_thumb*100)/$width;
            $new_width = $width_thumb;
            $new_height = $height * $percent * 0.01;

            // Resample
            $image_p = imagecreatetruecolor($new_width, $new_height);
            if ($format == 'png'||$format == 'PNG'){
                header('Content-type: image/png');
                $image = imagecreatefrompng($url);
            } else {
                header('Content-type: image/jpeg');
                $image = imagecreatefromjpeg($url);
            }
            imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

            // Output
            imagejpeg($image_p, null, 100);
            chmod("{$path}", 0664);
        } else {
            redirect(site_url('error404'),'back');
        }
	}
    public function qrcode($id){
        $this->load->library('ciqrcode');
		header("Content-Type: image/png");
		$params['data'] = site_url("check-qrcode/{$id}");
		$this->ciqrcode->generate($params);
    }
    public function like_product(){
        $user = $this->session->userdata("user");
        if (!empty($user)){
            // set session
            $user_data = $user;
            $this->session->unset_userdata('user');
            //
            $status     = (int)$this->input->post('status');
            $product_id = $this->input->post('product_id');
            $like_list = $user_data->like_product;
            if ($status == 1){
                if (!empty($like_list)) $like_list .= ',';
                $like_list .= '"'.$product_id.'"';
            } else {
                //unlike
                $like_list = str_replace('"'.$product_id.'",','',$like_list);
                $like_list = str_replace(',"'.$product_id.'"','',$like_list);
                $like_list = str_replace('"'.$product_id.'"','',$like_list);
            }
            $user_data->like_product = $like_list;
            $this->m_user->update(array("like_product"=>$like_list),array("id"=>$user->id));
            $this->session->set_userdata('user', $user_data);
        }
    }
}
?>