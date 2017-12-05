<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('m_login');

		$this->load->model('Home_model');
		$this->load->model('Product_model');
		$this->load->library('pagination');
         // $loggedin = $this->session->userdata('masukin');

		$this->load->helper('url');
	}

	public function signup(){
		$this->load->view("user/signup");
	}

	public function do_signup() {
		
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
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


	// public function menu(){
	// 	$this->load->view("template/headerlogin"); 
	// 	$this->load->view("user/menu");
	// 	$this->load->view("template/footer");
	// }	

	public function profile(){
		$this->load->view("template/headerlogin");
		$this->load->view("user/profile"); 
		$this->load->view("template/footer"); 
	}

	public function shoppingcart(){
		$this->load->view("user/shoppingcart");
	}


	//Display Menu by Category
	public function category() {
		$data = array(
			'data' => $this->Home_model->getKategori(),
			'menu' => $this->Product_model->_getData());

		if (empty($this->session->userdata('masukin'))) {
			$this->load->view("template/header");
		} else {
			$this->load->view("template/header");
		}
		$this->load->view("user/category", $data);
	}



	public function detilcategory($kategori) {
		$config['base_url'] = base_url().'Home/detilcategory/'.$kategori;
		$config['total_rows'] = count($this->Home_model->data_category_record($kategori));
		$config['per_page'] = 30;
		// STYLING 
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		$offset = $this->uri->segment(4);
		$this->pagination->initialize($config);

		$data = array(
			'data' => $this->Home_model->getKategori(),
			'menu' => $this->Home_model->getdetilKategori($kategori,$config['per_page'],$offset));

		if(empty($this->Home_model->getdetilKategori($kategori,$config['per_page'],$offset))) {
			$this->session->set_flashdata('error','Kategori barang tidak ditemukan!');
			$this->category();
		} else {
			if (empty($this->session->userdata('masukin'))) {
				$this->load->view("template/header");
			} else {
				$this->load->view("template/headerlogin");
			}
		$this->load->view("user/category", $data);
		}
	}


//DETAIL MENU
//MENU()=BARANG()
public function menu($id) {
		if (empty($this->session->userdata('masukin'))) {
			redirect('home/signup');
		} else {
		// $barang = $this->Home_model->getBarang($id);
		// $kota = $this->Home_model->cariKota();
		// $kode = $barang[0]->kode;
		// $get = $this->Product_model->gambarDet($kode);
		// $data = array('barang' => $barang[0],
		// 	'kota'=>$kota,
		// 	'gambar'=>$get);
		// $this->load->view("home/barang", $data);
	}
	}


}