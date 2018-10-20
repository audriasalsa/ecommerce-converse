<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Pegawai_model');
		$this->load->helper('form');	
		if($this->session->userdata('level') != 'admin' && $this->session->userdata('level') != 'pegawai'){
			redirect('login/logout');
		}
	}

	public function index()
	{
		
		$this->load->view('pegawai/pegawai.php');
	}

	public function getAjax()
	{
		$data['data'] = $this->Pegawai_model->getData();
		echo json_encode($data);
	}
	public function tambah()
	{
		$this->load->library("form_validation");
	
		$this->form_validation->set_rules('nama','Nama','required|alpha|trim');
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');

	
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if($this->form_validation->run()==FALSE){
			$this->load->view('pegawai/tambah.php'); 
		}
		else{
			$this->Pegawai_model->insertData();
			echo "berhasil";
		}
	}

	public function ubah($id)
	{
		$this->load->library("form_validation");
	
		$this->form_validation->set_rules('nama','Nama','required|alpha|trim');
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		$data['getData'] = $this->Pegawai_model->getDataWhereId($id)[0];

		if($this->form_validation->run()==FALSE){
			$this->load->view('pegawai/ubah',$data);
		}
		else{
			$this->Pegawai_model->updateData($id);
			echo "berhasil";
		}
	}

	public function hapus($id)
	{
		$this->Pegawai_model->hapusData($id);
		redirect('pegawai');
	}
}
