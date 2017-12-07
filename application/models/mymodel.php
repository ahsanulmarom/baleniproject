<?php
	Class Mymodel extends CI_Model{

	function InsertData($tabelName,$data){
		$res = $this->db->insert($tabelName,$data);
		return $res;
	}

}
?>