<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_login');
		$this->load->helper('url');
	}


	public function	index(){
		$this->load->view("template/header");
		$this->load->view("user/index"); 
		$this->load->view("template/footer");
	}


	public function menu(){
		$this->load->view("template/header"); 
		$this->load->view("user/menu");
		$this->load->view("template/header");
	}	

	public function contact(){
		$this->load->view("template/header");
		$this->load->view("user/contact");
		$this->load->view("template/footer");
	}	
}