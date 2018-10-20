<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}
	public function index()
	{
		$this->load->view('halaman_admin/admin');
	}
	public function transaksi()
	{
		$data['pengiriman'] = $this->Admin_model->getData();
		$this->load->view('halaman_admin/transaksi',$data);
	}
	public function change_status()
	{
		$this->Admin_model->change_status();
		redirect('Admin/transaksi','refresh');
	}
}
