<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	public function getData()
	{
		$this->db->select('*');
		$this->db->from("pelanggan");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function change_status()
	{
		$id = $this->input->post('id');
		$data['status'] = $this->input->post('status');
		if($data['status'] == 3 || $data['status'] == 4)
			$data['status_comment'] = $this->input->post('status_comment');
		$this->db->where('id',$id);
		$this->db->update('pelanggan',$data);
	}
}
