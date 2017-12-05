<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

    //Mengambil data pada table Menu
    function _getData(){
	$query = $this->db->select('*')
			->from('menu')
			->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}
}
 ?>