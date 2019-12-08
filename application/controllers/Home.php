<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		$this->load->model('Produk_model');
		$where = array(
			'produk_detail.stok >' => 0
		);
		$data['produk'] = $this->Produk_model->getDataWithDetail($where);
		$this->load->view('home',$data);
	}
	public function tipe($tipe)
	{
		$this->load->model('Produk_model');
		$where = array(
			'tipe' => $tipe,
			'produk_detail.stok >' => 0
		);
		$data['produk'] = $this->Produk_model->getDataWithDetail($where);
		$this->load->view('home',$data);
	}
	public function produk($id)
	{
		$this->load->model('Produk_model');
		$data['produk'] = $this->Produk_model->getDataWhereId($id)[0];
		$where['stok >'] = 0;
		$data['produk_detail'] = $this->Produk_model->get_produk_detail($id,$where);
		$this->load->view('produk',$data);
	}
	public function pelanggan($all = false)
	{
		if ($this->session->userdata('status') == null) {
			redirect('Login/logout','refresh');
		}
		$this->load->model('Order_model');
		$where = array(
			'fk_id_pelanggan' => $this->session->userdata('id'),
		);
		if(!$all){
			$where['status_order'] = 'belum di bayar';
		}
		$data['pemesanan'] = $this->Order_model->getDataWhere($where);
		$this->load->view('halaman_pelanggan/home',$data);
	}
	public function category()
	{
		$this->load->model('Produk_model');
		$data = $this->Produk_model->all_category();
		$where = array(
			'produk_detail.stok >' => 0
		);
		$data['produk'] = $this->Produk_model->getDataWithDetail($where);
		if ($this->input->post('search') != null) {
			$data['produk'] = $this->Produk_model->search_word($this->input->post('search'));
		}
		$this->load->view('category', $data);
	}
	public function getProduk()
	{ 
		$this->load->model('Produk_model');
		$produk = $this->Produk_model->getProduk();
		if (count($produk) == 0) {
			echo 'KOSONG';
		}else{
			?>
			<?php foreach ($produk as $key => $value): ?>
				<div class="col-sm-12 col-lg-4 col-md-6">
					<div class="product-item bg-light">
						<div class="card">
							<div class="thumb-content">
								<!-- <div class="price">$200</div> -->
								<a href="<?php echo base_url('home/produk/'.$value['id']) ?>">
									<img class="card-img-top img-fluid" src="<?php echo base_url('assets/img/produk/'.$value['image']) ?>" alt="Card image cap">
								</a>
							</div>
							<div class="card-body">
								<h4 class="card-title"><a href="<?php echo base_url('assets_home/') ?>"><?php echo $value['nama'] ?></a></h4>
								<ul class="list-inline product-meta">
									<li class="list-inline-item">
										<a href="<?php echo base_url('assets_home/') ?>"><i class="fa fa-folder-open-o"></i><?php echo $value['tipe'] ?></a>
									</li>
<!-- 									<li class="list-inline-item">
										<a href="<?php echo base_url('assets_home/') ?>"><i class="fa fa-calendar"></i><?php echo $value['series'] ?></a>
									</li> -->
								</ul>
								<p class="card-text"><?php echo $value['deskripsi'] ?></p>
								<h1 class="card-title"><?php echo $value['harga'] ?></h1>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>				
			<?php
		}
	}
	public function coba()
	{
		$this->load->model('Produk_model');
		$data = $this->Produk_model->getProduk();
		echo '<pre>';
		print_r($data);
		echo '</pre>';
		
		echo implode($this->input->post('tipe'));
	}
}
