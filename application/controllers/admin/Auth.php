<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
            parent::__construct();
            $this->CI =& get_instance();

            $this->load->model('Authmin_model');
            $loggedin = $this->session->userdata('loggedin');
            if (empty($loggedin) || $loggedin != true) {
            	
            }
        }

	public function index() {
		redirect('admin/Dashboard');
	}

	public function masukadmin() {
		$usernameAdmin = htmlspecialchars($this->input->post('usernameAdmin'));
		$passwordAdmin = htmlspecialchars($this->input->post('passwordAdmin'));
		$isLogin = $this->Authmin_model->loginAdmin($usernameAdmin, $passwordAdmin);
		if($isLogin == true) {
			$loginadminData = array(
				'username' => $isLogin[0]->username,
				'name' => $isLogin[0]->adminName,
				'role' => $isLogin[0]->role,
				'time' => $isLogin[0]->lastLogin);
			$this->session->set_userdata('loggedin', $loginadminData);
			$this->index();
		}
	}

	public function logoutadmin() {
		$this->session->unset_userdata('loggedin');
		$this->session->sess_destroy();
		$this->index();
	}

	public function login() {
		$data['title'] = 'Baleni Admin';
		if($this->session->userdata('loggedin')) {
			redirect('admin/Dashboard');
		} else {
			$this->load->view('admin/login', $data);
		}
	}
}
?>