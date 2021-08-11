<div class="col-xs-6 col-lg-12">
    <h2>Data Ruangan</h2>
	<p></p>
	<a href="<?php echo base_url();?>index.php/ruangan/truangan" class="btn btn-primary btn-sm">Tambah</a>
	<p></p>
    <table class="table table-bordered">
		<tr class="active">
			<td>NO</td>
			<td>RUANGAN</td>
			<td>ACTION</td>
		</tr>
		<?php $no=1; foreach($dataruangan as $ruangan){?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $ruangan->ruangan;?></td>
			<td>
				<a href="#" class="btn btn-warning btn-sm">Edit</a>
				<a href="<?php echo base_url();?>index.php/ruangan/hapusruangan/<?php echo $ruangan->idruangan;?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
			</td>
		</tr>
		<?php }?>
	</table>
</div><!--/.col-xs-6.col-lg-4-->