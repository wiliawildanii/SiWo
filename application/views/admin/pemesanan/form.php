<div class="form-group">
    <label for="jenis" class="control-label col-sm-3"> Jenis </label>
    <div class="col-sm-6">
        <input type="text" name="jenis" value="<?php echo set_value('jenis',isset($dekorasi->jenis) ? $dekorasi->jenis : ''); ?>" class="form-control">
        <?php echo form_error('jenis'); ?>
    </div>
</div>
<div class="form-group">
    <label for="harga" class="control-label col-sm-3"> Harga </label>
    <div class="col-sm-4">
        <input type="text" name="harga" value="<?php echo set_value('harga',isset($dekorasi->harga) ? $dekorasi->harga : ''); ?>" class="form-control">
        <?php echo form_error('harga'); ?>
    </div>
</div>
<div class="form-group">
    <label for="deskripsi" class="control-label col-sm-3"> Deskripsi </label>
    <div class="col-sm-4">
        <textarea name="deskripsi" class="form-control"><?php echo set_value('deskripsi',isset($dekorasi->deskripsi) ? $dekorasi->deskripsi : ''); ?></textarea>
        <?php echo form_error('deskripsi'); ?>
    </div>
</div>
<div style="width:100%;text-align:right;">
    <button class="btn btn-success" type="submit">Simpan</button>
    <a href="<?php echo base_url() . 'admin/dekorasi'; ?>" class="btn btn-default">Batal</a>
</div>