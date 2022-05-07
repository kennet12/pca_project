<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tim_kiem extends CI_Controller {

	public function index()
	{
		$search_text = !empty($_GET['search_text']) ? trim($_GET['search_text']," ") : '';
		if (!empty($search_text)) {
			if (!isset($_GET['trang']) || (($_GET['trang']) < 1)) {
				$page = 1;
			}
			else {
				$page = $_GET['trang'];
			}
			$offset   = ($page - 1) * 12;

			$info = new stdClass();
			$info->parent_id = 0;
			$categories = $this->m_product_category->items($info,1);

			$info_search = new stdClass();
			$info_search->search_text 		= $search_text;
			$info_search->list_category		= !empty($_GET['danh_muc'])?explode(',',$_GET['danh_muc']):null;
			$info_search->price 			= !empty($_GET['gia'])?explode(',',$_GET['gia']):null;
			$sort 							= !empty($_GET['srt'])?explode('-',$_GET['sort']):null;
			$order_by 						= !empty($sort[0]) ? $sort[0] : null;
			$sort_by 						= !empty($sort[1]) ? $sort[1] : null;

			$select = "p.id,
			p.title,
			p.alias,
			p.category_id,
			p.code,
			p.rating_cmt,
			p.meta_title,
			p.meta_key,
			p.meta_des,
			CONVERT(JSON_EXTRACT(t.price, '$[0]'), DECIMAL) as price,
			CONVERT(JSON_EXTRACT(t.sale, '$[0]'), DECIMAL) as sale,
			t.typename,
			g.file_path";
			$total_items = $this->m_product->get_list_category_items($select,$info_search, 1, null, null, $order_by, $sort_by);
			$total_items = count($total_items);
			$items = $this->m_product->get_list_category_items($select,$info_search, 1, 12, $offset, $order_by, $sort_by);
			// add keyword
			if (!empty($total_items) && (strlen($search_text)>2)) {
				$search_item = $this->m_search->load($search_text);
				if (!empty($search_item)) {
					$data_search = array(
						'point'		=>	$total_items,
						'num_search'=>	$search_item->num_search+1
					);
					$this->m_search->update($data_search,array("id" => $search_item->id));
				} else {
					$data_search = array(
						'keyword' 	=> $search_text,
						'point'		=>	$total_items,
						'num_search'=>	1
					);
					$this->m_search->add($data_search);
				}
			}
			//

			$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
			$url = str_replace("?trang={$page}", '?', $url);
			$url = str_replace("&trang={$page}", '', $url);

			$pagination = $this->util->pagination($url, $total_items, 12);

			$view_data = array();
			$view_data['items'] 		= $items;
			$view_data['search_text'] 	= $search_text;
			$view_data["categories"] 	= $categories;
			$view_data["total_items"] 	= $total_items;
			$view_data["pagination"] 	= $pagination;

			$tmpl_content = array();
			$tmpl_content["content"]   = $this->load->view("search/index", $view_data, TRUE);
			$tmpl_content["title"]   = 'Tìm kiếm';
			$this->load->view("layout/view", $tmpl_content);
		} else {
			redirect(BASE_URL,'back');
		}
	}
	function ajax_search () {
		sleep(0.01);

		$text = $_GET['text'];
		$info = new stdClass();
		$info->keyword = trim($text," ");
		$search = $this->m_search->items($info,5);

		$info_product = new stdClass();
		$info_product->search_text = trim($text," ");
		$select = "
		p.title,
		p.alias,
		p.code,
		CONVERT(JSON_EXTRACT(t.price, '$[0]'), DECIMAL) as price,
		CONVERT(JSON_EXTRACT(t.sale, '$[0]'), DECIMAL) as sale,
		g.file_path";
		$product = $this->m_product->get_list_category_items($select,$info_product,1,6);
		$result = array($search,$product);

		echo json_encode($result);
	}
}

?>