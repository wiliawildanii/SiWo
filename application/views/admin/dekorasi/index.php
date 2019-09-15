<div class="col-sm-9">
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-diamond"></i> Data Dekorasi</h4>
        </div>
        <div class="panel-body">
            <div class="tool-box">
                <a href="<?php echo base_url() . 'admin/dekorasi/create'; ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Dekorasi</a>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach($dekor->result() as $dekorasi): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><img src="<?= base_url() . 'uploads/' . $dekorasi->foto ?>" alt="" class="image-display"> <?= $dekorasi->nama_dekorasi ?></td>
                            <td><?= $dekorasi->harga_dekorasi ?></td>
                            <td><?= $dekorasi->deskripsi ?></td>
                            <td width="10%">
                                <a href="<?php echo base_url() . 'admin/dekorasi/edit/'.$dekorasi->dekorasi_id; ?>" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil fa-fw"></i></a>
                                <a href="<?php echo base_url() . 'admin/dekorasi/delete/'.$dekorasi->dekorasi_id; ?>" class="btn btn-xs btn-danger" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash fa-fw"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
