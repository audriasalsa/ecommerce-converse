<?php $this->load->view('home_sub/header') ?>
<?php $this->load->view('home_sub/navbar') ?>
<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<!-- <p class="h2">GREEN DECOR</p> -->
					<h1>GREEN DECOR</h1>
					<p>Real Plants, Plastic Plants</p>
					<div class="short-popular-category-list text-center">
						<h2>Category</h2>
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href="<?php echo base_url('Home/tipe/real') ?>"> Real Plants</a>
							</li>
							<li class="list-inline-item">
								<a href="<?php echo base_url('Home/tipe/plastic') ?>">Plastic Plants</a>
							</li>
						</ul>
					</div>

				</div>
				<!-- Advance Search -->
				

			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Trending Plants</h2>
				</div>
			</div>
		</div>
		<div class="row">
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
</section>



<!--==========================================
=            All Category Section            =
===========================================-->





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
				
			</div>
		</div>
	</div>
	<?php $this->load->view('home_sub/footer') ?>