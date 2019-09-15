<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('TransaksiModel');
    $this->load->model('DashboardModel');
  }

  public function index()
  {
    $data['transaksi'] = $this->TransaksiModel->myTransaction();

    $this->load->view('templates/pelanggan/header');
    $this->load->view('templates/pelanggan/sidemenu');
    $this->load->view('pelanggan/dashboard',$data);
    $this->load->view('templates/pelanggan/footer');

    // echo $date = $_GET['date'];
    // $result = $this->DashboardModel->dataGedung($date);
    // var_dump($result);
  }

}

/* End of file Controllername.php */
