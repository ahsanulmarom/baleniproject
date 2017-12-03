<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

public function InsertData($tabelName,$data){
		$res = $this->db->insert($tabelName,$data);
		return $res;
	}

?>