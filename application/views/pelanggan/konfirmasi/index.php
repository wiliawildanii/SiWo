<div class="col-sm-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><i class="fa fa-list-alt"></i> Konfirmasi Pembayaran :</h4>
    </div>
    <div class="panel-body">
      <h4>Konfirmasi pembayaran untuk pemesanan anda dengan kode transaksi <a href="<?= base_url() . 'lihat/transaksi/' . $transaksi->id_pemesanan ?>" target="_blank">#<?= $transaksi->id_pemesanan ?></a></h4>
      <hr>
      <div class="col-sm-12">
        <form class="form-horizontal" action="<?= base_url() . 'pelanggan/konfirmasi/store' ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="pemesanan_id" value="<?= $transaksi->id_pemesanan; ?>">
          <div class="form-group">
              <label for="nama_bank" class="control-label col-sm-3"> Nama Bank </label>
              <div class="col-sm-7">
                  <input type="text" name="nama_bank" value="<?php echo set_value('nama_bank',isset($katering->nama_bank) ? $katering->nama_bank : ''); ?>" class="form-control" required>
                  <?php echo form_error('nama_bank'); ?>
              </div>
          </div>
          <div class="form-group">
              <label for="no_rek" class="control-label col-sm-3"> No Rekening </label>
              <div class="col-sm-7">
                  <input type="text" name="no_rek" value="<?php echo set_value('no_rek',isset($katering->no_rek) ? $katering->no_rek : ''); ?>" class="form-control" required>
                  <?php echo form_error('no_rek'); ?>
              </div>
          </div>
          <div class="form-group">
              <label for="pemilik" class="control-label col-sm-3"> Pemilik </label>
              <div class="col-sm-7">
                  <input type="text" name="pemilik" value="<?php echo set_value('pemilik',isset($katering->pemilik) ? $katering->pemilik : ''); ?>" class="form-control" required>
                  <?php echo form_error('pemilik'); ?>
              </div>
          </div>
          <div class="form-group">
              <label for="foto" class="control-label col-sm-3"> Bukti Pembayaran</label>
              <div class="col-sm-4">
                  <input type="file" name="foto" required>
                  <?php echo form_error('foto'); ?>
              </div>
          </div>
          <div style="width:100%;text-align:right;">
              <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-send"></span> Kirim</button>
              <a href="<?php echo base_url() . 'admin/katering'; ?>" class="btn btn-default">Batal</a>
          </div>

        </form>
      </div>
    </div>
    <div class="panel-footer">

    </div>
  </div>
</div>
