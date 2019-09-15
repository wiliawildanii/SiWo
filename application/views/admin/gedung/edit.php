<div class="col-sm-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-building"></i> Edit Gedung : <?php echo $gedung->nama_gedung; ?></h4>
        </div>
        <div class="panel-body">
            <form action="<?php  echo base_url() . 'admin/gedung/update/'.$gedung->gedung_id; ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                <?php include 'form.php'; ?>
            </form>
        </div>
    </div>
</div>
