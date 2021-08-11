<h2>Jadwal Matakuliah</h2>
<hr>
<label>Select hari :</label>
<select name="hari" onChange="window.location.href=this.value">
	<option>--Hari--</option>
	<?php
		$data=array(
			'senin',
			'selasa',
			'rabu',
			'kamis',
			'jumat',
			'sabtu'
		);
		foreach($data as $row){
	?>
	<option value="<?php echo base_url();?>index.php/jadwal/lihat_jadwal/<?php echo $row;?>"><?php echo strtoupper($row);?></option>
	<?php }?>
</select>
	<p></p>
	<table class="table">
	<tr>
		<td><b>JAM</b></td>
		<td><b>MATAKULIAH</b></td>
		<td><b>RUANGAN</b></td>
		<td><b>DOSEN</b></td>
	</tr>
	<?php
		foreach($datahari as $datajadwal){
	?>
		<tr>
			<td><?php echo $datajadwal->jam_mulai." - ".$datajadwal->jam_akhir;?></td>
			<td><?php echo $datajadwal->makul." / ".$datajadwal->prodi." ".$datajadwal->semester;?></td>
			<td><?php echo $datajadwal->ruangan;?></td>
			<td><?php echo $datajadwal->namadosen;?></td>
		</tr>
	<?php 
		}
	?>
	</table>