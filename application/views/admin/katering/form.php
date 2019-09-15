<div class="form-group">
    <label for="nama_katering" class="control-label col-sm-3"> Nama Katering </label>
    <div class="col-sm-6">
        <input type="text" name="nama_katering" value="<?php echo set_value('nama_katering',isset($katering->nama_katering) ? $katering->nama_katering : ''); ?>" class="form-control">
        <?php echo form_error('nama_katering'); ?>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-3"> Jumlah </label>
    <div class="col-sm-4">
        <input type="number" name="jumlah" value="<?php echo set_value('harga_katering',isset($katering->jumlah) ? $katering->jumlah : ''); ?>" class="form-control">
        <?php echo form_error('jumlah'); ?>
    </div>
</div>
<div class="form-group">
    <label for="harga_katering" class="control-label col-sm-3"> Harga </label>
    <div class="col-sm-4">
        <input type="number" name="harga_katering" value="<?php echo set_value('harga_katering',isset($katering->harga_katering) ? $katering->harga_katering : ''); ?>" class="form-control">
        <?php echo form_error('harga_katering'); ?>
    </div>
</div>
<div class="form-group">
    <label for="deskripsi" class="control-label col-sm-3"> Deskripsi </label>
    <div class="col-sm-6">
        <textarea name="deskripsi" class="form-control"><?php echo set_value('deskripsi',isset($katering->deskripsi) ? $katering->deskripsi : ''); ?></textarea>
        <?php echo form_error('deskripsi'); ?>
    </div>
</div>
<div style="width:100%;text-align:right;">
    <button class="btn btn-success" type="submit">Simpan</button>
    <a href="<?php echo base_url() . 'admin/katering'; ?>" class="btn btn-default">Batal</a>
</div>
