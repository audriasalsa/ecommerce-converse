<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function autentikasi_pegawai($username,$password)
	{
		$this->db->select('id,nama,username,level');
		$this->db->from("pegawai");
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get();
		$data['num_rows'] = $query->num_rows();
		$data['data'] = $query->result_array();
		return $data;
	}

		public function autentikasi_owner($username,$password)
	{
		$this->db->select('id,nama,username');
		$this->db->from("owner");
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get();
		$data['num_rows'] = $query->num_rows();
		$data['data'] = $query->result_array();
		return $data;
	}

	public function autentikasi_pelanggan($username,$password)
	{
		$this->db->select('id,nama,username,image,status,status_comment');
		$this->db->from("pelanggan");
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query = $this->db->get();
		$data['num_rows'] = $query->num_rows();
		$data['data'] = $query->result_array();
		$data['status'] = -1;
		if($data['num_rows'] > 0)
			$data['status'] = $data['data'][0]['status'];
		return $data;
	}
	public function register()
	{
		$data = $this->input->post();
		$data['password'] = md5($data['password']);
		unset($data['re-password']);
		$this->db->insert('pelanggan',$data);
	}
	public function check_data_pelanggan($column,$value)
	{
		$this->db->where($column,$value);
		$query = $this->db->get('pelanggan');
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}
