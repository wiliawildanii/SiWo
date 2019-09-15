<div class="form-group">
    <label for="deskripsi" class="control-label col-sm-3"> Nama Gedung </label>
    <div class="col-sm-6">
        <input type="text" name="nama_gedung" value="<?php echo set_value('nama_gedung',isset($gedung->nama_gedung) ? $gedung->nama_gedung : ''); ?>" class="form-control">
        <?php echo form_error('nama_gedung'); ?>
    </div>
</div>
<div class="form-group">
    <label for="harga_gedung" class="control-label col-sm-3"> Harga </label>
    <div class="col-sm-4">
        <input type="text" name="harga_gedung" value="<?php echo set_value('harga_gedung',isset($gedung->harga_gedung) ? $gedung->harga_gedung : ''); ?>" class="form-control">
        <?php echo form_error('harga_gedung'); ?>
    </div>
</div>
<hr>
<div class="form-group">
    <label for="deskripsi" class="control-label col-sm-3"> Deskripsi </label>
    <div class="col-sm-4">
        <textarea name="deskripsi" class="form-control"><?php echo set_value('deskripsi',isset($gedung->deskripsi) ? $gedung->deskripsi : ''); ?></textarea>
        <?php echo form_error('deskripsi'); ?>
    </div>
</div>
<div class="form-group">
    <label for="foto" class="control-label col-sm-3"> Foto Gedung </label>
    <div class="col-sm-4">
        <input type="file" name="foto">
        <?php echo form_error('foto'); ?>
    </div>
</div>
<div style="width:100%;text-align:right;">
    <button class="btn btn-success" type="submit">Simpan</button>
    <a href="<?php echo base_url() . 'admin/gedung'; ?>" class="btn btn-default">Batal</a>
</div>
