<?php $this->load->view('home_sub/header') ?>
<?php $this->load->view('home_sub/navbar') ?>
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title">Plants</h1>
					<div class="product-meta">
						<!--<ul class="list-inline">
							<li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href="">Andrew</a></li>
							<li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Category<a href="">Electronics</a></li>
							<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location<a href="">Dhaka Bangladesh</a></li>
						</ul>-->
					</div>
					<div id="carouselExampleIndicators" class="product-slider carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" src="<?php echo base_url('assets/img/produk/'.$produk['image']) ?>" alt="First slide">
							</div>
						</div>
					</div>
					<div class="content">
						<div class="tab-content">
							<h3 class="tab-title">Produk Deskripsi</h3>
							<p><?php echo $produk['deskripsi'] ?></p>
							<h3 class="tab-title">Produk Spesifikasi</h3>
							<table class="table table-bordered product-table">
								<tbody>
									<tr>
										<td>Harga</td>
										<td>Rp. <?php echo $produk['harga'] ?></td>
									</tr>
									<tr>
										<td>Tanggal List</td>
										<td><?php echo $produk['datecreated'] ?></td>
									</tr>
									<tr>
										<td>Tipe</td>
										<td><?php echo strtoupper($produk['tipe']) ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="widget price text-center">
						<h4>Harga</h4>
						<p>Rp. <?php echo $produk['harga'] ?></p>
					</div>
					<!-- User Profile widget -->
					<div class="widget user">
						<form action="<?php echo base_url('Cart/insert_cart') ?>" method="post">
							<input type="hidden" class="form-control" name="id" value="<?php echo $produk['id'] ?>">
							<input type="hidden" class="form-control" name="nama" value="<?php echo $produk['nama'] ?>">
							<input type="hidden" name="harga" value="<?php echo $produk['harga'] ?>">
<!-- 							<div class="form-group">
								<label for="ukuran">Ukuran</label>
								<select name="ukuran" id="ukuran" class="form-control w-100">
									<option value="" default>Pilih Ukuran</option>
									<?php foreach ($produk_detail as $key => $value): ?>
										<option value="<?php echo $value['ukuran'] ?>" data-stok="<?= $value['stok'] ?>"><?php echo $value['ukuran'] ?></option>
									<?php endforeach ?>
								</select>
							</div> -->
							<div class="form-group">
								<label for="qty">Jumlah</label>
								<input type="number" name="qty" id="qty" class="form-control" value="1" min='1'>
							</div>
							<input type="submit" value="Add To Cart" class="btn btn-primary btn-block mt-3">
						</form>
					</div>
					
				</div>
			</div>
			
		</div>
	</div>
	<!-- Container End -->
</section>
<script>
	$("#ukuran").change(function() {
		var jumlah = $('#ukuran :selected').data('stok');
		$('#qty').attr('max',jumlah);
	});
</script>
<?php $this->load->view('home_sub/footer') ?>