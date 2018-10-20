<table class="table">
	<thead>
		<th>Ukuran</th>
		<th>Stok</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		<?php foreach ($produk_detail as $key => $value): ?>
			<tr>
				<td><?php echo $value['ukuran'] ?></td>
				<td><?php echo $value['stok'] ?></td>
				<td>
					<a href="#" onclick="produk_detail_remove('<?php echo $id ?>','<?php echo $value['ukuran'] ?>')" class="btn btn-sm btn-danger">X</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<script>
	function produk_detail_remove(id,ukuran) {
		$.ajax({
			url: "<?php echo base_url('Produk/remove_produk_detail/') ?>"+id+"/"+ukuran,
			data: null,
			success: function(data)
			{
					call_get_data("<?php echo $id ?>");
			}
		});
	}
</script>