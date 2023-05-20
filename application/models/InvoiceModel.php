<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InvoiceModel extends CI_Model {
	public function get_all_order(){
		$data = $this->db->select('*')
						->from('tbl_order')
						->join('tbl_customer', 'tbl_customer.cus_id = tbl_order.cus_id')
						->join('tbl_payment', 'tbl_payment.payment_id = tbl_order.payment_id')
						->get()
						->result();
						return $data;
	}
	public function get_order_info_by_id($order_id){
		$data = $this->db->select('*')
						->from('tbl_order')
						->where('order_id',$order_id)
					//	->order_by('order_id','desc')
						->get()
						->row();
						return $data;
	}
	public function get_customer_info_by_id($customer_id){
		$data = $this->db->select('*')
						->from('tbl_customer')
						->where('cus_id',$customer_id)
						->get()
						->row();
						return $data;
	}
	public function get_shipping_info_by_id($shipping_id){
		$data = $this->db->select('*')
						->from('tbl_shipping')
						->where('shipping_id',$shipping_id)
						->get()
						->row();
						return $data;
	}
	public function get_all_order_details_by_id($order_id){
		$data = $this->db->select('*')
						->from('tbl_order_details')
						->where('order_id',$order_id)
						->get()
						->result();
						return $data;
	}
	public function delete_order_info_by_id($order_id,$shipping_id,$payment_id){
		$this->db->where('order_id',$order_id);
		$this->db->delete('tbl_order');
		$this->db->where('order_id',$order_id);
		$this->db->delete('tbl_order_details');
		$this->db->where('shipping_id',$shipping_id);
		$this->db->delete('tbl_shipping');
		$this->db->where('payment_id',$payment_id);
		$this->db->delete('tbl_payment');
	}
}