<div class="col-sm-9">
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-envelope"></i> Data Pemesanan</h4>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Pemesan</th>
                        <th>Status</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach($transaksis as $transaksi): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>#<?= $transaksi->id_pemesanan ?></td>
                            <td><?= $transaksi->nama ?></td>
                            <td><?= $transaksi->status ?></td>
                            <td width="10%">
                                <a href="<?php echo base_url() . 'admin/pemesanan/detail/'.$transaksi->id_pemesanan; ?>" class="btn btn-xs btn-info" title="Lihat"><i class="fa fa-eye fa-fw"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
