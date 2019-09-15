<div class="col-sm-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title"><i class="fa fa-list-alt"></i> Pesanan Anda :</h4>
    </div>
    <div class="panel-body">
      <center>
        <h3 class="page-header">Detail Pesanan Sewa <br> <small>No Transaksi #<?= $detail->id_pemesanan ?></small></h3>
      </center>
      <div class="col-sm-6">
        <dl class="dl-horizontal">
          <dt>Nama</dt>
          <dd><?= $detail->nama; ?></dd>
          <dt>No. Hp</dt>
          <dd><?= $detail->no_telp; ?></dd>
          <dt>Alamat</dt>
          <dd><?= $detail->alamat; ?></dd>
          <dt>Tanggal Acara</dt>
          <dd><?= nice_date($detail->tgl_acara,'d-m-Y'); ?></dd>
          <dt>Status</dt>
          <dd><label class="label <?= ($detail->status == "pending") ? 'label-default' : 'label-success' ?>"><?= $detail->status ?></label></dd>
        </dl>
      </div>
      <div class="col-sm-12">
        <table class="table table-bordered table-condensed table-responsive">
          <thead>
            <tr>
              <th>#</th>
              <th>Jenis Pesanan</th>
              <th>Nama</th>
              <th>Harga</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td> Sewa Gedung</td>
              <td><?= $detail->nama_gedung ?></td>
              <td>Rp <?= number_format($detail->harga_gedung,0,',','.') ?></td>
            </tr>
            <tr>
              <td>2</td>
              <td> Sewa Dekorasi</td>
              <td><?= $detail->nama_dekorasi ?></td>
              <td>Rp <?= number_format($detail->harga_dekorasi,0,',','.') ?></td>
            </tr>
            <tr>
              <td>3</td>
              <td> Sewa Rias</td>
              <td><?= $detail->nama_rias ?></td>
              <td>Rp <?= number_format($detail->harga_rias,0,',','.') ?></td>
            </tr>
            <tr>
              <td>4</td>
              <td> Sewa Katering</td>
              <td><?= $detail->nama_katering ?></td>
              <td>Rp <?= number_format($detail->harga_katering,0,',','.') ?></td>
            </tr>
            <tr>
              <td>5</td>
              <td> Sewa Dokumentasi</td>
              <td><?= $detail->nama_dokumentasi ?></td>
              <td>Rp <?= number_format($detail->harga_dokumentasi,0,',','.') ?></td>
            </tr>
            <tr>
              <th colspan="3">Total</th>
              <?php
                $total = $detail->harga_gedung + $detail->harga_dekorasi + $detail->harga_katering + $detail->harga_rias + $detail->harga_dokumentasi;
              ?>
              <td>Rp <?= number_format($total,0,',','.') ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="panel-footer">

    </div>
  </div>
</div>
