<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

	public function getData()
	{
		$this->db->select('*');
		$this->db->from("pegawai");
		$this->db->where('deletedby',null);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function getDataWhereId($id)
	{
		$this->db->select('*');
		$this->db->from("pegawai");
		$this->db->where('id',$id);
		$this->db->where('deletedby',null);
		return $this->db->get()->result_array();
	}

	public function insertData()
	{
		$data = $this->input->post();
		$data['password'] = md5($data['password']);
		$data['createdby'] = $this->session->userdata('id');
		$this->db->insert("pegawai",$data);
	}

	public function updateData($id)	
	{
		$data = $this->input->post();
		$data['password'] = md5($data['password']);
		$data['editedby'] = $this->session->userdata('id');
		$this->db->where('id',$id);
		if($this->db->update("pegawai",$data)){
			return "Berhasil";
		}
	}

	public function hapusData($id)
	{
		$this->db->where('id',$id);
		$data['deletedby'] = $this->session->userdata('id');
		if($this->db->update("pegawai",$data)){
			return "Berhasil";
		}
	}
}
