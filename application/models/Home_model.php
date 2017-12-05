
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

 //Mengambil kategori pada table KATEGORI
public function getKategori() {
	$query = $this->db->select('*')
			->from('kategori')
			->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	function data_category_record($kate){
		$query = $this->db->select('*')
			->from('menu')
			->where('kategori', $kate)
			->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}

	public function getdetilKategori($kategori,$number,$offset) {
	$query = $this->db->limit($number,$offset)
			->select('*')
			->from('menu')
			->where('kategori', $kategori)
			->order_by('harga','DESC')
			->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}
}
?>