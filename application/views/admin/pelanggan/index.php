<div class="col-sm-9">
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-male"></i> Data Pelanggan</h4>
        </div>
        <div class="panel-body">
            <div class="tool-box">
                <a href="<?php echo base_url() . 'admin/pelanggan/create'; ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Pelanggan</a>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach($pelanggans->result() as $pelanggan): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $pelanggan->nama ?></td>
                            <td><?= $pelanggan->no_telp ?></td>
                            <td><?= $pelanggan->alamat ?></td>
                            <td><?= $pelanggan->email ?></td>
                            <td width="10%">
                                <a href="<?php echo base_url() . 'admin/pelanggan/edit/'.$pelanggan->pelanggan_id; ?>" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil fa-fw"></i></a>
                                <a href="<?php echo base_url() . 'admin/pelanggan/delete/'.$pelanggan->pelanggan_id; ?>" class="btn btn-xs btn-danger" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash fa-fw"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>