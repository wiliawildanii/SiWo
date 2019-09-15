<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <style>
        body {background:#f9f9f9 url(<?php echo base_url() . "assets/images/bg-cover.jpg"; ?>);background-size:cover;padding-top:100px;min-height:100vh;}
        .box {background:rgba(255,255,255,0.5);padding:20px;box-shadow: 1px 1px 7px 0px #555;border-radius:2px;}
        .heading-title {margin-bottom:20px;}
        .tagline {color:#fed136;font-size:20px;font-family:"Kaushan Script";}
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
            <div class="col-sm-offset-4 col-sm-4">
                <div class="box">
                    <center>
                        <h3 class="heading-title">Admin Login <br> <small class="tagline"><i>Susi Wedding Organizer</i></small></h3>
                    </center>
                    <form action="<?= base_url() . 'admin/login'; ?>" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Login</button>
                        </div>
                    </form>
                    <a href="<?php echo base_url(); ?>">Kembali ke Halaman Awal</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>