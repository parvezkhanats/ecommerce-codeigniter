<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Product Controller
*/
class Product extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if(!isset($this->session->userid) && ($this->session->userstatus !=1)){
			redirect('Login');
		}
		$data = array();
		$this->load->model("ProductModel");
	}
	public function add_product_form(){
		$data['all_cat'] = $this->ProductModel->get_all_category();
		$data['all_sub_cat'] = $this->ProductModel->get_all_sub_category();
		$data['main_content'] = $this->load->view('back/add_product',$data,true);
		$this->load->view('back/adminpanel',$data);
	}
	public function show_product_list(){
		$data['all_product'] = $this->ProductModel->get_all_product();
		$data['main_content'] = $this->load->view('back/product_list',$data,true);
		$this->load->view('back/adminpanel',$data);
	}
	public function insert_product(){
		$product_image= $this->upload_product_image();
		if($product_image==NULL){
			redirect("Product/add_product_form");
		}else{

		$image = $this->ProductModel->add_product_model($product_image);
	$this->session->set_flashdata("flsh_msg","<font class='success'>Product Added Successfully</font>");
		redirect('product-list');
		}
	}
	public function edit_product($product_id){
		$data['all_product'] = $this->ProductModel->edit_product_model($product_id);
		$data['all_cat'] = $this->ProductModel->get_all_category();
		$data['all_sub_cat'] = $this->ProductModel->get_all_sub_category();
		$data['all_brand'] = $this->ProductModel->get_all_brand();
		$data['main_content'] = $this->load->view('back/edit_product',$data,true);
		$this->load->view('back/adminpanel',$data);
		
	}
	private function upload_product_image(){
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'png|gif|jpg|jpeg';
        $config['max_size']             = 1000;//kb
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('pro_image')){
        	$data = $this->upload->data();
        	$image_path = "uploads/$data[file_name]";
        	return $image_path;
        }else{
        	  $error =  $this->upload->display_errors();
        	$this->session->set_userdata('error_image',$error);
        	//redirect("Product/add_product_form");
        }

	}
	public function update_product(){
		//$this->PrductModel->update_product_model();
		if($_FILES['pro_image']['name']=="" || $_FILES['pro_image']['size']==""){
			$product_image= $this->input->post('old_pro_image',true);
			$this->ProductModel->update_product_model($product_image);
			$this->session->set_flashdata("update_pro_msg","Product Updated Successfully");
			$product_id = $this->input->post('pro_id',true);
			redirect('edit-product/'.$product_id);

		}else{
			$product_id = $this->input->post('pro_id',true);
			$product_image = $this->upload_product_image();
			if($product_image==NULL){
			redirect('edit-product/'.$product_id);
			}else{
			$this->ProductModel->update_product_model($product_image);
			unlink($this->input->post('old_pro_image',true));
			$this->session->set_flashdata("update_pro_msg","Product Updated Successfully");
			redirect('edit-product/'.$product_id);
		}
			
		}

	}
	public function delete_product($product_id){
		$this->ProductModel->delete_product_model($product_id);
		$this->session->set_flashdata('product_delete','Product Deleted Successfully');
		redirect('product-list');
	}
	
	
}

?>