<h2 class="pl-3">Tambah Data Dosen</h2>
<hr>
<div class="col-sm-8">
	<form class="form-horizontal" method="post">
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-3 control-label">NPP</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" name="npp" id="inputEmail3" value="<?php echo set_value('npp'); ?>" autocomplete="off">
				<i><?php echo form_error('npp'); ?></i>
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">Nama Dosen</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" name="nama" id="inputPassword3" value="<?php echo set_value('nama'); ?>" autocomplete="off">
				<i><?php echo form_error('nama'); ?></i>
			</div>
		</div>
		<div class="form-group">
			<label for="inputPassword3" class="col-sm-3 control-label">No. Hp/Telp</label>
			<div class="col-sm-6">
				<input type="text" class="form-control" name="nohp" id="inputPassword3" value="<?php echo set_value('nohp'); ?>" autocomplete="off">
				<i><?php echo form_error('nohp'); ?></i>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-10">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</form>
</div>