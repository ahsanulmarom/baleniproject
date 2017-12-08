<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Authuser_Model');
		$this->load->helper('url');

		$loggedin = $this->session->userdata('masukin');
	}

	public function menu(){
		$menu = array(
			'menu' => $this->Authuser_Model->getAllData('menu', 'nama', 'ASC'));
		if($this->session->userdata('masukin')) {
			$this->load->view("user/headfoot/headerlogin"); 
		} else {
			$this->load->view("user/headfoot/header"); 
		}
		$this->load->view("user/menu", $menu);
		$this->load->view("user/headfoot/footer");
	}	

	public function profile(){
		$this->load->view("template/headerlogin");
		$this->load->view("user/profile"); 
		$this->load->view("template/footer"); 
	}

	public function viewProfile(){
		$session = (string)($this->session->userdata('nama'));
		$profil = $this->mymodel->GetProfile("where username = '$session'");
		$data = array(
			"username" => $profil[0]['username'],
			"email" => $profil[0]['email'],
			"nama" => $profil[0]['nama'],
			"alamat" => $profil[0]['alamat'],
			 );
		$this->load->view('user/Profile', $data);
	}

	public function shoppingcart() {
		if (empty($this->session->userdata('masukin'))) {
			redirect('Home/login');
		} else {
			$sess = $this->session->userdata('masukin')['user'];
			$data['detail'] = $this->Home_model->ambildetiluser($sess)[0];
			$this->load->view("home/shoppingcart",$data);
		}
	}
}