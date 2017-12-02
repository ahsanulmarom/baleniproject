<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('M_login');
		$this->load->helper('url');
	}

	public function signup(){

	}
	
	public function login(){
		$this->load->view("user/login");
	}

	public function	index(){
		$this->load->view("template/header");
		$this->load->view("user/index"); 
		$this->load->view("template/footer");
	}

	public function	indexlogin(){
		$this->load->view("template/headerlogin");
		$this->load->view("user/indexlogin"); 
		$this->load->view("template/footer");
	}


	public function menu(){
		$this->load->view("template/header"); 
		$this->load->view("user/menu");
		$this->load->view("template/footer");
	}	

	public function profile(){
		$this->load->view("template/header");
		$this->load->view("user/profile"); 
		$this->load->view("template/footer"); 
	}

}