<?php $this->load->view('header') ?>
<?php $this->load->view('navbar') ?>
<main role="main" class="container">
	<h1>Update Data Produk</h1>
	<?php echo form_open_multipart('Produk/ubah/'.$getData['id']); ?>
	<div class="form-group row">
		<label for="nama" class="col-sm-2 col-form-label">nama</label>
		<div class="col-sm-10">
			<input type="text" name="nama" class="form-control" id="nama"  value="<?php echo $getData['nama'] ?>" placeholder="nama">
			<?php echo form_error('nama') ?> 
		</div>
	</div>
	<div class="form-group row">
		<label for="deskripsi" class="col-sm-2 col-form-label">deskripsi</label>
		<div class="col-sm-10">
			<input type="text" name="deskripsi" class="form-control" id="deskripsi"  value="<?php echo $getData['deskripsi'] ?>" placeholder="deskripsi">
			<?php echo form_error('deskripsi') ?> 
		</div>
	</div>
	<div class="form-group row">
		<label for="gender" class="col-sm-2 col-form-label">gender</label>
		<div class="col-sm-10">
			<select name="gender" id="gender" class="form-control">
				<option value="men">MEN</option>
				<option value="women">WOMEN</option>
				<option value="kids">KIDS</option>
			</select>
			<script>$('#gender').val('<?= $getData['gender'] ?>')</script>
		</div>
	</div>
	<div class="form-group row">
		<label for="tipe" class="col-sm-2 col-form-label">tipe</label>
		<div class="col-sm-10">
			<select name="tipe" id="tipe" class="form-control">
				<option value="sneaker">SNEAKER</option>
				<option value="clothing">CLOTHING</option>
				<option value="accessories">ACCESSORIES</option>
			</select>
			<script>$('#tipe').val('<?= $getData['tipe'] ?>')</script>
		</div>
	</div>
	<div class="form-group row">
		<label for="series" class="col-sm-2 col-form-label">series</label>
		<div class="col-sm-10">
			<select name="series" id="series" class="form-control">
				<option value="chuck taylor all star">CHUCK TAYLOR ALL STAR</option>
				<option value="converse cons">CONVERSE CONS</option>
			</select>
			<script>$('#series').val('<?= $getData['series'] ?>')</script>
		</div>
	</div>
	<div class="form-group row">
		<label for="warna" class="col-sm-2 col-form-label">warna</label>
		<div class="col-sm-10">
			<select name="warna" id="warna" class="form-control">
				<option value="blue">BLUE</option>
				<option value="black">BLACK</option>
				<option value="green">GREEN</option>
				<option value="grey">GREY</option>
				<option value="red">RED</option>
				<option value="white">WHITE</option>
				<option value="navy">NAVY</option>
				<option value="pink">PINK</option>
			</select>
			<script>$('#warna').val('<?= $getData['warna'] ?>')</script>
		</div>
	</div>
	<div class="form-group row">
		<label for="harga" class="col-sm-2 col-form-label">harga</label>
		<div class="col-sm-10">
			<input type="text" name="harga" class="form-control" id="harga"  value="<?php echo $getData['harga'] ?>" placeholder="harga">
			<?php echo form_error('harga') ?> 
		</div>
	</div>
	<div class="form-group row">
		<label for="discount" class="col-sm-2 col-form-label">discount</label>
		<div class="col-sm-10">
			<input type="text" name="discount" class="form-control" id="discount"  value="<?php echo $getData['discount'] ?>" placeholder="discount">
			<?php echo form_error('discount') ?> 
		</div>
	</div>
	<div class="form-group">
		<label for="image">Image</label>
		<input type="file" name="image">
		<?php echo (isset($message) ? $message : ''); ?>
	</div>
	<div class="form-group row">
		<label for="col-sm-2"></label>
		<input type="submit" class="btn btn-success" value="Ubah">
	</div>
</form>
</main>
<?php $this->load->view('footer') ?>