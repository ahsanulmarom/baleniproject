<?php
	Class Mymodel extends CI_Model{

	function InsertData($tabelName,$data){
		$res = $this->db->insert($tabelName,$data);
		return $res;
	}
	function GetProfile($where){
			$data = $this->db->get('user '. $where);
			return $data->result_array();
	}

}
?>