<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_model');
	}
	public function index()
	{
		$data['pelanggan'] = $this->Pelanggan_model->getData();
		$this->load->view('pelanggan/pelanggan',$data);
	}
	public function change_status()
	{
		$this->Pelanggan_model->change_status();
		redirect('Pelanggan','refresh');
	}
}
