<?php $this->load->view('home_sub/header') ?>
<?php $this->load->view('home_sub/navbar') ?>
<main role="main" class="container">
	<?php echo form_open('Cart/update_cart'); ?>
	<h1>Keranjang</h1>
	<table cellpadding="6" cellspacing="1" style="width:100%" border="0" class="table table-bordered">
		<thead class="thead-secondary">
			<th>Jumlah</th>
			<th>Catalog</th>
			<th style="text-align:right">Harga</th>
			<th style="text-align:right">Sub-Total</th>
		</thead>

		<?php $i = 1; ?>

		<?php foreach ($this->cart->contents() as $items): ?>

			<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

			<tr>
				<td>
					<div class="input-group mb-3">
						<?php echo form_input(array('name' => $i.'[qty]','class'=>'form-control' ,'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
						<div class="input-group-append">
							<a href="<?php echo base_url('Cart/remove_cart/'.$items['rowid']) ?>" class="btn btn-sm btn-danger">X</a>
						</div>
					</div>

				</td>
				<td>
					<?php echo $items['name']; ?>

					<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

						<p>
							<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

								<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

							<?php endforeach; ?>
						</p>

					<?php endif; ?>

				</td>
				<td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
				<td style="text-align:right">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
			</tr>

			<?php $i++; ?>

		<?php endforeach; ?>

		<tr>
			<td colspan="2"> </td>
			<td class="right"><strong>Total</strong></td>
			<td class="right">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
		</tr>

	</table>

	<p>
		<?php echo form_submit('', 'Update your Cart',array('class'=>'btn btn-success')); ?>
			<a href="<?= base_url('order/addorder') ?>" class="btn btn-primary float-right">Bayar</a>
		</p>

</main>

<?php $this->load->view('home_sub/footer') ?>