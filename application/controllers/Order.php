<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Authuser_Model');
		$this->load->helper('url');

		$loggedin = $this->session->userdata('masukin');
	}

	function add(){
		$addtocart = array(
			'id' =>$this->input->post('id'),
			'name'=>$this->input->post('name'),
			'price'=>$this->input->post('price'),
			'qty'=> $this->input->post('qty'),
			'deskripsi'=>$this->input->post('deskripsi')
			);
		$this->cart->insert($addtocart);
		redirect('Home_Dashboard/shoppingcart');
	}

	function remove($rowid){
		if ($rowid==="all"){
			$this->cart->destroy();
		}else{
			$data = array(
			'rowid' => $rowid,
			'qty' => 0
			);
			$this->cart->update($data);
		}

		redirect('Home_Dashboard/shoppingcart');
	}

	function update_cart(){
	// Recieve post values,calcute them and update
	$cart_info = $_POST['cart'] ;
	foreach( $cart_info as $id => $cart){
		$rowid = $cart['rowid'];
		$price = $cart['price'];
		$amount = $price * $cart['qty'];
		$qty = $cart['qty'];

		$data = array(
		'rowid' => $rowid,
		'price' => $price,
		'amount' => $amount,
		'qty' => $qty
		);

		$this->cart->update($data);
	}
	redirect('Home_Dashboard/shoppingcart');
	// var_dump($cart_info);
	}

	function add_ajax_kec($id_kab){
        $query = $this->db->get_where('wilayah_kecamatan',array('kabupaten_id'=>$id_kab));
        $data = "<option value=''> -- Pilih Kecamatan -- </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id."'>".$value->nama."</option>";
        }
        echo $data;
    }

    function add_ajax_des($id_kec){
      $query = $this->db->get_where('wilayah_desa',array('kecamatan_id'=>$id_kec));
      $data = "<option value=''> - Pilih Desa - </option>";
      foreach ($query->result() as $value) {
          $data .= "<option value='".$value->id."'>".$value->nama."</option>";
      }
      echo $data;
  	}

	function save_to_db(){
		$user = $this->Home_model->ambildetiluser($this->session->userdata('masukin')['user']);
		$this->form_validation->set_rules('alamat','Alamat Penerima','required|trim|min_length[8]');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat').', '.$this->input->post('daerah');
		$telp = $this->input->post('telp');
		do{
		        $kode = $this->randString(7);
		        $num = $this->Authuser_Model->cekrand($kode);
			} while($num>=1);

		if ($this->form_validation->run()) {
			$order = array(			
				'usercustomer'=>$this->session->userdata('masukin')['username'],
				'kode_order'=>$kode,
				'alamat'=>$alamat,
				'subtotal'=>$this->input->post('subtotal'));
			$orid = $this->Home_model->insert_order($order,'order');
			if ($cart = $this->cart->contents()) {
				foreach ($cart as $c) {
					$detil = array(
						'orderid'=>$orid,
						'kode'=>$c['id'],
						'kuantitas'=>$c['qty'],
						'harga'=>$c['price'],
						'deskripsi'=>$c['deskripsi']);
				$this->Home_model->insert_order($detil,'detil_order');
				}
			$this->cart->destroy();
			}
		}else{
			echo validation_errors();
			redirect('Home/shoppingcart');
		}
		redirect('Home/review/'.$kode);
	}

	function randString($panjang){
		 $characters = '012345678909876543211234567890';
		 $string = '';
		 $max = strlen($characters) - 1;
		 for ($i = 0; $i < $panjang; $i++) {
		      $string .= $characters[mt_rand(0, $max)];
		 }
		 return $string;
	}
}