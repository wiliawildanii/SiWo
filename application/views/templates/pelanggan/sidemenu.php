<?php
    $uri = $this->uri->segment(2);
?>
<!--Sidemenu-->
<div class="col-sm-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-list"></i> Main Menu</h3>
        </div>
        <div class="list-group">
            <a href="<?= base_url() . 'pelanggan/'; ?>" class="list-group-item <?= ($uri == '') ? 'active' : ''; ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            <a href="<?= base_url() . 'pelanggan/konfirmasi'; ?>" class="list-group-item <?= ($uri == 'konfirmasi') ? 'active' : ''; ?>"><i class="fa fa-money fa-fw"></i> Konfirmasi Pembayaran</a>
        </div>
    </div>
</div>
