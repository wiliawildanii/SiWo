<div class="col-sm-9">
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-cutlery"></i> Data Katering</h4>
        </div>
        <div class="panel-body">
            <div class="tool-box">
                <a href="<?php echo base_url() . 'admin/katering/create'; ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Katering</a>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Tools</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php foreach($caterings->result() as $katering): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $katering->nama_katering ?></td>
                            <td><?= $katering->jumlah ?></td>
                            <td><?= $katering->harga_katering ?></td>
                            <td><?= $katering->deskripsi ?></td>
                            <td width="10%">
                                <a href="<?php echo base_url() . 'admin/katering/edit/'.$katering->katering_id; ?>" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-pencil fa-fw"></i></a>
                                <a href="<?php echo base_url() . 'admin/katering/delete/'.$katering->katering_id; ?>" class="btn btn-xs btn-danger" title="Hapus" onclick="return confirm('Anda yakin ingin menghapus data ini ?')"><i class="fa fa-trash fa-fw"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
