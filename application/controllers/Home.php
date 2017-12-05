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
			'alamat' => $alamat,
			);

		$res = $this->db->insert('user', $data_insert);
		if($res>=1){
			redirect('user/indexlogin');
		}else{
			echo "<h2> TETOT </h2>";
			var_dump($data_insert);
			var_dump($res);
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
		$this->load->view("template/headerlogin"); 
		$this->load->view("user/menu");
		$this->load->view("template/footer");
	}	

	public function profile(){
		$this->load->view("template/headerlogin");
		$this->load->view("user/profile"); 
		$this->load->view("template/footer"); 
	}
}