<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// front end insert
class ContactModel extends CI_Model {
	public function insert_contact_data(){
		$data =  $this->input->post(NULL,true);
		$this->db->insert("tbl_contact",$data);
	}
	//Backend view 
	public function get_all_message(){
		$data = $this->db->select('*')
			->from('tbl_contact')
			->order_by('contact_id','desc')
			->get()
			->result();
			return $data;
	}
	public function delete_contact_message_by_id($contact_id){
		$this->db->where('contact_id', $contact_id);
		$this->db->delete('tbl_contact');
	}
	public function view_contact_message_by_id($contact_id){
		$data = $this->db
				->select('*')
				->from('tbl_contact')
				->where('contact_id', $contact_id)
				->get()
				->row();
		return $data;
	}
	public function all_contact(){
		$data = $this->db->select('count(*) as total')
			->from('tbl_contact')
			//->where('contact_status','0')
			->get()
			->result();
			return $data;
	}
	public function replay_contact_message_by_id($contact_id){
		$data = $this->db->select('*')
			->from('tbl_contact')
			->where('contact_id',$contact_id)
			->get()
			->row();
			return $data;
	}
}