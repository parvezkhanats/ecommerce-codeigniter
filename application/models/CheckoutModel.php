<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckoutModel extends CI_Model {
	
	public function save_customer_info(){
		$data = array();
		$data['cus_name'] = $this->input->post('cus_name');
		$data['cus_email'] = $this->input->post('cus_email');
		$data['cus_password'] = md5($this->input->post('cus_password'));
		$this->db->insert("tbl_customer",$data);
		$customerid = $this->db->insert_id();
		return $customerid;
	}
	public function select_customer_info_by_id($customer_id){
		$data = $this->db->select('*')
			->from('tbl_customer')
			->where("cus_id",$customer_id)
			->get()
			->row();
			return $data;
	}
	public function upate_billing_by_id(){
		$data = array();
		$data['cus_name'] = $this->input->post('cus_name');
		$data['cus_email'] = $this->input->post('cus_email');
		$data['cus_mobile'] = $this->input->post('cus_mobile');
		$data['cus_address'] = $this->input->post('cus_address');
		$data['cus_city'] = $this->input->post('cus_city');
		$data['cus_country'] = $this->input->post('cus_country');
		$data['cus_zip'] = $this->input->post('cus_zip');
		$shipping_status= $this->input->post('shipping_info');
		if($shipping_status=="on"){
		$customer_id = $this->input->post('cus_id');
		$this->db->where("cus_id",$customer_id);
		$this->db->update("tbl_customer",$data);
		$data['cus_id'] = $customer_id;
		$this->db->insert("tbl_shipping",$data);
		$customer_ship_id = $this->db->insert_id();
		$sdata = array();
		$sdata['shipping_id'] = $customer_ship_id;
		$this->session->set_userdata($sdata);
		}else{
		$customer_id = $this->input->post('cus_id');
		$this->db->where("cus_id",$customer_id);
		$this->db->update("tbl_customer",$data);
		}
	}
	public function insert_shipping(){
	$data = array();
		$data['cus_name'] = $this->input->post('cus_name');
		$data['cus_email'] = $this->input->post('cus_email');
		$data['cus_mobile'] = $this->input->post('cus_mobile');
		$data['cus_address'] = $this->input->post('cus_address');
		$data['cus_city'] = $this->input->post('cus_city');
		$data['cus_country'] = $this->input->post('cus_country');
		$data['cus_zip'] = $this->input->post('cus_zip');
		$data['cus_fax'] = $this->input->post('cus_fax');
	//	$shipping_id = $this->input->post('shipping_id');
		//$this->db->where("shipping_id",$shipping_id);
		$this->db->insert("tbl_shipping",$data);
		$customer_ship_id = $this->db->insert_id();
		$sdata = array();
		$sdata['shipping_id'] = $customer_ship_id;
		$this->session->set_userdata($sdata);
	
	}
	public function get_user_login_by_email($cus_email){
		$data = $this->db->select('*')
			->from('tbl_customer')
			->where("cus_email",$cus_email)
			->get()
			->row();
			return $data;
	}
	public function save_payment_info(){
		$data = array();
		$data['payment_type'] = $this->input->post('payment_gateway');
		$data['payment_message'] = $this->input->post('payment_message');
		$this->db->insert("tbl_payment",$data);
		$sdata = array();
		$sdata['payment_id'] = $this->db->insert_id();
		$this->session->set_userdata($sdata);
	}
	public function save_order_info(){
		$orderdata = array();
		$orderdata['cus_id'] = $this->session->userdata('cus_id');
		$orderdata['shipping_id'] = $this->session->userdata('shipping_id');
		$orderdata['payment_id'] = $this->session->userdata('payment_id');
		$orderdata['order_total'] = $this->session->userdata('g_total');
		$this->db->insert("tbl_order",$orderdata);
		$order_id = $this->db->insert_id();
		foreach ($this->cart->contents() as $order_product){
			$o_details_data['order_id'] = $order_id;
			$o_details_data['product_id'] = $order_product['id'];
			$o_details_data['product_name'] = $order_product['name'];
			$o_details_data['product_price'] = $order_product['price'];
			$o_details_data['sales_quantity'] = $order_product['qty'];
			$this->db->insert("tbl_order_details",$o_details_data);
		}
		//$this->cart->destroy();
		$sql = "UPDATE tbl_product, tbl_order_details
		SET tbl_product.pro_quantity = tbl_product.pro_quantity - tbl_order_details.sales_quantity 
		WHERE tbl_product.pro_id = tbl_order_details.product_id 
		AND tbl_order_details.order_id = '$order_id'";
		$this->db->query($sql);


	}
	
}