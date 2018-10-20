<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Produk_model');
		$this->load->helper('form');	
		if($this->session->userdata('level') != 'admin' && $this->session->userdata('level') != 'pegawai'){
			redirect('login/logout');
		}
	}

	public function index()
	{
		$data['kata'] ="converse";
		$data['getData'] = $this->Produk_model->getData();
		$this->load->view('produk/produk.php',$data);
	}

	public function tambah()
	{
		$this->load->library("form_validation");
	
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('deskripsi','deskripsi','required');
		$this->form_validation->set_rules('harga','harga','required|numeric');
		$this->form_validation->set_rules('discount','discount','required|numeric');

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if($this->form_validation->run()==FALSE){
			$this->load->view('produk/tambah.php'); 
		}
		else{
			$upload = $this->Produk_model->upload();
			if($upload['result'] == "success"){ 
				$this->Produk_model->insertData($upload['file']['file_name']);
				redirect('Produk');
			}else{
				$data['message'] = $upload['error'];
				$this->load->view('produk/tambah.php',$data); 
			}
		}
	}

	public function ubah($id)
	{
		$this->load->library("form_validation");
	
		$this->form_validation->set_rules('nama','nama','required');
		$this->form_validation->set_rules('deskripsi','deskripsi','required');
		$this->form_validation->set_rules('harga','harga','required|numeric');
		$this->form_validation->set_rules('discount','discount','required|numeric');

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		
		$data['getData'] = $this->Produk_model->getDataWhereId($id)[0];

		if($this->form_validation->run()==FALSE){
			$this->load->view('produk/ubah',$data);
		}
		else{
			if ($_FILES['image']['name'] == "")
			{
				$this->Produk_model->updateData($id);
				redirect('Produk');
			}
			else
			{
				$upload = $this->Produk_model->upload();
				if($upload['result'] == "success"){ 
					$this->Produk_model->updateData($id,$upload['file']['file_name']);
					redirect('Produk');
				}else{ 
					$data['error_upload'] = $upload['error'];
					$this->load->view('produk/ubah',$data);
				}
			}
		}
	}

	public function hapus($id)
	{
		$this->Produk_model->hapusData($id);
		redirect('Produk');
	}

	public function show_produk_detail($id)
	{
		$data['id'] = $id;
		$this->load->view('produk_detail/produk_detail',$data);
	}
	public function get_data_produk_detail($id)
	{
		$data['id'] = $id;
		$data['produk_detail'] = $this->Produk_model->get_produk_detail($id);
		$this->load->view('produk_detail/show_data',$data);
	}
	public function add_produk_detail($id)
	{
		$data['id'] = $id;
		$this->load->library("form_validation");
	
		$this->form_validation->set_rules('ukuran','ukuran','required');
		$this->form_validation->set_rules('stok','stok','required|numeric');

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if($this->form_validation->run()==FALSE){
			$this->load->view('produk_detail/input.php',$data); 
		}
		else{
			$this->Produk_model->insert_produk_detail($id);
			echo "berhasil";
		}
	}
	public function remove_produk_detail($id,$ukuran)
	{
		$this->Produk_model->delete_produk_detail($id,$ukuran);
		echo "berhasil";
	}
}
