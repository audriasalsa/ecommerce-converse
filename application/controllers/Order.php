<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('Order_model');
	}
	public function addorder()
	{
		$datacart = $this->cart->contents();
		if($id_pemesanan = $this->Order_model->insert_order()){
			$data = array();
			foreach ($datacart as $key => $value) {
				$data[] = array(
					'fk_id_pemesanan' => $id_pemesanan,
					'fk_id_produk' => $value['id'],
					'ukuran' => $value['options']['Size'],
					'jumlah' => $value['qty']
				);
			}
			$this->Order_model->insert_order_detail($data);
			$total = $this->Order_model->get_order_total($id_pemesanan);
			$this->cart->destroy();
			echo "<script>alert('Pemesanan berhasil,Total Harga = ".$total."')</script>";
			redirect('','refresh');
		}
	}
}
