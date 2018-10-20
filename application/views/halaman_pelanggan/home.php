<?php $this->load->view('home_sub/header') ?>
<?php $this->load->view('home_sub/navbar') ?>
<section class="dashboard section">
	<!-- Container Start -->
	<div class="container">
		<!-- Row Start -->
		<div class="row">
			<?php $this->load->view('nav_user') ?>
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">Daftar Pemesanan</h3>
					<table class="table table-responsive product-dashboard-table">
						<thead>
							<tr>
								<th>Tanggal Pemesanan</th>
								<th>Produk</th>
								<th>Total</th>
								<th class="text-center">Status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($pemesanan as $value): ?>
								<tr>
									<td class="product-thumb">
										<?php echo date('Y-m-d', strtotime($value['date_order'])) ?>
									</td>
									<td class="product-details">
										<h3 class="title">Daftar Produk</h3>
										<?php foreach (explode(',',$value['detail_produk']) as $produk): ?>
											<?php $produk_detail = explode('-', $produk) ?>
											
											<span class="add-id"><strong><?php echo $produk_detail[0] ?></strong> <?php echo $produk_detail[1] ?></span>
										<?php endforeach ?>
										</td>
										<td><?php echo $value['total'] ?></td>
										<td class="product-category"><span class="categories"><?php echo $value['status_order'] ?></span></td>
										
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<!-- Row End -->
		</div>
		<!-- Container End -->
	</section>
	<?php $this->load->view('home_sub/footer') ?>
