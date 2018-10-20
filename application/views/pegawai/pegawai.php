<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<main role="main" class="container">
	<h1>Pegawai</h1>
	<a href="#" onclick="modal_input()" class="btn btn-primary mb-3">Tambah</a>
	<table class="table table-striped table-bordered" width="100%" id="table-pegawai">
		<thead>
			<tr>
				<!-- Sesuaikan Column Table -->
				<th>Nama</th>
				<th>Username</th>
				<th>Password</th>
				<th>Role</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</main>

<!-- Modal -->
<div class="modal fade" id="modal-pegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content" id="modal-content-pegawai">
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#table-pegawai').DataTable( {
			"ajax": {
				'url': "<?= base_url('Pegawai/getAjax') ?>",
			},
			"columns": [
			{ "data": "nama" },
			{ "data": "username" },
			{
				"data":null,
				"visible":true,
				render: function (data, type, row) {
					var ret = "********";
					return ret;
				}
			},
			{ "data": "level" },
			{
				"data":'id',
				"visible":true,
				render: function (data, type, row) {
					var ret = "";
					ret += '<a href="#" onclick="modal_update('+data+')" class="btn btn-sm btn-success">Edit</a>';
					ret += '<a href="#" onclick="proses_delete('+data+')" class="btn btn-sm btn-danger">Hapus</a>';
					return ret;
				}
			}
			]
		});
	} );
	function modal_input() {
		$.ajax({
			url: "<?php echo base_url('Pegawai/tambah') ?>",
			data: null,
			success: function(data)
			{
				$('#modal-content-pegawai').html(data);
				$('#modal-pegawai').modal('show');
			}
		});
	}
	function modal_update(id) {
		$.ajax({
			url: "<?php echo base_url('Pegawai/ubah/') ?>"+id,
			data: null,
			success: function(data)
			{
				$('#modal-content-pegawai').html(data);
				$('#modal-pegawai').modal('show');
			}
		});
	}
	function proses_delete(id) {
		$.ajax({
			url: "<?php echo base_url('Pegawai/hapus/') ?>"+id,
			data: null,
			success: function(data)
			{
				reload_table();
			}
		});
	}
	function reload_table() {
		$('#table-pegawai').DataTable().ajax.reload(null,false);
	}
</script>
<?php $this->load->view('footer') ?>