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
		$profil = $this->Authuser_Model->GetProfile("where username = '$session'");
		$data = array(
			"username" => $profil[0]['username'],
			"email" => $profil[0]['email'],
			"nama" => $profil[0]['nama'],
			"alamat" => $profil[0]['alamat'],
			 );
		$this->load->view('user/Profile', $data);
	}

	public function shoppingcart() {
		$this->load->view("user/headfoot/headerlogin");
		if (empty($this->session->userdata('masukin'))) {
			redirect('Home/login');
		} else {
			$sess = $this->session->userdata('masukin')['username'];
			$data['detail'] = $this->Authuser_Model->ambildetiluser($sess)[0];
			$this->load->view("user/shoppingcart",$data);
		}
		$this->load->view("user/headfoot/footer");
	}

	public function review() {
		$this->load->view('user/headfoot/headerlogin');
		if (empty($this->session->userdata('masukin'))) {
			redirect('Home/login');
		} else {
			$sess = $this->session->userdata('masukin')['username'];
			$data['detail'] = $this->Authuser_Model->ambildetiluser($sess)[0];
			// $data['kabupaten']=$this->Authuser_Model->get_all_kabupaten();
			$this->load->view("user/review", $data);
		}
		// $review = $this->Authuser_Model->getAllData("where username = '$sess" ); 
	 //    $usname = $orid[0]->username; 
	 //    $uname = $this->session->userdata('masukin')['user']; 
	 //    $barang = $this->Home_model->hasil_beli($orid[0]->id);  
		// 	$i = array( 
	 //      'kode'=>$kodeorder, 
	 //      'nama'=>$orid[0]->nama, 
	 //      'alamat'=>$orid[0]->addrr, 
	 //      'metod'=>$orid[0]->metode, 
	 //      'kontak'=>$orid[0]->noTelp, 
	 //      'email'=>$orid[0]->email, 
	 //      'status'=>$orid[0]->status_bayar, 
	 //      'barang'=>$barang, 
	 //      'ongkir'=>$orid[0]->biaya); 
		$this->load->view('user/headfoot/footer');
	}

	public function confirm($kode="") {
	$this->load->view('user/headfoot/headerlogin');
		if (empty($this->session->userdata('masukin'))) {
			redirect('Home/index');
		} else {
	if (empty($kode)) { 
      redirect('Home/category'); 
    }
		if(!$this->Home_model->getOrderJasa1($kode)) {
			$order = $this->Home_model->getOrder1($kode);
			$detilorder = array(
				'kode' => $order[0]->kode_order,
				'total' => $order[0]->subtotal+$order[0]->biaya
				);
		} else if (!$this->Home_model->getOrder1($kode)) {
			$order = $this->Home_model->getOrderJasa1($kode);
			$detilorder = array(
				'kode' => $order[0]->kode,
				'total' => $order[0]->total
				);
		}
		$this->load->view("home/confirm", $detilorder);
	}

	}
	$this->load->view('user/headfoot/fotoer');
}