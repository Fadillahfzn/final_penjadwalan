<div class="col-xs-6 col-lg-12">
    <h2>Jadwal Matakuliah</h2>
	<p></p>
	<a href="<?php echo base_url();?>index.php/jadwal/tjadwal" class="btn btn-primary btn-sm">Tambah</a>
	<p></p>
    <table class="table table-bordered">
		<tr>
			<td class="text-center">NO</td>
			<td>HARI</td>
			<td>JAM</td>
			<td>MATAKULIAH</td>
			<td>RUANGAN</td>
			<td>NIP DOSEN PENGAJAR</td>
			<td>ACTION</td>
		</tr>
		<?php $no=1; foreach($datajadwal as $jadwal){?>
		<tr>
			<td class="text-center"><?php echo $no++;?></td>
			<td><?php echo $jadwal->hari;?></td>
			<td><?php echo $jadwal->jam_mulai;?> - <?php echo $jadwal->jam_akhir;?></td>
			<td><?php echo $jadwal->kodemakul;?></td>
			<td><?php echo $jadwal->idruangan;?></td>
			<td><?php echo $jadwal->npp;?></td>
			<td>
				<a href="#" class="btn btn-warning btn-sm">Edit</a>
				<a href="<?php echo base_url()?>index.php/jadwal/hapusjadwal/<?php echo $jadwal->idjadwal;?>" onclick="return confirm('Hapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
			</td>
		</tr>
		<?php }?>
	</table>
</div><!--/.col-xs-6.col-lg-4-->