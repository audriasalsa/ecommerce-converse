<div class="modal-header bg-primary">
	<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<div id="container-form-input-produk-detail"></div>
	<div id="container-get-data-produk-detail"></div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	
</div>
<script>
	$(document).ready(function() {
		call_input("<?php echo $id ?>");
		call_get_data("<?php echo $id ?>");
	});
	function call_input(id) {
		$.ajax({
			url: "<?php echo base_url('Produk/add_produk_detail/') ?>"+id,
			data: null,
			success: function(data)
			{
				$('#container-form-input-produk-detail').html(data);
			}
		});
	}
	function call_get_data(id) {
		$.ajax({
			url: "<?php echo base_url('Produk/get_data_produk_detail/') ?>"+id,
			data: null,
			success: function(data)
			{
				$('#container-get-data-produk-detail').html(data);
			}
		});
	}
</script>