<div class="col-sm-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-diamond"></i> Edit Dekorasi : <?php echo $dekorasi->nama_dekorasi; ?></h4>
        </div>
        <div class="panel-body">
            <form action="<?php  echo base_url() . 'admin/dekorasi/update/'.$dekorasi->dekorasi_id; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                <?php include 'form.php'; ?>
            </form>
        </div>
    </div>
</div>
