<?php
class M_product_gallery extends M_db
{
	public function __construct()
	{
		parent::__construct();

		$this->_table = "m_product_gallery";
	}

	public function items($info=null, $active=null, $limit=null, $offset=null)
	{
		$sql = "SELECT *, '0' AS 'child_num' FROM {$this->_table} AS CC WHERE 1 = 1";
		if (!is_null($info)) {
			if (!empty($info->product_id)) {
				$sql .= " AND product_id = '{$info->product_id}'";
			}
		}
		if (!is_null($active)) {
			$sql .= " AND active = '{$active}'";
		}
		if (!is_null($limit)) {
			$sql .= " LIMIT {$limit}";
		}
		if (!is_null($offset)) {
			$sql .= " OFFSET {$offset}";
		}
		$sql .= " ORDER BY id ASC";
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function get_one_thumb($info=null, $active=null)
	{
		$sql = "SELECT *, '0' AS 'child_num' FROM {$this->_table} AS CC WHERE 1 = 1";
		if (!is_null($info)) {
			if (!empty($info->product_id)) {
				$sql .= " AND product_id = '{$info->product_id}'";
			}
		}
		if (!is_null($active)) {
			$sql .= " AND active = '{$active}'";
		}
		$sql .= " AND LIMIT 1";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			return $query->row();
		}
		return null;
	}
}
?>
