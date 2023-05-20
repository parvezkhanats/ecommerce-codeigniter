<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartModel extends CI_Model {
	public function select_product_info_by_product_id($product_id){
		$data = $this->db->select('*')
				->from("tbl_product")
				->where("pro_id",$product_id)
				->get()
				->row();
				return $data;
	}
}