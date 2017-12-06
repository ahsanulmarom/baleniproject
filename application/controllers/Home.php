<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->model('mymodel');
		$this->load->model('Home_model');
		$this->load->model('Product_model');

		$this->load->helper('url');
	}

	public function signup(){
		$this->load->view("user/signup");
	}

	public function do_signup() {
		$this->load->helper('form');
		$this->load->library('form_validation');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password'); 
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$data_insert = array(
			'username' => $username, 
			'email' => $email, 
			'password' => $password, 
			'nama' => $nama, 
			'alamat' => $alamat
			);

		$res = $this->db->insert('user', $data_insert);
		if($res>=1){
			redirect('Home/indexlogin');
		}else{
			echo "<h2> TETOT </h2>";
			var_dump($data_insert);
			var_dump($res);
		}
		
	}
	
	public function login(){
		$this->load->view("user/login");
	}

	public function	index(){
		if($this->session->userdata('status') != 'login'){
			$this->load->view("template/header");
			$this->load->view("user/index"); 
			$this->load->view("template/footer");
		}else{ 
			redirect("Home/indexlogin"); 
		}
		
	}

	public function	indexlogin(){
		$this->load->view("template/headerlogin");
		$this->load->view("user/indexlogin"); 
		$this->load->view("template/footer");
	}

	public function menu(){
		// $barang = $this->Home_model->getbarang($id);
		// $get = $this->Product_model->gambarDet($id);
		// $kode = $barang[0]->kode;
		// $data = array(
		// 	'nama' => $nama[0],
		// 	'kategori'=>$kategori,
		// 	'gambar'=>$get);		
		$this->load->view("template/headerlogin"); 
		$this->load->view("user/menu");
		$this->load->view("template/footer");
	}	

	// public function menu($id) {
	// 	if (empty($this->session->userdata('masukin'))) {
	// 		redirect('Home/signup');
	// 	} else {
	// 	$barang = $this->Home_model->getBarang($id);
	// 	$kota = $this->Home_model->cariKota();
	// 	$kode = $barang[0]->kode;
	// 	$get = $this->Product_model->gambarDet($kode);
	// 	$data = array('barang' => $barang[0],
	// 		'kota'=>$kota,
	// 		'gambar'=>$get);
	// 	$this->load->view("user/menu", $data);
	// 	}
	// }

	public function gambarDet($kode) {
		$this->db->select('*');
		$this->db->where('jid',$kode);
		$this->db->from('jualan_review');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
		else{
			return false;
		}
	}

	public function profile(){
		$this->load->view("template/headerlogin");
		$this->load->view("user/profile"); 
		$this->load->view("template/footer"); 
	}

	public function shoppingCart(){
		$this->load->view("template/headerlogin");
		$this->load->view("user/shoppingcart");
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
		// var_dump($session);
		// var_dump($data);
		// var_dump($profil);
	}
}