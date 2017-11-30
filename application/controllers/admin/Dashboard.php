<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
            parent::__construct();

            $this->load->model('Authmin_model');
            if (!$this->session->userdata('loggedin')) {
            	redirect('admin/Auth/login');
            }
        }

	public function index() {
		$data['title'] = 'Baleni Dashboard';
		$this->load->view('admin/headfoot/sider',$data);
		$this->load->view('admin/headfoot/header');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/headfoot/footer');
	}

	public function manageAdmin() {
		$data['title'] = 'Manage Admin';
		$dataadmin = array(
			'admin'=> $this->Authmin_model->getAllData('admin'));
		$this->load->view('admin/headfoot/sider',$data);
		$this->load->view('admin/headfoot/header');
		$this->load->view('admin/listadmin', $dataadmin);
		$this->load->view('admin/headfoot/footer');
	}

	public function manageUser() {
		$data['title'] = 'Manage User';
		$datauser = array(
			'user'=> $this->Authmin_model->getAllData('user'));
		$this->load->view('admin/headfoot/sider',$data);
		$this->load->view('admin/headfoot/header');
		$this->load->view('admin/listuser', $datauser);
		$this->load->view('admin/headfoot/footer');
	}

	public function addAdmin() {
		$data['title'] = 'Add Admin';
		$this->load->view('admin/headfoot/sider',$data);
		$this->load->view('admin/headfoot/header');
		$this->load->view('admin/addAdmin');
		$this->load->view('admin/headfoot/footer');
	}

	public function category() {
		$data['title'] = 'Manage Category';
		$datacategory = array(
			'kategori' => $this->Authmin_model->getAllData('kategori'),
			'title' => 'Manage Category');
		$this->load->view('admin/headfoot/sider',$data);
		$this->load->view('admin/headfoot/header');
		$this->load->view('admin/category', $datacategory);
		$this->load->view('admin/headfoot/footer');
	}

	public function addMenu() {
		$data['title'] = 'Add Menu';
		$this->load->view('admin/headfoot/sider',$data);
		$this->load->view('admin/headfoot/header');
		$this->load->view('admin/addMenu', $data);
		$this->load->view('admin/headfoot/footer');
	}

	public function addCategory() {
		$newcategory = htmlspecialchars(strtoupper($this->input->post('newcategory')));
		$datainsert = array('namaKategori' => $newcategory);
		$hasil = $this->Authmin_model->InsertData('kategori', $datainsert);
		if($hasil) {
			$this->session->set_flashdata('success','Kategori ' . $newcategory . " berhasil ditambahkan.");
			redirect('admin/Dashboard/category');
		} else {
			$this->session->set_flashdata('error','Kategori gagal ditambahkan!');
			redirect('admin/Dashboard/category');
		}
	}

	public function deleteCategory($id) {
		$this->Authmin_model->deleteData('kategori', 'id', $id);
		$this->session->set_flashdata('success','Kategori berhasil Dihapus.');
			redirect('admin/Dashboard/category');
	}

	public function insertAdmin() {
		$email = htmlspecialchars($this->input->post('emailnewadmin'));
		$password = htmlspecialchars($this->input->post('passwordnewadmin'));
		$name = htmlspecialchars($this->input->post('namenewadmin'));
		$role = $this->input->post('rolenewadmin');

		$datainsert = array(
			'username' => $email,
			'password' => $password,
			'adminName' => $name,
			'role' => $role);

		$hasil = $this->Authmin_model->InsertData('admin', $datainsert);
		if($hasil) {
			$this->session->set_flashdata('success','Admin ' . $email . " berhasil ditambahkan.");
			redirect('admin/Dashboard/addAdmin');
		} else {
			$this->session->set_flashdata('error','Admin gagal ditambahkan. Email sudah digunakan!');
			redirect('admin/Dashboard/addAdmin');
		}
	}

	public function deleteadmin($id) {
		$this->Authmin_model->deleteData('admin', 'id', $id);
		$this->session->set_flashdata('success','Admin berhasil Dihapus.');
			redirect('admin/Dashboard/manageAdmin');
	}
}