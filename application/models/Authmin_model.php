<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authmin_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function loginAdmin($usernameAdmin, $passwordAdmin) {
		$this->db->select('*');
		$this->db->where('username', $usernameAdmin);
		$this->db->where('password', $passwordAdmin);
		$this->db->from('admin');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else{
			return false;
		}
	}
}
?>