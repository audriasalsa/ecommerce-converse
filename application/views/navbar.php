<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="#">Plants</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <?php if ($this->session->userdata('nama') != null): ?>
        <li class="nav-item disable">
          <a class="nav-link" href="<?php echo base_url('Produk') ?>">Produk</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url('Pegawai') ?>">Pegawai</a>
        </li>
        <li class="nav-item disable">
          <a class="nav-link" href="<?php echo base_url('Pelanggan') ?>">Pelanggan</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url('Admin/transaksi') ?>">Transaksi</a>
        </li>
        <?php else: ?>
          <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url() ?>">Home <span class="sr-only">(current)</span></a>
        </li>
      <?php endif ?>
    </ul>
    <ul class="navbar-nav ml-0">
      <li class="nav-item active">
        <?php if ($this->session->userdata('nama') != null): ?>
          <a class="nav-link" href="<?php echo base_url('Login/logout') ?>"><?= $this->session->userdata('nama') ?> -- Logout</a>
        <?php else: ?>
          <a class="nav-link" href="<?php echo base_url('login_pegawai') ?>">Login</a>
        <?php endif ?>
      </li>
    </ul>
  </div>
</nav>