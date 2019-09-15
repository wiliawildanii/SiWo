<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Susi Salon | Wedding Organizer</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Susi Wedding Organizer</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Pelayanan</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#daftar">Daftar</a>
                    </li>
                    <li>
                        <a href="<?= base_url() . 'login'; ?>">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome to Susi Wedding Organizer</div>
                <div class="intro-heading">It's your wedding event partner</div>
                <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Pelayanan</h2>
                    <h3 class="section-subheading text-muted">Pelayanan terbaik dari Kami untuk Anda.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-building-o fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Gedung</h4>
                    <p class="text-muted">Menyediakan penyewaan gedung dengan kriteria yang Anda butuhkan</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-cutlery fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Catering</h4>
                    <p class="text-muted">Berikan menu sajian yang terbaik untuk tamu Anda dari chef terbaik kami</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-camera-retro fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Dokumentasi</h4>
                    <p class="text-muted">Abadikan momen pernikahan Anda dengan hasil yang terbaik dari fotografer terbaik Kami</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-female fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Rias</h4>
                    <p class="text-muted">Menjadi raja & ratu di acara Anda dengan dandanan terbaik dari penata rias terbaik Kami</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-diamond fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Dekorasi</h4>
                    <p class="text-muted">Jadikan acara Anda meriah dengan dekorasi yang indah</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="daftar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Formulir Pendaftaran</h2>
                    <h3 class="section-subheading text-muted">Daftarkan diri dan jadwal acara Anda untuk pemesanan.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form action="<?php echo base_url() . 'daftar'; ?>" method="post">
                        <div class="row">
							<div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Anda *" value="<?php echo set_value('nama',isset($pelanggan->nama) ? $pelanggan->nama : ''); ?>" required>
                                    <p class="help-block text-danger"><?php echo $this->session->flashdata('nama'); ?></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="no_telp" class="form-control" placeholder="Nomor Ponsel *" value="<?php echo set_value('nama',isset($pelanggan->nama) ? $pelanggan->nama : ''); ?>">
                                    <p class="help-block text-danger"><?php echo $this->session->flashdata('no_telp'); ?></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email *" id="email" value="<?php echo set_value('nama',isset($pelanggan->nama) ? $pelanggan->nama : ''); ?>" required>
                                    <p class="help-block text-danger"><?php echo $this->session->flashdata('email'); ?></p>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="alamat" class="form-control" placeholder="Alamat *" value="<?php echo set_value('nama',isset($pelanggan->nama) ? $pelanggan->nama : ''); ?>" required>
                                    <p class="help-block text-danger"><?php echo $this->session->flashdata('alamat'); ?></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Daftar <i class="fa fa-send"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2016</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="assets/js/jqBootstrapValidation.js"></script>

    <!-- Theme JavaScript -->
    <script src="assets/js/agency.min.js"></script>

</body>

</html>
