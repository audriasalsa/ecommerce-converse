<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}
	public function login_owner()
	{
		$this->load->view('login_owner');
	}
	public function login_pegawai()
	{
		$this->load->view('login_pegawai');
	}
	public function login_pelanggan()
	{
		$this->load->view('login_pelanggan');
	}
	public function proses_pegawai()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$autentikasi = $this->Login_model->autentikasi_pegawai($username,$password);
		if($autentikasi['num_rows'] == 1){
			$this->session->set_userdata($autentikasi['data'][0]);
			redirect('Produk','refresh');
		}else{
			echo '<script>Alert("Login Gagal")</script>';
			redirect('login_pegawai','refresh');
		}
	}
	public function proses_pelanggan()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$autentikasi = $this->Login_model->autentikasi_pelanggan($username,$password);
		if($autentikasi['num_rows'] == 1 && $autentikasi['status'] != 4){
			$this->session->set_userdata($autentikasi['data'][0]);
			redirect('Home/pelanggan','refresh');
		}else{
			if($autentikasi['status'] == 4){
				echo '<script>alert("Akun telah di banned , dengan catatan '.$autentikasi['data'][0]['status_comment'].'")</script>';
			}else{
				echo '<script>alert("Login Gagal")</script>';
			}
			$this->session->set_flashdata('message',"Username dan password tidak valid");
			redirect('login_pelanggan','refresh');
		}
	}

		public function proses_owner()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$autentikasi = $this->Login_model->autentikasi_owner($username,$password);
		if($autentikasi['num_rows'] == 1){
			$this->session->set_userdata($autentikasi['data'][0]);
			redirect('Admin/transaksi','refresh');
		}else{
			echo '<script>Alert("Login Gagal")</script>';
			redirect('login_owner','refresh');
		}
	}

	public function register()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules("nama","Nama","required");
		$this->form_validation->set_rules("alamat","Alamat","required");
		$this->form_validation->set_rules("nohp","Nomor HP","required");
		$this->form_validation->set_rules("email","Email","required|is_unique[pelanggan.email]|valid_email");
		$this->form_validation->set_rules("username","Username","required|is_unique[pelanggan.username]|alpha_dash");
		$this->form_validation->set_rules("password","Password","required|min_length[8]|matches[re-password]");
		$this->form_validation->set_rules("re-password","re-password","required");

		$this->form_validation->set_error_delimiters('<div class="alert-message" role="alert">', '</div>');
		if ($this->form_validation->run() == false) {
			$this->load->view('register_pelanggan');
		}else{
			$this->Login_model->register();
			echo '<script>alert("Registrasi berhasil silahkan login")</script>';
			redirect('login_pelanggan','refresh');
		}
	}
	public function validasi_email($email)
	{
		$isvalid = $this->Login_model->check_data_pelanggan("email",$email);
		if($isvalid){
			return true;
		}else{
			$this->form_validation->set_message('email','Please choose another Email');
			return false;
		}
	}
	public function validasi_username($username)
	{
		$isvalid = $this->Login_model->check_data_pelanggan("username",$username);
		if($isvalid){
			return true;
		}else{
			$this->form_validation->set_message('username','Please choose another Username');
			return false;
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		echo '<script>Alert("Terimakasih telah menggunakan layanan kami")</script>';
		redirect('','refresh');
	}
}
