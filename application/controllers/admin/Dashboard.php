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

	public function navbar() {
		$this->load->view('admin/navbar');
	}
}