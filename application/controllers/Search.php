<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Search Controller
*/
class Search extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model("SearchModel");
	}
	public function index(){
		
		$data['slider'] = $this->load->view('front/advertise_top','',true);
		$data['recommended'] = "";
		$data['category_brand'] = $this->load->view('front/category','',true);

		$data['search_data'] = $this->SearchModel->get_search();
		$data['feature'] = $this->load->view("front/search",$data,true);
		$this->load->view('front/index',$data);

	}
}
