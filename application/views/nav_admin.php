<div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user-dashboard-profile">
						<!-- User Image -->
						<div class="profile-thumb">
							<img src="<?php echo base_url('assets/img/pegawai/default.jpg') ?>" alt="" class="rounded-circle">
						</div>
						<!-- User Name -->
						<h5 class="text-center"><?php echo $this->session->userdata('nama') ?></h5>
						<p>Joined February 06, 2017</p>
						<a href="user-profile.html" class="btn btn-main-sm">Edit Profile</a>
					</div>
					<!-- Dashboard Links -->
					<div class="widget user-dashboard-menu">
						<ul>
							<li class="active" ><a href="<?php echo base_url('Admin') ?>"><i class="fa fa-user"></i> Admin</a></li>
							<li><a href="<?php echo base_url('Pegawai') ?>"><i class="fa fa-bookmark-o"></i> Pegawai <span>5</span></a></li>
							<li><a href="<?php echo base_url('Pelanggan') ?>"><i class="fa fa-file-archive-o"></i> Pelanggan <span>12</span></a></li>
							<li><a href=""><i class="fa fa-bolt"></i> Pending Approval<span>23</span></a></li>
							<li><a href="<?php echo base_url('Login/logout') ?>"><i class="fa fa-cog"></i> Logout</a></li>
							<li><a href=""><i class="fa fa-power-off"></i>Delete Account</a></li>
						</ul>
					</div>
				</div>
			</div>