<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Category Controller
*/
class Contact extends CI_Controller{

	public function __construct(){
		parent::__construct();
		if(!isset($this->session->userid) && ($this->session->userstatus !=1)){
			redirect('Login');
		}
		$this->load->model("ContactModel");
	}
	
// Code for backedn view
	public function get_all_contact_message(){
		$data['all_contact'] = $this->ContactModel->get_all_message();
		$data['main_content'] = $this->load->view('back/message_list',$data,true);
		$this->load->view('back/adminpanel',$data);
	}
	public function delete_contact_by_id($contact_id){
		$this->ContactModel->delete_contact_message_by_id($contact_id);
		$this->session->set_flashdata("flsh_msg","<font class='success'>Message Deleted Successfully</font>");
           redirect('contact-message-list');
	}
	public function view_contact_by_id($contact_id){
		$data = array();
		$data['contact_message_by_id'] = $this->ContactModel->view_contact_message_by_id($contact_id);

		$data['other_content'] = $this->load->view('back/view_contact',$data,true);
		$this->load->view('back/adminpanel',$data);
	}
	public function replay_contact_by_id($contact_id){
		$data = array();
		$data['replay_message_by_id'] = $this->ContactModel->replay_contact_message_by_id($contact_id);
		$data['main_content'] = $this->load->view('back/replay_contact',$data,true);
		$this->load->view('back/adminpanel',$data);
	}




}
