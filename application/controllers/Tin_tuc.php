<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tin_tuc extends CI_Controller {
	var $_breadcrumb = array();

	function __construct()
	{
		parent::__construct();

		$this->_breadcrumb = array_merge($this->_breadcrumb, array("Tin tức" => site_url($this->util->slug($this->router->fetch_class()))));
	}
	public function index($category=null, $id=null) {
		if (!isset($_GET['trang']) || (($_GET['trang']) < 1)) {
			$page = 1;
		}
		else {
			$page = $_GET['trang'];
		}
		$offset   = ($page - 1) * 15;
		$info = new stdClass();
		$info->parent_id = 5;
		$categories = $this->m_content_categories->items($info,1);
		if (!empty($category)) {
			$category_item = $this->m_content_categories->load_content_category($category,5);
			$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$category_item->name}" => site_url($this->util->slug($this->router->fetch_class())."/{$category_item->alias}")));
			if (!empty($id)) {
				$item = $this->m_contents->load($id);
				$info = new stdClass();
				$info->category_id = $item->category_id;
	
				$this->_breadcrumb = array_merge($this->_breadcrumb, array("{$item->title}" => site_url($this->util->slug($this->router->fetch_class())."/{$item->alias}")));
				$info_cate = new stdClass();
				$info_cate->parent_id = 5;
	
				$view_data = array();
				$view_data['breadcrumb'] 	= $this->_breadcrumb;
				$view_data["categories"] 	= $this->m_content_categories->items($info_cate,1);
				$view_data['item'] 			= $item;
				$view_data["title"]   		= $item->title;
				$view_data['related_items'] = $this->m_contents->relative_items($info,array($item->id));
	
				$tmpl_content = array();
				$tmpl_content["content"]   = $this->load->view("content/detail", $view_data, TRUE);
				$tmpl_content["title"]   	= $item->title;
				$tmpl_content["meta_img"]	= !empty($item->thumbnail)?$item->thumbnail:null;
				$tmpl_content["meta_key"]	= $item->meta_key;
				$tmpl_content["meta_des"]	= $item->meta_des;
				$this->load->view("layout/view", $tmpl_content);
			} else {
				$info 					= new stdClass();
				$info->quantityEmpty	= 1;
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
				$products = $this->m_product->get_list_category_items($select,$info, 1, 10,0,'RAND()','');
				$info = new stdClass();
				$info->type = 5;
				$slide_items = $this->m_contents->items($info,1,5,0,'RAND()','');
				$right_items = $this->m_contents->items($info,1,10,0,'RAND()','');

				$info->category_id = $category_item->id;
				$total = $this->m_contents->count_items($info,1);
				$items = $this->m_contents->items($info,1,15,$offset);
	
				$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}/{$category_item->alias}"), $total, 15);
				
				$view_data = array();
				$view_data['breadcrumb'] 	= $this->_breadcrumb;
				$view_data['slide_items'] 	= $slide_items;
				$view_data['right_items'] 	= $right_items;
				$view_data['products'] 		= $products;
				$view_data['items'] 		= $items;
				$view_data['categories'] 	= $categories;
				$view_data["title"]   		= $category_item->name;
				$view_data['pagination'] 	= $pagination;
	
				$tmpl_content = array();
				$tmpl_content["content"]   = $this->load->view("content/index", $view_data, TRUE);
				$tmpl_content["title"]   = $category_item->name;
				$this->load->view("layout/view", $tmpl_content);
			}
		} else {
			$info 					= new stdClass();
			$info->quantityEmpty	= 1;
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
			$products = $this->m_product->get_list_category_items($select,$info, 1, 10,0,'RAND()','');
			$info = new stdClass();
			$info->type = 5;
			$total = $this->m_contents->count_items($info,1);
			$slide_items = $this->m_contents->items($info,1,5,0,'RAND()','');
			$right_items = $this->m_contents->items($info,1,10,0,'RAND()','');
			$items = $this->m_contents->items($info,1,15,$offset);

			$pagination = $this->util->pagination(site_url("{$this->util->slug($this->router->fetch_class())}"), $total, 15);
			
			$view_data = array();
			$view_data['breadcrumb'] 	= $this->_breadcrumb;
			$view_data['slide_items'] 	= $slide_items;
			$view_data['right_items'] 	= $right_items;
			$view_data['items'] 		= $items;
			$view_data['products'] 		= $products;
			$view_data['categories'] 	= $categories;
			$view_data["title"]   		= 'Tin tức';
			$view_data['pagination'] 	= $pagination;

			$tmpl_content = array();
			$tmpl_content["content"]   = $this->load->view("content/index", $view_data, TRUE);
			$tmpl_content["title"]   = 'Tin tức';
			$this->load->view("layout/view", $tmpl_content);
		}
	}
}
?>