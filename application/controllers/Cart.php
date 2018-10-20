<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		if($this->session->userdata('nama') == null){
			echo '<script>alert("Harus Login Dahulu")</script>';
			redirect('login_pelanggan','refresh');
		}
	}
	public function index()
	{
		if(count($this->cart->contents()) == 0){
			echo '<script>alert("Cart Kosong Kembali Ke Halaman Awal")</script>';
			redirect('home','refresh');
		}
		$this->load->view('cart');
	}
	public function insert_cart()
	{
		$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => $this->input->post('qty'),
			'price'   => $this->input->post('harga'),
			'name'    => $this->input->post('nama'),
			'options' => array('Size' => $this->input->post('ukuran'))
		);
		$this->cart->insert($data);
		redirect('Cart');
	}
	public function update_cart()
	{
		$data = array();
		foreach ($this->input->post() as $key => $value) {
			$data[] = $value;
		}
		$this->cart->update($data);
		redirect('Cart');
	}
	public function remove_cart($rowid)			
	{
		$this->cart->remove($rowid);
		redirect('Cart');
	}
}
