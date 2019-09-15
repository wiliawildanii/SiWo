<div class="col-sm-9">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"><i class="fa fa-user"></i> Edit User : <?php echo $user->name; ?></h4>
        </div>
        <div class="panel-body">
            <form action="<?php  echo base_url() . 'admin/user/update/'.$user->user_id; ?>" class="form-horizontal" method="post">
                <?php include 'form.php'; ?>
            </form>
        </div>
    </div>
</div>