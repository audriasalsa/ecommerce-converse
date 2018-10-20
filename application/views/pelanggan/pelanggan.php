<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<main role="main" class="container">
	<h1>Pelanggan</h1>
	<table class="table table-striped table-bordered" width="100%" id="example">
		<thead>
			<tr>
				<!-- Sesuaikan Column Table -->
				<th>Nama</th>
				<th>Alamat</th>
				<th>Jenis Kelamin</th>
				<th>No Telp</th>
				<th>Username</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pelanggan as $key => $value): ?>
				<tr>
					<!-- Sesuaikan Column Table -->
					<td><?php echo $value['nama'] ?></td>
					<td><?php echo $value['alamat'] ?></td>
					<td><?php echo $value['jeniskelamin'] ?></td>
					<td><?php echo $value['nohp'] ?></td>
					<td><?php echo $value['username'] ?></td>
					<td>
						<?php 
						switch ($value['status']) {
							case 1:
							echo '<span class="badge badge-pill badge-secondary">Unverified</span>';
							break;
							case 2:
							echo '<span class="badge badge-pill badge-primary">Active</span>';
							break;
							case 3:
							echo '<span class="badge badge-pill badge-warning">Suspend</span>';
							break;
							case 4:
							echo '<span class="badge badge-pill badge-danger">Banned</span>';
							break;
							default:
							echo '<span class="badge badge-pill badge-dark">Undefined</span>';
							break;
						} ?>
					</td>
					<td>
						<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-change-status" data-id="<?php echo $value['id'] ?>">
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
				<form action="<?php echo base_url('Pelanggan/change_status') ?>" method="post" id="pelanggan-form-change-status">
					<input type="hidden" name="id" value="" id="modal-change-status-id">
					<select class="custom-select" name="status">
						<option value="1">Unverified</option>
						<option value="2">Active</option>
						<option value="3">Suspend</option>
						<option value="4">Banned</option>
					</select>
					<script>$("select[name='status']").change(function(){
						var value = $(this).val();
						if(value == 3 || value == 4){
							$('#show_comment').removeClass('d-none');
						}else{
							$('#show_comment').addClass('d-none');
						}
					});</script>
					<div class='d-none mt-3' id="show_comment">
						<textarea class="form-control" id="status_comment" name="status_comment" rows="3" placeholder="Tambahkan Komentar"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" form="pelanggan-form-change-status" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#modal-change-status').on('show.bs.modal', function (e) {
			var button = $(e.relatedTarget);
			$('#modal-change-status-id').val(button.data('id'));
		})
		$('#example').DataTable();
	} );
</script>
<?php $this->load->view('footer') ?>