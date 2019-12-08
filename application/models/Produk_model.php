<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	public function getData($where=false)
	{
		$this->db->select('*');
		$this->db->from("produk");
		
		if($where){
			$this->db->where($where);
		}		
		$this->db->where('deletedby',null);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function getProduk()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('produk_detail','produk.id = produk_detail.fk_id_produk','left');
		$this->db->where('produk_detail.stok >',0);
		// $this->db->where('gender',$this->input->post('gender'));
		$this->db->where_in('tipe',$this->input->post('tipe'));
		// $this->db->where_in('series',$this->input->post('series'));
		switch ($this->input->post('harga')) {
			case 'a':
				$this->db->where('harga <=',500000);
				break;
			case 'b':
				$this->db->where('harga >',500000);
				$this->db->where('harga <=',750000);	
				break;
			case 'c':
				$this->db->where('harga >',750000);
				$this->db->where('harga <=',1000000);
				break;
			case 'd':
				$this->db->where('harga >=',1000000);
				break;
			default:
				break;
		}
		return $this->db->get()->result_array();
	}
	public function all_category()
	{
		$this->db->select('tipe,count(*) as jml');
		$this->db->from('produk');
		$this->db->group_by('tipe');
		$data['tipe'] = $this->db->get()->result_array();
		// $this->db->select('tipe,count(*) as jml');
		// $this->db->from('produk');
		// $this->db->group_by('tipe');
		// $data['tipe'] = $this->db->get()->result_array();
		// $this->db->select('series,count(*) as jml');
		// $this->db->from('produk');
		// $this->db->group_by('series');
		// $data['series'] = $this->db->get()->result_array();
		// $this->db->select('warna,count(*) as jml');
		// $this->db->from('produk');
		// $this->db->group_by('warna');
		// $data['warna'] = $this->db->get()->result_array();
		return $data;
	}
	public function search_word($word)
	{
		$this->db->select('distinct(produk.id),produk.*');
		$this->db->from("produk");
		$this->db->join('produk_detail','produk.id = produk_detail.fk_id_produk','left');
		$this->db->group_by('produk.id');
		if($word){
			$this->db->like('produk.nama',$word);
			$this->db->or_like('produk.deskripsi',$word);
			$this->db->or_like('produk.tipe',$word);
			$this->db->or_like('produk.harga',$word);

		}
		$this->db->where('produk_detail.stok >',0);
		$this->db->where('produk.deletedby',null);		
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getDataWithDetail($where=false)
	{	
		$this->db->select('produk.*');
		$this->db->from("produk");
		$this->db->join('produk_detail','produk.id = produk_detail.fk_id_produk','left');
		$this->db->group_by('produk.id,produk.nama,produk.deskripsi,produk.image,produk.harga,produk.discount');
		if($where){
			$this->db->where($where);
		}
		$this->db->where('produk.deletedby',null);		
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getDataWhereId($id)
	{
		$this->db->select('*');
		$this->db->from("produk");
		$this->db->where('id',$id);
		$this->db->where('deletedby',null);
		return $this->db->get()->result_array();
	}

	public function insertData($upload_name)
	{
		$data = $this->input->post();
		$data['image'] = $upload_name;
		$data['createdby'] = $this->session->userdata('id');
		$this->db->insert("produk",$data);
	}

	public function updateData($id,$upload_name=null)	
	{
		$data = $this->input->post();
		$data['editedby'] = $this->session->userdata('id');
		
		if($upload_name!=null){
			$data['image'] = $upload_name;
			$this->delete_image($id);
		}
$this->db->where('id',$id);
		if($this->db->update("produk",$data)){
			return "Berhasil";
		}
	}

	public function hapusData($id)
	{
		//$this->delete_image($id);
		$this->db->where('id',$id);
		$data['deletedby'] = $this->session->userdata('id');
		if($this->db->update("produk",$data)){
			return "Berhasil";
		}
	}

	public function upload(){
        $config['upload_path'] = './assets/img/produk/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['remove_space'] = TRUE;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('image')){
            $return = array('result' => 'success', 'file' => $this->upload->data(),
            'error' => '');
            return $return;
        }else{
            $return = array('result' => 'failed', 'file' => '', 'error' =>
            $this->upload->display_errors());
            return $return;
        }
    }

    public function delete_image($id)
    {
    	$data = $this->db->get_where('produk',array('id'=>$id))->result_array();
		unlink('./uploads/'.$data[0]['image']);
    }

    public function get_produk_detail($id,$where=false)
    {
    	$this->db->where('fk_id_produk',$id);
    	if($where){
    		$this->db->where($where);
    	}
    	$this->db->where('deletedby',null);
    	return $this->db->get('produk_detail')->result_array();
    }

    public function insert_produk_detail($id)
    {
    	$data = $this->input->post();
    	$data['fk_id_produk'] = $id;
		$data['createdby'] = $this->session->userdata('id');
    	$this->db->insert('produk_detail',$data);
    }
    public function delete_produk_detail($id,$ukuran)
    {
    	$this->db->where('fk_id_produk',$id);
    	$this->db->where('ukuran',$ukuran);
    	$this->db->delete('produk_detail');
    }
}
