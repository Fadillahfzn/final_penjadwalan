<div class="col-xs-6 col-lg-12">
	<h2>Data Matakuliah</h2>
	<p></p>
	<a href="<?php echo base_url(); ?>index.php/matakuliah/tmatakuliah" class="btn btn-primary btn-sm">Tambah</a>
	<p></p>
	<table class="table table-bordered">
		<tr class="active">
			<td class="text-center" >NO</td>
			<td>KODE MATAKULIAH</td>
			<td>MATAKULIAH</td>
			<td>SEMESTER</td>
			<td>PRODI</td>
			<td>ACTION</td>
		</tr>
		<?php $no = 1;
		foreach ($datamakul as $makul) { ?>
			<tr>
				<td class="text-center" ><?php echo $no++; ?></td>
				<td><?php echo $makul->kodemakul; ?></td>
				<td><?php echo $makul->makul; ?></td>
				<td><?php echo $makul->semester; ?></td>
				<td><?php echo $makul->prodi; ?></td>
				<td>
					<a href="<?php echo base_url() ?>index.php/matakuliah/editmakul/<?php echo $makul->idmakul; ?>" class=" btn btn-warning btn-sm">Edit</a>
					<a href="<?php echo base_url() ?>index.php/matakuliah/hapusmakul/<?php echo $makul->idmakul; ?>" class="btn btn-danger btn-sm">Hapus</a>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>
<!--/.col-xs-6.col-lg-4-->