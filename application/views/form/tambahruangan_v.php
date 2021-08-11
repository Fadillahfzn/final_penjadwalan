<h2>Tambah Data Dosen</h2>
<hr>
<div class="col-sm-8">
	<form class="form-horizontal" method="post">
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-3 control-label">Ruangan</label>
		<div class="col-sm-6">
		  <select class="form-control" name="ruangan">
			<option>--Ruangan--</option>
			<?php
				$ruang=array(
					'Lab 1',
					'Lab 2',
					'Lab 3',
					'Lab 4',
					'Lab 5',
					'Lab 6'
				);
				
				foreach($ruang as $ruangan){
			?>
			<option value="<?php echo $ruangan;?>"><?php echo $ruangan;?></option>
			<?php }?>
		  </select>
		  <i><?php echo form_error('npp');?></i>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-3 col-sm-10">
		  <button type="submit" class="btn btn-primary">Simpan</button>
		</div>
	  </div>
	</form>
</div>