<div class="form-group">
    <label for="nama_rias" class="control-label col-sm-3"> Nama Rias </label>
    <div class="col-sm-6">
        <input type="text" name="nama_rias" value="<?php echo set_value('nama_rias',isset($rias->nama_rias) ? $rias->nama_rias : ''); ?>" class="form-control">
        <?php echo form_error('nama_rias'); ?>
    </div>
</div>
<div class="form-group">
    <label for="harga_rias" class="control-label col-sm-3"> Harga </label>
    <div class="col-sm-4">
        <input type="text" name="harga_rias" value="<?php echo set_value('harga_rias',isset($rias->harga_rias) ? $rias->harga_rias : ''); ?>" class="form-control">
        <?php echo form_error('harga_rias'); ?>
    </div>
</div>
<div class="form-group">
    <label for="deskripsi" class="control-label col-sm-3"> Deskripsi </label>
    <div class="col-sm-4">
        <textarea name="deskripsi" class="form-control"><?php echo set_value('deskripsi',isset($rias->deskripsi) ? $rias->deskripsi : ''); ?></textarea>
        <?php echo form_error('deskripsi'); ?>
    </div>
</div>
<div class="form-group">
    <label for="gambar" class="control-label col-sm-3"> Gambar </label>
    <div class="col-sm-4">
        <input type="file" name="gambar">
        <?php echo isset($error) ? $error : ''; ?>
    </div>
</div>
<div style="width:100%;text-align:right;">
    <button class="btn btn-success" type="submit">Simpan</button>
    <a href="<?php echo base_url() . 'admin/rias'; ?>" class="btn btn-default">Batal</a>
</div>
