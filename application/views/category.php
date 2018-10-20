<?php $this->load->view('home_sub/header') ?>
<?php $this->load->view('home_sub/navbar') ?>
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<form action="<?php echo base_url('Home/coba') ?>" method="post" id="produk-filter">
						<div class="widget category-list">
							<h4 class="widget-header">Gender</h4>
							<select name="gender" id="gender" class="form-control w-100">
								<?php foreach ($gender as $key => $value): ?>
									<option value="<?php echo $value['gender'] ?>"><?php echo $value['gender'] ?></option>	
								<?php endforeach ?>
							</select>
						</div>

						<div class="widget category-list">
							<h4 class="widget-header">Tipe</h4>
							<?php foreach ($tipe as $key => $value): ?>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="tipe[]" id="<?php echo 'tipe'.$key ?>" value="<?php echo $value['tipe'] ?>">
									<label class="custom-control-label" for="<?php echo 'tipe'.$key ?>"><?php echo strtoupper($value['tipe']) ?></label>
								</div>	

							<?php endforeach ?>
						</div>

						<div class="widget filter">
							<h4 class="widget-header">Series</h4>
							<?php foreach ($series as $key => $value): ?>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="series[]" id="<?php echo 'series'.$key ?>" value="<?php echo $value['series'] ?>">
									<label class="custom-control-label" for="<?php echo 'series'.$key ?>"><?php echo strtoupper($value['series']) ?></label>
								</div>	

							<?php endforeach ?>
						</div>

						<div class="widget price-range">
							<h4 class="widget-header">Harga</h4>
							<div class="block">
								<div class="custom-control custom-radio">
									<input type="radio" id="harga1" name="harga" class="custom-control-input" value="a">
									<label class="custom-control-label" for="harga1">< RP 500.000</label>
								</div>
								<div class="custom-control custom-radio">
									<input type="radio" id="harga2" name="harga" class="custom-control-input" value="b">
									<label class="custom-control-label" for="harga2">RP 500.000 - 750.000</label>
								</div>
								<div class="custom-control custom-radio">
									<input type="radio" id="harga3" name="harga" class="custom-control-input" value="c">
									<label class="custom-control-label" for="harga3">RP 750.000 - 1000.000</label>
								</div>
								<div class="custom-control custom-radio">
									<input type="radio" id="harga4" name="harga" class="custom-control-input" value="d">
									<label class="custom-control-label" for="harga4">> RP 1000.000</label>
								</div>
							</div>
						</div>
						<input type="submit" class="btn btn-primary w-100" value="Filter">
					</form>
				</div>
			</div>
			<div class="col-md-9">
				<div class="category-search-filter">
					<div class="row">
						<div class="col-md-12">
							<?php echo form_open('',array('id'=>'form-search')) ?>
							<input type="text" name="search" placeholder="search" class="form-control">
							<?php echo form_close(); ?>
							<script>
								$('input[name="search"]').change(function(){
									$('#form-search').submit();
								});
							</script>
						</div>
					</div>
				</div>
				<div class="product-grid-list">
					<div class="row mt-30"  id="produk-list">





						<?php foreach ($produk as $key => $value): ?>
							<div class="col-sm-12 col-lg-4">
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
												<li class="list-inline-item">
													<a href="<?php echo base_url('assets_home/') ?>"><i class="fa fa-calendar"></i><?php echo $value['series'] ?></a>
												</li>
											</ul>
											<p class="card-text"><?php echo $value['deskripsi'] ?></p>
											<h1 class="card-title"><?php echo $value['harga'] ?></h1>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>	




					</div>
				</div>
				<!-- <div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div> -->
			</div>
		</div>
	</div>
</section>
<!--============================
=            Footer            =
=============================-->

<footer class="footer section section-sm">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- About -->
				<div class="block about">
					<!-- footer logo -->
					<img src="<?php echo base_url('assets_home/') ?>images/logo-footer.png" alt="">
					<!-- description -->
					<p class="alt-color">Converse is Sneakers. And Converse is Change. We started on the court and got adopted on the street. We began as a rubber company to make sneakers and boots, and then we found basketball and reinvented the sport. The Converse Chuck Taylor All Star sneaker became the court sneaker; it stood for the game. From there we moved into other sports with new sneaker silhouettes like the Pro Leather, the Star Player, and the Weapon. The Star Chevron showed up and became another Converse symbol. And just when we seemed to be destined for athletes only - something happened.</p>
				</div>
			</div>
			<!-- Link list -->
			<!--<div class="col-lg-2 offset-lg-1 col-md-3">
				<div class="block">
					<h4>Site Pages</h4>
					<ul>
						<li><a href="<?php echo base_url('assets_home/') ?>#">Boston</a></li>
						<li><a href="<?php echo base_url('assets_home/') ?>#">How It works</a></li>
						<li><a href="<?php echo base_url('assets_home/') ?>#">Deals & Coupons</a></li>
						<li><a href="<?php echo base_url('assets_home/') ?>#">Articls & Tips</a></li>
						<li><a href="<?php echo base_url('assets_home/') ?>#">Terms of Services</a></li>
					</ul>
				</div>
			</div> -->
			<!-- Link list -->
			<!--
			<div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
				<div class="block">
					<h4>Admin Pages</h4>
					<ul>
						<li><a href="<?php echo base_url('assets_home/') ?>#">Boston</a></li>
						<li><a href="<?php echo base_url('assets_home/') ?>#">How It works</a></li>
						<li><a href="<?php echo base_url('assets_home/') ?>#">Deals & Coupons</a></li>
						<li><a href="<?php echo base_url('assets_home/') ?>#">Articls & Tips</a></li>
						<li><a href="<?php echo base_url('assets_home/') ?>#">Terms of Services</a></li>
					</ul>
				</div>
			</div>-->
			<!-- Promotion -->
			<!--
			<div class="col-lg-4 col-md-7">
				<!-- App promotion -->
				
				<div class="block-2 app-promotion">
					<a href="">
						<!-- Icon -->
						<img src="images/footer/phone-icon.png" alt="mobile-icon">
					</a>
					<p>Get the Dealsy Mobile App and Save more</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</footer>
<script>
	$("#produk-filter").submit(function(e) {
		$.ajax({
			url: "<?php echo base_url('Home/getProduk') ?>",
			type: "POST",
			data: $(this).serialize(),
			success: function(data)
			{
				$('#produk-list').html(data);
			}
		});

		e.preventDefault();
	});
</script>
<?php $this->load->view('home_sub/footer') ?>