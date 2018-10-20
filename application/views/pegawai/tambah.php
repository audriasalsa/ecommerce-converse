<div class="modal-header bg-primary">
	<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<form action="<?php echo base_url('pegawai/tambah'); ?>" method="post" id="form-input-pegawai">
		<div class="form-group row">
			<label for="nama" class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" name="nama" class="form-control" id="nama" value="" placeholder="nama">
				<?php echo form_error('nama') ?>
			</div>
		</div>
		<div class="form-group row">
			<label for="username" class="col-sm-2 col-form-label">Username</label>
			<div class="col-sm-10">
				<input type="text" name="username" class="form-control" id="username" value="" placeholder="username">
				<?php echo form_error('username') ?>
			</div>
		</div>
		<div class="form-group row">
			<label for="password" class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-10">
				<input type="password" name="password" class="form-control" id="password" value="" placeholder="password">
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
			</div>
		</div>
		
	</form>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	<button type="submit" class="btn btn-primary" form="form-input-pegawai">Tambah</button>
</div>
<script>
	$("#form-input-pegawai").submit(function(e) {
		$.ajax({
			url: "<?php echo base_url('pegawai/tambah') ?>",
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