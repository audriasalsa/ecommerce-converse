	<form action="<?php echo base_url('Produk/add_produk_detail/'.$id); ?>" method="post" id="form-input-produk-detail">
		<!-- copy script ini untuk mengulang, tergantung pada jumlah field ganti nama_field tergantung nama field nya -->
		<div class="form-group row">
			<label for="ukuran" class="col-sm-2 col-form-label">ukuran</label>
			<div class="col-sm-10">
				<input type="text" name="ukuran" class="form-control" id="ukuran" value="" placeholder="ukuran">
				<?php echo form_error('ukuran') ?> <!-- menampilkan error saat rule ukuran gagal -->
			</div>
		</div>
		<div class="form-group row">
			<label for="stok" class="col-sm-2 col-form-label">stok</label>
			<div class="col-sm-10">
				<input type="text" name="stok" class="form-control" id="stok" value="" placeholder="stok">
				<?php echo form_error('stok') ?> <!-- menampilkan error saat rule stok gagal -->
			</div>
		</div>
		<!-- copy sampai sini -->
		<input type="submit" class="btn btn-primary" value="Tambah Data">
	</form>
<script>
	$("#form-input-produk-detail").submit(function(e) {
		$.ajax({
			url: "<?php echo base_url('Produk/add_produk_detail/'.$id) ?>",
			type: "POST",
			data: $(this).serialize(),
			success: function(data)
			{
				if(data == 'berhasil'){
					call_input("<?php echo $id ?>");
					call_get_data("<?php echo $id ?>");
				}
				
				else
					$('#container-form-input-produk-detail').html(data);
			}
		});
		e.preventDefault();
	});
</script>