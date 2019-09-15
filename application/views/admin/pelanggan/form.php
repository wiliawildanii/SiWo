<div class="form-group">
    <label for="nama" class="control-label col-sm-3"> nama </label>
    <div class="col-sm-6">
        <input type="text" name="nama" value="<?php echo set_value('nama',isset($pelanggan->nama) ? $pelanggan->nama : ''); ?>" class="form-control">
        <?php echo form_error('nama'); ?>
    </div>
</div>
<div class="form-group">
    <label for="no_telp" class="control-label col-sm-3"> No Hp </label>
    <div class="col-sm-4">
        <input type="text" name="no_telp" value="<?php echo set_value('no_telp',isset($pelanggan->no_telp) ? $pelanggan->no_telp : ''); ?>" class="form-control">
        <?php echo form_error('no_telp'); ?>
    </div>
</div>
<div class="form-group">
    <label for="email" class="control-label col-sm-3"> Email </label>
    <div class="col-sm-4">
        <input type="email" name="email" value="<?php echo set_value('email',isset($pelanggan->email) ? $pelanggan->email : ''); ?>" class="form-control">
        <?php echo form_error('email'); ?>
    </div>
</div>
<div class="form-group">
    <label for="alamat" class="control-label col-sm-3"> Alamat </label>
    <div class="col-sm-4">
        <textarea name="alamat" class="form-control"><?php echo set_value('alamat',isset($pelanggan->alamat) ? $pelanggan->alamat : ''); ?></textarea>
        <?php echo form_error('alamat'); ?>
    </div>
</div>
<div style="width:100%;text-align:right;">
    <button class="btn btn-success" type="submit">Simpan</button>
    <a href="<?php echo base_url() . 'admin/pelanggan'; ?>" class="btn btn-default">Batal</a>
</div>