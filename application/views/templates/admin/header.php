<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ($this->session->flashdata('role') == 'admin') ? 'Admin' : 'Guest' ?> | Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/admin-theme.css'; ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">Admin Panel</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= base_url() . 'admin/logout'; ?>">Keluar</a></li>
            </ul>
        </div>
    </nav>

    <!--cover-->
    <section id="cover">
        <div class="container-fluid">
            <div class="row">
                <div class="jumbotron">
                    <h3>Susi Wedding Organizer <br> <small style="color:#fff;">Melayani Anda dengan kemampuan terbaik!</small> </h3>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">