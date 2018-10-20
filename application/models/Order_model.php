<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

	public function insert_order()
	{
		$data['status_order'] = 'belum di bayar';
		$data['fk_id_pelanggan'] = $this->session->userdata('id');
		$query = $this->db->insert('pemesanan',$data);
		return $this->db->insert_id();
	}
	public function insert_order_detail($data)
	{
		$this->db->insert_batch('pemesanan_detail',$data);
	}
	public function get_order_total($id)
	{
		$this->db->select('sum(pemesanan_detail.jumlah*produk.harga) as total');
		$this->db->where('fk_id_pemesanan',$id);
		$this->db->join('produk','fk_id_produk=produk.id');
		return $this->db->get('pemesanan_detail')->row(0)->total;
	}
	public function getDataWhere($where)
	{
		$this->db->select("pms.id,pms.date_order,pms.status_order,group_concat(produk.nama,'-',pemesanan_detail.ukuran,'-',pemesanan_detail.jumlah) as detail_produk,sum(pemesanan_detail.jumlah*harga) as total");
		$this->db->from('pemesanan pms');
		$this->db->join('pemesanan_detail','pms.id = pemesanan_detail.fk_id_pemesanan','left');
		$this->db->join('produk','pemesanan_detail.fk_id_produk=produk.id','left');
		$this->db->group_by('pms.id,pms.date_order,pms.status_order');
		$this->db->where($where);
		return $this->db->get()->result_array();
	}
}
