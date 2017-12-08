
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

	public function GetProfile($where){
			$data = $this->db->get('user '. $where);
			return $data->result_array();
	}	

	public function ambildetiluser($username) {
		$this->db->select('*');
		$this->db->where('username', $username);
		$this->db->from('user');
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		}
		else{
			return false;
		}
	}	

	function cekrand($kode){
		$this->db->where('kode_order', $kode);
        $this->db->from('order');
        $num = $this->db->count_all_results();
        return $num;
	}

	function get_all_kabupaten() {
		$this->db->select('*');
		$this->db->from('wilayah_kabupaten');
		$query = $this->db->get();
		return $query->result();
	}
}
?>