<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Call_service extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

	}
	public function send_rating() {
        $point      = $this->input->post('point');
        $name       = $this->input->post('name');
        $email      = $this->input->post('email');
        $phone      = $this->input->post('phone');
        $message    = $this->input->post('message');
        $product_id = $this->input->post('item_id');
        $user       = $this->session->userdata("user");
        $recaptcha 	= $this->input->post('g-recaptcha-response');
        $result = 0;
        if (!empty($user)) {
            if (!empty($point)
                &&!empty($name)
                &&!empty($email)
                &&!empty($phone)
                &&!empty($message)
                &&!empty($product_id)
                &&(isset($recaptcha)&&$recaptcha)) {
                $data = array(
                    'point'     => $point,
                    'name'      => $name,
                    'email'     => $email,
                    'phone'     => $phone,
                    'message'   => $message,
                    'product_id'=> $product_id,
                    'user_id'   => $user->id,
                );
                $this->m_rating->add($data);
                $result = 1;
            }
        }
        echo json_encode($result);
	}
    public function load_rating() {
        $product_id = $this->input->post('item_id');
        $result = array();
        if (!empty($product_id)) {
            $info = new stdClass();
            $info->parent_id = 0;
            $info->product_id = $product_id;
            $rats = $this->m_rating->items('*',$info,1);
            // $cmt = $this->m_rating->items('*',$info,1);
            $arr_rat = array(
                '1' => 0,
                '2' => 0,
                '3' => 0,
                '4' => 0,
                '5' => 0,
            );
            $count_item = 0;
            $count_point = 0;
            foreach($rats as $rat) {
                $count_item++;
                $count_point += $rat->point;
                $arr_rat[$rat->point] += 1;

                $info = new stdClass();
                $info->parent_id = $rat->id;
                $rat->reply = $this->m_rating->items('*',$info,1);
            }
            // foreach($cmt as $cm) {
            //     $info = new stdClass();
            //     $info->parent_id = $cm->id;
            //     $cm->reply = $this->m_rating->items('*',$info,1);
            // }

            $result['count_item'] = $count_item;
            $result['avg_point'] = round($count_point/$count_item,1);
            $result['arr_rat'] = $arr_rat;
            // $result['cmt'] = $cmt;
            $result['cmt'] = $rats;
        }
        echo json_encode($result);
	}
    public function send_reply_rating() {
        $parent_id  = $this->input->post('item_id');
        $name       = $this->input->post('name');
        $email      = $this->input->post('email');
        $phone      = $this->input->post('phone');
        $message    = $this->input->post('message');
        $product_id = $this->input->post('product_id');
        $user       = $this->session->userdata("user");
        $result = 0;
        if (!empty($user)) {
            if (!empty($parent_id)
                &&!empty($name)
                &&!empty($email)
                &&!empty($phone)
                &&!empty($message)
                &&!empty($product_id)) {
                $data = array(
                    'parent_id' => $parent_id,
                    'name'      => $name,
                    'email'     => $email,
                    'phone'     => $phone,
                    'message'   => $message,
                    'product_id'=> $product_id,
                    'user_id'   => $user->id,
                );
                $this->m_rating->add($data);
                $result = 1;
            }
        }
        echo json_encode($result);
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