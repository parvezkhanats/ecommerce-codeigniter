<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("CheckoutModel");
		$this->load->model("MailModel");
	}
	public function checkout(){
		$data['main_content'] = $this->load->view('front/checkout','',true);
		$this->load->view('front/index',$data);
	}
	public function customer_registration(){
		
	 $this->form_validation->set_rules('cus_name', 'Customer Name', 'trim|required|min_length[5]');
	// $this->form_validation->set_rules('cus_email', 'Email', 'trim|required|valid_email');
	 $this->form_validation->set_rules('cus_email', 'Email', 'required|valid_email|is_unique[tbl_customer.cus_email]');
	 $this->form_validation->set_rules('cus_password', 'Password', 'trim|required|min_length[8]');
	 $this->form_validation->set_rules('con_pass', 'Password Confirmation', 'trim|required|matches[cus_password]');
 	if($this->form_validation->run()){
		$customer_id = $this->CheckoutModel->save_customer_info();
		$sdata = array();
		$sdata['cus_id'] = $customer_id;
		$sdata['cus_name'] = $this->input->post('cus_name');
		$sdata['cus_email'] = $this->input->post('cus_email');
		$sdata['cus_id'] = $this->session->set_userdata($sdata);
		// start registration Successfull mail 
		$mdata = array();
		$mdata['name'] = $this->input->post('cus_name');
		$mdata['from'] = "admin@sumon-it.com";
		$mdata['admin_full_name'] = "sumon-it.com";
		$mdata['to'] = $this->input->post('cus_email');
		$mdata['subject'] = "Registration Successfull......";
		$mdata['password'] = $this->input->post('cus_password');
		$this->MailModel->mail_send($mdata,'registration_successfull');

		// end registration successfull  mail 
		redirect("billing");
	}else{
			$this->checkout();//checkout means login page
		}
	}
	public function customer_login(){
		$cus_email = $this->input->post('cus_email',true);
		$cus_pass = md5($this->input->post('cus_password',true));
		$user_details = $this->CheckoutModel->get_user_login_by_email($cus_email);
		if($cus_pass==$user_details->cus_password){
			$sdata['cus_id'] = $user_details->cus_id;
			$sdata['cus_name'] =$user_details->cus_name;
			$sdata['cus_email'] =$user_details->cus_email;
			$sdata['cus_id'] = $this->session->set_userdata($sdata);
			redirect("billing");
		}else{
			$this->session->set_flashdata('flash_msg','Incorrect Email Or Password...!');
			redirect("Checkout/checkout");
		}
	}
	public function billing(){
		$data= array();
		$customer_id= $this->session->userdata("cus_id");
		$data['cus_info'] = $this->CheckoutModel->select_customer_info_by_id($customer_id);
		$data['main_content'] = $this->load->view('front/billing',$data,true);
		$this->load->view('front/index',$data);
	}
	public function shipping(){
		 
			$data['main_content'] = $this->load->view('front/shipping','',true);
			$this->load->view('front/index',$data);

	}
	public function update_billing(){
		 $this->form_validation->set_rules('cus_mobile', 'Mobile Number', 'trim|required');
		 $this->form_validation->set_rules('cus_address', 'Address', 'trim|required|min_length[5]');
		 $this->form_validation->set_rules('cus_city', 'City', 'trim|required');
		 $this->form_validation->set_rules('cus_zip', 'Zip', 'trim|required|min_length[4]');
		if($this->form_validation->run()){
			$this->CheckoutModel->upate_billing_by_id();
			//$shipping_id = $this->session->userdata("shipping_id");
			$cart_total = $this->cart->total();
			if($cart_total==NUll){
				redirect("products");
			}else{
				$shipping_status= $this->input->post('shipping_info');
				if($shipping_status=="on"){
					redirect("payment");
				}else{
				redirect("shipping");
				}
			}
		}else{
			$this->billing();
		}
	}
	public function payment(){
	$customer_id = $this->session->userdata('cus_id');
	if($customer_id==NUll){
		redirect("checkout");
	}else{
		$data['main_content'] = $this->load->view('front/payment','',true);
		$this->load->view('front/index',$data);
		}
	}
	public function customer_logout(){
		$this->session->sess_destroy();
		redirect("Home");
	}
	public function insert_shipping(){
		$this->form_validation->set_rules('cus_mobile', 'Mobile Number', 'trim|required');
		 $this->form_validation->set_rules('cus_address', 'Address', 'trim|required|min_length[5]');
		 $this->form_validation->set_rules('cus_city', 'City', 'trim|required');
		 $this->form_validation->set_rules('cus_zip', 'Zip', 'trim|required|min_length[4]');
		 $this->form_validation->set_rules('cus_email', 'Email', 'trim|required|valid_email');
		 $this->form_validation->set_rules('cus_name', 'Email', 'trim|required');
			if($this->form_validation->run()){
			$this->CheckoutModel->insert_shipping();
			redirect("payment");
		}else{
			$this->shipping();
		}
	}
	public function place_order(){

		$payment_method = $this->input->post('payment_gateway',true);
		if($payment_method!=NUll){
			$this->CheckoutModel->save_payment_info();
			if($payment_method=='cash_on_delivery'){
				$this->CheckoutModel->save_order_info();
				// start Order Successfull mail 

		$mdata = array();
		$mdata['cus_full_name'] = $this->session->userdata("cus_name");
		$mdata['to'] = $this->session->userdata("cus_email");
		$mdata['from'] = "admin@sumon-it.com";
		$mdata['admin_full_name'] = "sumon-it.com";
		$mdata['subject'] = "Order Successfully Complete......";

		$mdata['g_total'] = $this->session->userdata("g_total");



		$this->MailModel->Order_success_mail_send($mdata,'order_successfull');

		// end Order successfull  mail 
		$this->cart->destroy();
				redirect('order-success');
			}
			if($payment_method=='paypal'){
				
			}
		}else{
			$this->session->set_flashdata("flash_msg","<font class='btn-warning alert alert-danger'>Please Select A Payment Pemthod</font>");
			redirect("payment");
		}
	}
	public function order_success(){
		$data =array();
		$data['slider'] = $this->load->view('front/slider','',true);
		$data['recommended'] = $this->load->view('front/recommended','',true);
		$data['main_content'] = $this->load->view('front/order_success','',true);
		$data['category_brand'] = $this->load->view('front/category','',true);
		$this->load->view('front/index',$data);
	}
	







}
