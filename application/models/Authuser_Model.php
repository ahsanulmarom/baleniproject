
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authuser_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	public function getAllData($namaTabel, $urut, $asc) {
		$this->db->select('*');
		$this->db->from($namaTabel);
		$this->db->order_by($urut, $asc);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		else{
			return false;
		}
	}

	function GetProfile($where){
			$data = $this->db->get('user '. $where);
			return $data->result_array();
	}		
}
?>