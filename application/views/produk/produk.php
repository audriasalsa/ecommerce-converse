<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<main role="main" class="container">
	<h1>Produk</h1>
	<a href="<?php echo base_url('Produk/tambah') ?>" class="btn btn-primary mb-3">Tambah</a>
	<table class="table table-striped table-bordered" width="100%" id="example">
		<thead>
			<tr>
				<!-- Sesuaikan Column Table -->
				<th>Nama</th>
				<th>Deskripsi</th>
				<th>Image</th>
				<th>Tipe</th>
				<th>Harga</th>
				<th>Discount</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($getData as $key => $value): ?>
				<tr>
					<!-- Sesuaikan Column Table -->
					<td><?php echo $value['nama'] ?></td>
					<td><?php echo $value['deskripsi'] ?></td>
					<td><img src="<?php echo base_url('assets/img/produk/'.$value['image']) ?>" alt="Foto Kosong" style="width: 100px;"></td>
					<td><?php echo $value['tipe'] ?></td>
					<td><?php echo $value['harga'] ?></td>
					<td><?php echo $value['discount'] ?></td>
					<td>
						<div class="btn-group">
							<a href="#" onclick="show_produk_detail('<?= $value['id'] ?>')" class="btn btn-sm btn-info">Show Produk</a>
							<a href="<?php echo base_url('Produk/ubah/'.$value['id']) ?>" class="btn btn-sm btn-success">Ubah</a>
							<a href="<?php echo base_url('Produk/hapus/'.$value['id']) ?>" class="btn btn-sm btn-danger">Hapus</a>
						</div>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</main>

	<!-- Modal -->
	<div class="modal fade" id="modal-produk-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content" id="modal-content-produk-detail">
			</div>
		</div>
	</div>


	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable();
		} );
		function show_produk_detail(id) {
			$.ajax({
				url: "<?php echo base_url('Produk/show_produk_detail/') ?>"+id,
				data: null,
				success: function(data)
				{
					$('#modal-content-produk-detail').html(data);
					$('#modal-produk-detail').modal('show');
				}
			});
		}
	</script>
	<?php $this->load->view('footer') ?>