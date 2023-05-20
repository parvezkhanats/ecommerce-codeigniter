<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {
	// public function get_product_by_id($product_id){
	// 	$data = $this->db->select('*')
	// 			->from("tbl_product")
	// 			->where("pro_id",$product_id)
	// 			->join('tbl_brand','tbl_brand.brand_id=tbl_product.pro_brand')
	// 			->get()
	// 			->row();
	// 			return $data;
	// }

    public function get_product_by_id($product_id){
		$this->db->select('tbl_product.*,tbl_brand.brand_name');
	    $this->db->from('tbl_product');
		 $this->db->where('pro_id',$product_id);
	    $this->db->join('tbl_brand', 'tbl_product.pro_brand = tbl_brand.brand_id', 'right outer'); 
	    $query = $this->db->get();
	    return $query->row();
	}
	public function get_total_product_by_brand($brand_id){
		$data = $this->db->select('count(pro_brand) as total')
			->from('tbl_product')
			->where('pro_brand',$brand_id)
			->get()
			->result();
			return $data;
	}
	public function post_brand_by_id($brand_id){
		$data = $this->db->select('*')
			->from('tbl_product')
			->where('pro_brand',$brand_id)
			->get()
			->result();
			return $data;
	}
	public function post_sub_cat_by_id($sub_cat_id){
		$data = $this->db->select('*')
			->from('tbl_product')
			->where('pro_sub_cat',$sub_cat_id)
			->get()
			->result();
			return $data;
	}
	public function countRow(){	
	  $query = $this->db->query("SELECT COUNT(pro_id) as count FROM tbl_product");
	  if($query->num_rows() >0 ){
	    $row =  $query->row();
	    $data =  $row->count; 
	 		return $data;
		}
	}
	public function get_all_product_pagination($perpage,$offset){
		if($offset==NULL){
			$offset=0;
		}
		$data = $this->db->select('*')
			->from('tbl_product')
			->where('pro_status',1)
			->limit($perpage,$offset)
			->get()
			->result();
			return $data;
	}
	public function show_product_price_range($min_range,$max_range){
		$data = $this->db->select('*')
			->from('tbl_product')
			->where("pro_price BETWEEN '".$min_range."' AND '".$max_range."'")
			->get()
			->result();
		return $data;
	}
	
}