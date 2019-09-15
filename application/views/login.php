<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Susi Wedding Organizer</title>
    <!--Bootstrap-->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/admin-theme.css'; ?>">
    <style>
        body {
            padding-top: 70px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php if($this->session->has_userdata('errors')): ?>
                <div class="col-sm-offset-3 col-sm-6">
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('errors'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <form action="<?= base_url() . 'login'; ?>" class="form" method="post">
                <div class="col-sm-offset-4 col-sm-4">
                    <h1 class="page-header"><center>Susi Wedding Organizer</center></h1>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><center>Silahkan Login</center></h4>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                    <a href="<?= base_url(); ?>"> Kembali ke Homepage </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>