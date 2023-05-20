<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model("CartModel");
	}
	public function add_to_cart(){
		$product_id = $this->input->post("pro_id");
		$qty = $this->input->post("qty");
		$product_info = $this->CartModel->select_product_info_by_product_id($product_id);
		$data = array(
        'id'      => $product_info->pro_id,
        'qty'     => $qty,
        'price'   => $product_info->pro_price,
        'name'    => $product_info->pro_title,
        'options' => array('pro_image' => $product_info->pro_image)
			);

		$this->cart->insert($data);
		return redirect("show-cart");
	}
	public function show_cart(){
		$data['main_content'] = $this->load->view('front/view_cart','',true);
		$this->load->view('front/index',$data);
	}
	public function delete_to_cart($row_id){
		$data = array(
        'rowid' => $row_id,
        'qty'   => 0
			);
		$this->cart->update($data);
		return redirect("show-cart");
	}
	public function update_cart_quantity(){
		$quantity = $this->input->post('qty',true);
		$row_id = $this->input->post('rowid',true);
		$data = array(
        'rowid' => $row_id,
        'qty'   => $quantity
			);
		$this->cart->update($data);
		return redirect("show-cart");

	}
	public function update_cart_quantity_payment(){
		$quantity = $this->input->post('qty',true);
		$row_id = $this->input->post('rowid',true);
		$data = array(
        'rowid' => $row_id,
        'qty'   => $quantity
			);
		$this->cart->update($data);
		return redirect("payment");

	}
	public function delete_to_cart_payment($row_id){
		$data = array(
        'rowid' => $row_id,
        'qty'   => 0
			);
		$this->cart->update($data);
		return redirect("payment");
	}

}

?>