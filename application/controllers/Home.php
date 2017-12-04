<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->helper('url');
	}

	public function signup(){
		$this->load->view("user/signup");
	}

	public function do_signup() {
		
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		/* $x = str_split($_POST['password']);
		$password = md5("~4h5@N;" . $_POST['password'] . "-13uRh4n,"); */ 
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];

		$data_insert = array(
			'username' => $username, 
			'email' => $email, 
			'password' => $password, 
			'nama' => $nama, 
			'alamat' => $alamat,
			);

		$res = $this->db->insert('profile',$data_insert);
		if($res>=1){
			redirect('user/indexlogin');
		}else{
			echo "<h2> TETOT </h2>";
		}
		
		/*
		if($password == $repassword && count($x) > 3) {
		$InsertUser = array(
			'username' => $username,
			'password' => $password,
			'email' => $email
		);

		$InsertProfile = array(
			'username' => $username,
			'nama' => $nama,
		);
		
		$hasil = $this->Home_model->InsertData('user', $InsertUser);
		$hasil1 = $this->Home_model->InsertData('profile', $InsertProfile);
		if($hasil > 0 && $hasil1 > 0) {
			// send email
        		$this->Home_model->sendEmail($this->input->post('emaildaftar'));
                // successfully sent mail
                $this->session->set_flashdata('success','Akun berhasil dibuat');
                redirect('Home/indexlogin');
		} else {
			$this->session->set_flashdata('error','Cek kembali data inputan anda');
			redirect('Home/signup');
		} 
		} else {
			$this->session->set_flashdata('error','Cek kembali data inputan anda');
			redirect('Home/signup');
		} */
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
		$this->load->view("template/headerlogin"); 
		$this->load->view("user/menu");
		$this->load->view("template/footer");
	}	

	public function profile(){
		$this->load->view("template/headerlogin");
		$this->load->view("user/profile"); 
		$this->load->view("template/footer"); 
	}

	public function shoppingcart(){
		$this->load->view("user/shoppingcart");
	}

}