<div class="col-xs-6 col-lg-12">
    <h2>Data Dosen</h2>
	<p></p>
	<a href="<?php echo base_url()?>index.php/dosen/tdosen" class="btn btn-primary btn-sm">Tambah</a>
	<p></p>
    <table class="table table-bordered">
		<tr class="active">
			<td>NO</td>
			<td>NPP</td>
			<td>NAMA DOSEN</td>
			<td>NO. HP/TELP</td>
			<td>ACTION</td>
		</tr>
		<?php $no=1;foreach($datadosen as $dosen){?>
		<tr>
			<td><?php echo $no++;?></td>
			<td><?php echo $dosen->npp;?></td>
			<td><?php echo $dosen->namadosen;?></td>
			<td><?php echo $dosen->nohp;?></td>
			<td>
				<a href="" class="btn btn-warning btn-sm">Edit</a>
				<a href="<?php echo base_url()?>index.php/dosen/hapusdosen/<?php echo $dosen->iddosen;?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
			</td>
		</tr>
		<?php }?>
	</table>
</div><!--/.col-xs-6.col-lg-4-->
