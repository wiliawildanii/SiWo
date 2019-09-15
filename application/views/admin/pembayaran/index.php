<div class="col-sm-9">
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-diamond"></i> Data Pembayaran</h4>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Detail Bank</th>
                        <th>Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach($transaksis as $pembayaran): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $pembayaran->pemesanan_id ?></td>
                            <td>
                              <strong><?= $pembayaran->nama_bank ?></strong> <br>
                              <?= $pembayaran->no_rek ?> <br>
                              a.n <?= $pembayaran->pemilik ?>
                            </td>
                            <td>
                              <img src="<?= base_url() . 'uploads/'.$pembayaran->foto ?>" alt="" width="200">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
