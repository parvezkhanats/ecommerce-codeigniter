<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BrandModel extends CI_Model {
	public function add_brand_model(){
		$data['brand_name'] = $this->input->post('brand_name',true);
		$this->db->insert('tbl_brand',$data);
	}
	public function get_all_brand(){
		$data = $this->db->select('*')
			->from('tbl_brand')
			->order_by('brand_id','desc')
			->get()
			->result();
			return $data;
	}
	public function delete_brand_by_id($brand_id){
		$this->db->where('brand_id', $brand_id);
		$this->db->delete('tbl_brand');
	}
	public function edit_brand_by_id($brand_id){
		$data = $this->db
				->select('*')
				->from('tbl_brand')
				->where('brand_id', $brand_id)
				->get()
				->row();
		return $data;
	}
	public function update_brand_by_id($brand_id){
		$data['brand_name'] = $this->input->post('brand_name');
		$this->db->where('brand_id', $brand_id);
		$this->db->update('tbl_brand', $data); 
	}
	
}