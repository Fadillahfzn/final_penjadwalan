<h2 class="pl-3">Edit Matakuliah</h2>
<hr>
<div class="col-sm-8">
    <form class="form-horizontal" method="post">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Kode Matakuliah</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode" id="inputEmail3" value="<?= $makul['kodemakul']; ?>">
                <i><?php echo form_error('kode'); ?></i>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Matakuliah</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="makul" id="inputPassword3" value="<?= $makul['makul']; ?>">
                <i><?php echo form_error('makul'); ?></i>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Semester</label>
            <div class="col-sm-6">
                <select class="form-control" name="semester">
                    <option>--Semester--</option>
                    <?php for ($i = 1; $i <= 8; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
                <i><?php echo form_error('semester'); ?></i>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">Prodi</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="prodi" id="inputPassword3" value="<?= $makul['prodi']; ?>">
                <i><?php echo form_error('prodi'); ?></i>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </form>
</div>