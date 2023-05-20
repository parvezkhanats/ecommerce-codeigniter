<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailModel extends CI_Model {
	public function mail_send($data,$template_name){
		$this->load->library('email');
		$this->email->set_mailtype('html');
		$this->email->from($data['from'],$data['admin_full_name']);
		$this->email->to($data['to']);
		$this->email->subject($data['subject']);
		$message_body = $this->load->view("mailscripts/".$template_name,$data,true);
		// echo $message_body;
		// exit();
		$this->email->message($message_body);
		$this->email->send();
		$this->email->clear();
	}
	public function Order_success_mail_send($data,$template_name){
		//$this->load->library('email');
		$this->email->set_mailtype('html');
		$this->email->from($data['from'],$data['admin_full_name']);
		$this->email->to($data['to']);
		$this->email->subject($data['subject']);
		$message_body = $this->load->view("mailscripts/".$template_name,$data,true);
		// echo $message_body;
		// exit();     
		$this->email->message($message_body);
		$this->email->send();
		$this->email->clear();
	}
}