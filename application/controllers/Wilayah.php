
<?php 
 if (!defined('BASEPATH'))exit('No direct script access allowed');

 class Wilayah extends CI_Controller {

  function __construct() {
   parent::__construct();
   
   $this->load->helper(array('url',''));
   $this->load->model('Authuser_Model');
   $this->load->database();
  }
  
  function add_ajax_kec($id_kab){
      $query = $this->db->get_where('wilayah_kecamatan',array('kabupaten_id'=>$id_kab));
      $data = "<option value=''> - Pilih Kecamatan - </option>";
      foreach ($query->result() as $value) {
          $data .= "<option value='".$value->id."'>".$value->nama."</option>";
      }
      echo $data;
  }
 }
?>