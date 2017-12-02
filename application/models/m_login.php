<?php 
 
class M_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function getMenu(){
	$query=$this->db->get('menu');
	 return $query->result_array();  
	}
}




	

