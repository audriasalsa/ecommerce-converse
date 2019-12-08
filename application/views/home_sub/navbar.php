<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav class="navbar navbar-expand-lg  navigation">
          <a class="navbar-brand" href="<?php echo base_url('assets_home/') ?>index.html">
            <img src="<?php echo base_url('assets/img/web/logo.png') ?>" alt="" height=50px>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto main-nav ">
              <?php $page = $this->uri->segment('2') ?>
              <li class="nav-item <?php echo ($page == "" ? 'active' : '') ?>">
                <a class="nav-link" href="<?php echo base_url('home/') ?>">Home</a>
              </li>
              <li class="nav-item <?php echo ($page == "category" ? 'active' : '') ?>">
                <a class="nav-link" href="<?php echo base_url('home/category') ?>">Category</a>
              </li>
              <?php if ($this->session->userdata('id') != null): ?>
                <li class="nav-item <?php echo ($page == "pelanggan" ? 'active' : '') ?>">
                <a class="nav-link" href="<?php echo base_url('home/pelanggan') ?>">Pelanggan</a>
              </li>
              <?php endif ?>
              <!-- <li class="nav-item dropdown dropdown-slide">
                <a class="nav-link dropdown-toggle" href="<?php echo base_url('assets_home/') ?>#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Pages <span><i class="fa fa-angle-down"></i></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="<?php echo base_url('home/category') ?>">Category</a>
                  <a class="dropdown-item" href="<?php echo base_url('assets_home/') ?>single.html">Single Page</a>
                  <a class="dropdown-item" href="<?php echo base_url('assets_home/') ?>store-single.html">Store Single</a>
                  <a class="dropdown-item" href="<?php echo base_url('assets_home/') ?>dashboard.html">Dashboard</a>
                  <a class="dropdown-item" href="<?php echo base_url('assets_home/') ?>user-profile.html">User Profile</a>
                  <a class="dropdown-item" href="<?php echo base_url('assets_home/') ?>submit-coupon.html">Submit Coupon</a>
                  <a class="dropdown-item" href="<?php echo base_url('assets_home/') ?>blog.html">Blog</a>
                  <a class="dropdown-item" href="<?php echo base_url('assets_home/') ?>single-blog.html">Single Post</a>
                </div>
              </li>
              <li class="nav-item dropdown dropdown-slide">
                <a class="nav-link dropdown-toggle" href="<?php echo base_url('assets_home/') ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Listing <span><i class="fa fa-angle-down"></i></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="<?php echo base_url('assets_home/') ?>#">Action</a>
                  <a class="dropdown-item" href="<?php echo base_url('assets_home/') ?>#">Another action</a>
                  <a class="dropdown-item" href="<?php echo base_url('assets_home/') ?>#">Something else here</a>
                </div>
              </li> -->
            </ul>
            <ul class="navbar-nav ml-auto mt-10">
              <li class="nav-item">
                <?php if ($this->session->userdata('nama') == null): ?>
                  <a class="nav-link login-button" href="<?php echo base_url('login_pelanggan') ?>">Login</a>
                  <?php else: ?>
                    <a class="nav-link login-button" href="<?php echo base_url('Home/pelanggan') ?>">Dashboard</a>
                <?php endif ?>
              </li>
              <li class="nav-item">
                <a class="nav-link add-button" href="<?php echo base_url('Cart') ?>#"><i class="fa fa-shopping-cart"></i> Cart</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</section>