<div class="modal-header bg-success">
	<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<form action="<?php echo base_url('Pegawai/ubah/'.$getData['id']); ?>" method="post" id="form-update-pegawai">
		<!-- sama kaya tambah -->
		<div class="form-group row">
			<label for="nama" class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" name="nama" class="form-control" id="nama"  value="<?php echo $getData['nama'] ?>" placeholder="nama">
				<?php echo form_error('nama') ?>
			</div>
		</div>
		<div class="form-group row">
			<label for="username" class="col-sm-2 col-form-label">Username</label>
			<div class="col-sm-10">
				<input type="text" name="username" class="form-control" id="username"  value="<?php echo $getData['username'] ?>" placeholder="username">
					<?php echo form_error('username') ?>
			</div>
		</div>
		<div class="form-group row">
			<label for="password" class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-10">
				<input type="password" name="password" class="form-control" id="password"  value="<?php echo $getData['password'] ?>" placeholder="password">
				<?php echo form_error('password') ?>
			</div>
		</div>
		<div class="form-group row">
			<label for="level" class="col-sm-2 col-form-label">Level</label>
			<div class="col-sm-10">
				<select name="level" id="level" class="form-control">
					<option value="admin">Admin</option>
					<option value="pegawai">Pegawai</option>
				</select>
				<script>$('#level').val("<?= $getData['level'] ?>")</script>
			</div>
		</div>
	</form>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-success" form="form-update-pegawai">Edit</button>
</div>
<script>
	$("#form-update-pegawai").submit(function(e) {
		$.ajax({
			url: "<?php echo base_url('Pegawai/ubah/'.$getData['id']) ?>",
			type: "POST",
			data: $(this).serialize(),
			success: function(data)
			{
				if(data == 'berhasil'){
					$('#modal-pegawai').modal('hide');
					reload_table();
				}
				else
					$('#modal-content-pegawai').html(data);
			}
		});

		e.preventDefault();
	});
</script>