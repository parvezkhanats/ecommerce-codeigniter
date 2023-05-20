<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SearchModel extends CI_Model {
	
	public function get_search(){
	$match = $this->input->post('search');
	  $this->db->like('pro_title',$match);
	  $this->db->or_like('pro_desc',$match);
	  $query = $this->db->get('tbl_product');
	  return $query->result();
	}
}