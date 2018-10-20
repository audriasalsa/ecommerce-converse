<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function getData()
	{
		$this->db->select('pemesanan.*,pelanggan.nama,pelanggan.alamat,pelanggan.nohp,pelanggan.email');
		$this->db->from("pemesanan");
		$this->db->join("pelanggan","pemesanan.fk_id_pelanggan=pelanggan.id",'left');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function change_status()
	{
		$id = $this->input->post('id');
		$data['status_order'] = $this->input->post('status_order');
		$this->db->where('id',$id);
		$this->db->update('pemesanan',$data);
	}
}
