<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<main role="main" class="container">
	<h1>Transaksi</h1>
	<table class="table table-striped table-bordered" width="100%" id="example">
		<thead>
			<tr>
				<!-- Sesuaikan Column Table -->
				<th>#</th>
				<th>Date</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>No Hp</th>
				<th>Email</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pengiriman as $key => $value): ?>
				<tr>
					<!-- Sesuaikan Column Table -->
					<td><?php echo ++$key; ?></td>
					<td><?php echo $value['date_order'] ?></td>
					<td><?php echo $value['nama'] ?></td>
					<td><?php echo $value['alamat'] ?></td>
					<td><?php echo $value['nohp'] ?></td>
					<td><?php echo $value['email'] ?></td>
					<td>
						<?php 
						switch ($value['status_order']) {
							case 'belum di bayar':
							echo '<span class="badge badge-pill badge-secondary">Belum di bayar</span>';
							break;
							case 'sudah di bayar':
							echo '<span class="badge badge-pill badge-primary">Sudah di bayar</span>';
							break;
							case 'sudah di kirim':
							echo '<span class="badge badge-pill badge-warning">Sudah di kirim</span>';
							break;
							default:
							echo '<span class="badge badge-pill badge-dark">Undefined</span>';
							break;
						} ?>
					</td>
					<td>
						<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-change-status" data-id="<?php echo $value['id'] ?>" data-status="<?php echo $value['status_order'] ?>">
							Change Status
						</button>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</main>
<div class="modal fade" id="modal-change-status" tabindex="-1" role="dialog" aria-labelledby="modal-change-status-Label" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-change-status-Label">Ubah Status</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo base_url('Admin/change_status') ?>" method="post" id="pengiriman-status-form">
					<input type="hidden" name="id" value="" id="modal-change-status-id">
					<select class="custom-select" name="status_order" id="modal-change-status-order">
						<option value="belum di bayar">Belum di bayar</option>
						<option value="sudah di bayar">Sudah di bayar</option>
						<option value="sudah di kirim">Sudah di kirim</option>
					</select>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" form="pengiriman-status-form" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#modal-change-status').on('show.bs.modal', function (e) {
			var button = $(e.relatedTarget);
			$('#modal-change-status-id').val(button.data('id'));
			$('#modal-change-status-order').val(button.data('status'));
		})
		$('#example').DataTable();
	} );
</script>
<?php $this->load->view('footer') ?>